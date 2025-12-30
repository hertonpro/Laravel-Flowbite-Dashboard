<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'public.home')->name('home')->middleware('web')->middleware(\App\Http\Middleware\TrackPageViews::class);

// Route de test pour analytics
Route::get('/test-analytics', function () {
    return view('public.home');
})->name('test-analytics')->middleware(\App\Http\Middleware\TrackPageViews::class);

// Route pour voir les données collectées (debug)
Route::get('/analytics-debug', function () {
    return response()->json([
        'page_views' => \App\Models\Analytics\PageView::latest()->limit(10)->get(),
        'daily_metrics' => \App\Models\Analytics\DailyMetric::latest()->limit(10)->get(),
        'user_activities' => \App\Models\Analytics\UserActivity::latest()->limit(10)->get(),
        'content_stats' => \App\Models\Analytics\ContentStat::latest()->limit(10)->get(),
        'counts' => [
            'page_views_count' => \App\Models\Analytics\PageView::count(),
            'daily_metrics_count' => \App\Models\Analytics\DailyMetric::count(),
            'user_activities_count' => \App\Models\Analytics\UserActivity::count(),
            'content_stats_count' => \App\Models\Analytics\ContentStat::count(),
        ]
    ]);
})->name('analytics-debug');

// Route de test pour TrackUserActivity middleware (POST)
Route::post('/test-user-activity', function () {
    return response()->json(['message' => 'User activity tracked!']);
})->name('test-user-activity')->middleware(\App\Http\Middleware\TrackUserActivity::class);

// Route de test pour TrackContentViews middleware
Route::get('/test-content/{id}', function ($id) {
    return response()->json(['content_id' => $id, 'message' => 'Content view tracked!']);
})->name('test-content')->middleware(\App\Http\Middleware\TrackContentViews::class);

// Route de test spécifique pour le contenu blog (simulation)
Route::get('/test-blog/{blog}', function ($blogId) {
    // Simuler un blog pour le test
    $blog = new \App\Models\Blog();
    $blog->id = $blogId;
    $blog->exists = true;
    
    return response()->json([
        'blog_id' => $blogId, 
        'message' => 'Blog content view tracked!',
        'blog' => $blog
    ]);
})->name('admin.blogs.show')->middleware(\App\Http\Middleware\TrackContentViews::class);

// Route de test pour déclencher daily metrics
Route::get('/test-daily-metrics', function () {
    $today = now()->format('Y-m-d');
    
    // Créer plusieurs métriques pour tester
    $pageViews = \App\Models\Analytics\DailyMetric::incrementMetric('page_views', $today, 1);
    $uniqueVisitors = \App\Models\Analytics\DailyMetric::incrementMetric('unique_visitors', $today, 1);
    $newUsers = \App\Models\Analytics\DailyMetric::incrementMetric('new_users', $today, 1);
    
    // Créer une métrique avec updateOrCreate directement
    $bounceRate = \App\Models\Analytics\DailyMetric::updateOrCreate(
        ['date' => $today, 'metric_name' => 'bounce_rate'],
        ['metric_value' => 25, 'metadata' => ['calculation' => 'test', 'sample_size' => 100]]
    );
    
    return response()->json([
        'message' => 'Daily metrics created!',
        'metrics' => [
            'page_views' => $pageViews,
            'unique_visitors' => $uniqueVisitors,
            'new_users' => $newUsers,
            'bounce_rate' => $bounceRate
        ]
    ]);
})->name('test-daily-metrics');

