<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AnalyticsService;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    protected $analyticsService;

    public function __construct(AnalyticsService $analyticsService)
    {
        $this->analyticsService = $analyticsService;
    }

    /**
     * Afficher le tableau de bord des rapports
     */
    public function index()
    {
        $stats = $this->analyticsService->getDashboardStats();
        
        // Statistiques générales
        $generalStats = [
            'total_users' => User::count(),
            'total_blogs' => Blog::count(),
            'published_blogs' => Blog::where('status', 'published')->count(),
            'draft_blogs' => Blog::where('status', 'draft')->count(),
        ];

        // Croissance des utilisateurs (7 derniers jours)
        $userGrowth = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Articles récents
        $recentBlogs = Blog::with('user')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.reports.index', compact(
            'stats',
            'generalStats', 
            'userGrowth',
            'recentBlogs'
        ));
    }

    /**
     * Rapport détaillé du trafic
     */
    public function traffic(Request $request)
    {
        $period = $request->get('period', 'week');
        $dates = $this->getPeriodDates($period);
        
        $metrics = $this->analyticsService->getMetricsForPeriod($dates[0], $dates[1], [
            'page_views',
            'authenticated_page_views',
            'anonymous_page_views'
        ]);

        return view('admin.reports.traffic', compact('metrics', 'period'));
    }

    /**
     * Rapport des utilisateurs actifs
     */
    public function users(Request $request)
    {
        $period = $request->get('period', 'week');
        
        // Utilisateurs les plus actifs
        $activeUsers = User::withCount(['activities' => function($query) use ($period) {
                $dates = $this->getPeriodDates($period);
                $query->whereBetween('created_at', $dates);
            }])
            ->having('activities_count', '>', 0)
            ->orderByDesc('activities_count')
            ->limit(10)
            ->get();

        // Nouvelles inscriptions par jour
        $userRegistrations = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', $this->getPeriodDates($period))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('admin.reports.users', compact('activeUsers', 'userRegistrations', 'period'));
    }

    /**
     * Rapport du contenu (blogs)
     */
    public function content(Request $request)
    {
        $period = $request->get('period', 'week');
        $dates = $this->getPeriodDates($period);
        
        // Blogs les plus vus
        $popularBlogs = $this->analyticsService->getContentStats('App\Models\Blog', null, $period)
            ->groupBy('model_id')
            ->map(function($stats) {
                return [
                    'blog_id' => $stats->first()->model_id,
                    'total_views' => $stats->sum('views'),
                    'unique_views' => $stats->sum('unique_views')
                ];
            })
            ->sortByDesc('total_views')
            ->take(10);

        // Charger les informations des blogs
        $blogIds = $popularBlogs->pluck('blog_id');
        $blogs = Blog::whereIn('id', $blogIds)->get()->keyBy('id');

        // Publications par jour
        $dailyPublications = Blog::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', $dates)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('admin.reports.content', compact(
            'popularBlogs', 
            'blogs', 
            'dailyPublications', 
            'period'
        ));
    }

    /**
     * Exporter les rapports en PDF/Excel
     */
    public function export(Request $request)
    {
        $type = $request->get('type', 'pdf'); // pdf, excel, csv
        $report = $request->get('report', 'overview'); // overview, traffic, users, content
        
        // TODO: Implémenter l'export selon le type
        
        return response()->json(['message' => 'Export en cours de développement']);
    }

    /**
     * Helper pour obtenir les dates d'une période
     */
    private function getPeriodDates($period)
    {
        switch ($period) {
            case 'today':
                return [today(), today()->endOfDay()];
            case 'week':
                return [now()->startOfWeek(), now()->endOfWeek()];
            case 'month':
                return [now()->startOfMonth(), now()->endOfMonth()];
            case 'year':
                return [now()->startOfYear(), now()->endOfYear()];
            default:
                return [now()->startOfWeek(), now()->endOfWeek()];
        }
    }
}
