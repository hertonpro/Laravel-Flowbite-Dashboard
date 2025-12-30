<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;

class MakeAdminController extends Command
{
    protected $signature = 'make:admin-controller {name} {--resource : Generate a resource controller} {--model= : Generate controller for the given model}';
    protected $description = 'Create an admin controller and automatically generate permissions';

    public function handle()
    {
        $name = $this->argument('name');
        
        // Ensure controller name ends with Controller
        if (!Str::endsWith($name, 'Controller')) {
            $name .= 'Controller';
        }

        $options = [];
        
        if ($this->option('resource')) {
            $options['--resource'] = true;
        }
        
        if ($this->option('model')) {
            $options['--model'] = $this->option('model');
        }

        // Create the controller in Admin namespace
        $controllerName = 'Admin/' . $name;
        
        $this->info("🔨 Creating controller: {$controllerName}");
        
        Artisan::call('make:controller', array_merge([
            'name' => $controllerName
        ], $options));

        $this->line(Artisan::output());

        // Auto-sync permissions
        $this->info("🔄 Auto-generating permissions...");
        Artisan::call('sync:permissions', ['controller' => $name]);
        $this->line(Artisan::output());

        // Generate suggested routes
        $this->generateRoutesSuggestion($name);

        return 0;
    }

    private function generateRoutesSuggestion($controllerName)
    {
        $resourceName = Str::plural(Str::snake(Str::replaceLast('Controller', '', $controllerName), '-'));
        $controllerClass = Str::replaceLast('Controller', 'Controller', $controllerName);
        
        $this->info("\n📝 Suggested routes to add to your web.php:");
        $this->line("
Route::prefix('{$resourceName}')
    ->name('{$resourceName}.')
    ->middleware(['permission:view {$resourceName}'])
    ->group(function () {
        Route::get('/', [{$controllerClass}::class, 'index'])->name('index');

        Route::middleware(['permission:create {$resourceName}'])->group(function () {
            Route::get('/create', [{$controllerClass}::class, 'create'])->name('create');
            Route::post('/', [{$controllerClass}::class, 'store'])->name('store');
        });

        Route::middleware(['permission:edit {$resourceName}'])->group(function () {
            Route::get('/{" . Str::singular($resourceName) . "}/edit', [{$controllerClass}::class, 'edit'])->name('edit');
            Route::put('/{" . Str::singular($resourceName) . "}', [{$controllerClass}::class, 'update'])->name('update');
        });

        Route::middleware(['permission:delete {$resourceName}'])->group(function () {
            Route::delete('/{" . Str::singular($resourceName) . "}', [{$controllerClass}::class, 'destroy'])->name('destroy');
        });
    });
        ");
    }
}