// Route avec formulaire pour tester POST (TrackUserActivity)
Route::get('/test-form', function () {
    return '
    <!DOCTYPE html>
    <html>
    <head><title>Test Analytics</title></head>
    <body>
        <h1>Test Analytics System</h1>
        <p><strong>Status:</strong> User Activities ✅ | Debug Analytics ✅ | Autres à tester...</p>
        
        <h2>Tests des Middlewares</h2>
        <form method="POST" action="/test-user-activity">
            <input type="hidden" name="_token" value="' . csrf_token() . '">
            <button type="submit">Test User Activity ✅</button>
        </form>
        
        <br>
        <a href="/test-analytics" style="display:block;margin:5px 0;">Test Page View (TrackPageViews)</a>
        <a href="/test-content/123" style="display:block;margin:5px 0;">Test Content View Generic</a>
        <a href="/test-blog/456" style="display:block;margin:5px 0;">Test Blog Content View</a>
        <a href="/test-daily-metrics" style="display:block;margin:5px 0;">Test Daily Metrics</a>
        
        <h2>Debug & Monitoring</h2>
        <a href="/analytics-debug" style="display:block;margin:5px 0;color:blue;">📊 View Analytics Debug ✅</a>
        
        <style>
            body { font-family: Arial; padding: 20px; }
            button { padding: 10px; margin: 5px 0; }
            a { text-decoration: none; padding: 5px; background: #f0f0f0; border-radius: 3px; }
            h2 { margin-top: 30px; }
        </style>
    </body>
    </html>';
})->name('test-form');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin|super-admin|manager'])
    ->group(function () {
        Route::redirect('/', '/admin/dashboard');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('users')
            ->name('users.')
            ->middleware(['permission:view users', 'role:admin|super-admin'])
            ->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('index');

                Route::middleware(['permission:create users'])->group(function () {
                    Route::get('/create', [UserController::class, 'create'])->name('create');
                    Route::post('/', [UserController::class, 'store'])->name('store');
                });

                Route::middleware(['permission:edit users'])->group(function () {
                    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
                    Route::put('/{user}', [UserController::class, 'update'])->name('update');
                });

                Route::middleware(['permission:delete users'])->group(function () {
                    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
                });
            });

        Route::prefix('permissions')
            ->name('permissions.')
            ->middleware(['permission:edit users', 'role:admin|super-admin'])
            ->group(function () {
                Route::get('/', [PermissionController::class, 'index'])->name('index');
                Route::post('/roles', [PermissionController::class, 'storeRole'])->name('roles.store');
                Route::put('/roles/{role}', [PermissionController::class, 'updateRole'])->name('roles.update');
                Route::delete('/roles/{role}', [PermissionController::class, 'destroyRole'])->name('roles.destroy');
                Route::put('/users/{user}/roles', [PermissionController::class, 'updateUserRoles'])->name('users.update');
            });

        Route::prefix('blogs')
            ->name('blogs.')
            ->middleware(['permission:view blogs'])
            ->group(function () {
                Route::get('/', [BlogController::class, 'index'])->name('index');

                Route::middleware(['permission:create blogs'])->group(function () {
                    Route::get('/create', [BlogController::class, 'create'])->name('create');
                    Route::post('/', [BlogController::class, 'store'])->name('store');
                    Route::post('/upload-image', [BlogController::class, 'uploadImage'])->name('upload-image');
                });

                Route::middleware(['permission:edit blogs'])->group(function () {
                    Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('edit');
                    Route::put('/{blog}', [BlogController::class, 'update'])->name('update');
                    Route::post('/upload-image', [BlogController::class, 'uploadImage'])->name('upload-image');
                });

                Route::middleware(['permission:delete blogs'])->group(function () {
                    Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('destroy');
                });
            });

        Route::prefix('reports')
            ->name('reports.')
            ->middleware(['permission:view reports'])
            ->group(function () {
                Route::get('/', [ReportsController::class, 'index'])->name('index');
                Route::get('/traffic', [ReportsController::class, 'traffic'])->name('traffic');
                Route::get('/users', [ReportsController::class, 'users'])->name('users');
                Route::get('/content', [ReportsController::class, 'content'])->name('content');
                Route::post('/export', [ReportsController::class, 'export'])->name('export');
            });

        Route::prefix('settings')
            ->name('settings.')
            ->middleware(['permission:view settings'])
            ->group(function () {
                Route::get('/', [SettingController::class, 'index'])->name('index');
                Route::get('/profile', [SettingController::class, 'profile'])->name('profile');
                Route::post('/profile', [SettingController::class, 'updateProfile'])->name('profile.update');
                Route::get('/password', [SettingController::class, 'password'])->name('password');
                Route::post('/password', [SettingController::class, 'updatePassword'])->name('password.update');
                Route::get('/appearance', [SettingController::class, 'appearance'])->name('appearance');
                Route::post('/appearance', [SettingController::class, 'updateAppearance'])->name('appearance.update');
            });
    });

require __DIR__ . '/auth.php';
