<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AnalyticsService;
use App\Models\User;
use App\Models\Blog;
use App\Models\Analytics\PageView;
use App\Models\Analytics\UserActivity;

class DashboardController extends Controller
{
    protected $analyticsService;

    public function __construct(AnalyticsService $analyticsService)
    {
        $this->analyticsService = $analyticsService;
    }

    public function index()
    {
        // Récupérer les statistiques analytics
        $analytics = $this->analyticsService->getDashboardStats();
        
        // Statistiques générales
        $stats = [
            'total_users' => User::count(),
            'total_blogs' => Blog::count(),
            'page_views_today' => $analytics['page_views']['today'] ?? 0,
            'page_views_week' => $analytics['page_views']['week'] ?? 0,
            'unique_visitors_today' => $analytics['unique_visitors']['today'] ?? 0,
            'unique_visitors_week' => $analytics['unique_visitors']['week'] ?? 0,
        ];

        // Activités récentes (dernières user activities)
        $recentActivities = UserActivity::with('user')
            ->latest()
            ->limit(5)
            ->get();

        // Pages populaires
        $popularPages = $analytics['popular_pages'] ?? [];

        return view('admin.dashboard', compact('stats', 'analytics', 'recentActivities', 'popularPages'));
    }
}
