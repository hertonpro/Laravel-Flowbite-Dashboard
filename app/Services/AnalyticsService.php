<?php

namespace App\Services;

use App\Models\Analytics\PageView;
use App\Models\Analytics\DailyMetric;
use App\Models\Analytics\UserActivity;
use App\Models\Analytics\ContentStat;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AnalyticsService
{
    /**
     * Enregistrer une vue de page
     */
    public function trackPageView(Request $request, $duration = null)
    {
        return PageView::create([
            'url' => $request->url(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referer' => $request->header('referer'),
            'user_id' => auth()->id(),
            'visited_at' => now(),
            'duration' => $duration
        ]);
    }

    /**
     * Enregistrer une activité utilisateur
     */
    public function trackUserActivity($action, $model = null, $properties = null)
    {
        $data = [
            'user_id' => auth()->id(),
            'action' => $action,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'properties' => $properties
        ];

        if ($model) {
            $data['model_type'] = get_class($model);
            $data['model_id'] = $model->id;
        }

        return UserActivity::create($data);
    }

    /**
     * Incrémenter une métrique quotidienne
     */
    public function incrementDailyMetric($metricName, $value = 1, $metadata = null)
    {
        return DailyMetric::incrementMetric($metricName, today(), $value, $metadata);
    }

    /**
     * Incrémenter les vues d'un contenu
     */
    public function trackContentView($model, $unique = false)
    {
        return ContentStat::incrementViews(get_class($model), $model->id, today(), $unique);
    }

    /**
     * Obtenir les statistiques du tableau de bord
     */
    public function getDashboardStats()
    {
        return Cache::remember('dashboard_stats', 300, function () {
            $today = today();
            $yesterday = today()->subDay();
            $thisWeek = [now()->startOfWeek(), now()->endOfWeek()];
            $thisMonth = [now()->startOfMonth(), now()->endOfMonth()];

            return [
                'page_views' => [
                    'today' => PageView::whereDate('visited_at', $today)->count(),
                    'yesterday' => PageView::whereDate('visited_at', $yesterday)->count(),
                    'this_week' => PageView::whereBetween('visited_at', $thisWeek)->count(),
                    'this_month' => PageView::whereBetween('visited_at', $thisMonth)->count(),
                ],
                'unique_visitors' => [
                    'today' => PageView::whereDate('visited_at', $today)->distinct('ip_address')->count(),
                    'yesterday' => PageView::whereDate('visited_at', $yesterday)->distinct('ip_address')->count(),
                    'this_week' => PageView::whereBetween('visited_at', $thisWeek)->distinct('ip_address')->count(),
                    'this_month' => PageView::whereBetween('visited_at', $thisMonth)->distinct('ip_address')->count(),
                ],
                'user_activities' => [
                    'today' => UserActivity::whereDate('created_at', $today)->count(),
                    'this_week' => UserActivity::whereBetween('created_at', $thisWeek)->count(),
                    'this_month' => UserActivity::whereBetween('created_at', $thisMonth)->count(),
                ],
                'popular_pages' => PageView::select('url', DB::raw('count(*) as views'))
                    ->whereBetween('visited_at', $thisWeek)
                    ->groupBy('url')
                    ->orderByDesc('views')
                    ->limit(10)
                    ->get(),
                'recent_activities' => UserActivity::with('user')
                    ->latest()
                    ->limit(10)
                    ->get()
            ];
        });
    }

    /**
     * Obtenir les métriques pour une période donnée
     */
    public function getMetricsForPeriod($startDate, $endDate, $metrics = null)
    {
        $query = DailyMetric::forPeriod($startDate, $endDate);
        
        if ($metrics) {
            $query->whereIn('metric_name', (array) $metrics);
        }
        
        return $query->orderBy('date')->get()->groupBy('metric_name');
    }

    /**
     * Obtenir les statistiques de contenu
     */
    public function getContentStats($modelType, $modelId = null, $period = 'week')
    {
        $query = ContentStat::where('model_type', $modelType);
        
        if ($modelId) {
            $query->where('model_id', $modelId);
        }

        $dates = $this->getPeriodDates($period);
        $query->whereBetween('date', $dates);

        return $query->orderBy('date')->get();
    }

    /**
     * Nettoyer les anciennes données
     */
    public function cleanupOldData($days = 90)
    {
        $cutoffDate = now()->subDays($days);

        PageView::where('visited_at', '<', $cutoffDate)->delete();
        UserActivity::where('created_at', '<', $cutoffDate)->delete();
        DailyMetric::where('date', '<', $cutoffDate)->delete();
        ContentStat::where('date', '<', $cutoffDate)->delete();
    }

    /**
     * Helper pour obtenir les dates d'une période
     */
    private function getPeriodDates($period)
    {
        switch ($period) {
            case 'today':
                return [today(), today()];
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
