<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Analytics\PageView;
use App\Models\Analytics\DailyMetric;

class TrackPageViews
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);

        $response = $next($request);

        // Track seulement les requêtes GET pour les pages HTML
        if ($request->isMethod('GET') && 
            $response->getStatusCode() === 200 && 
            !$request->ajax() && 
            !$request->wantsJson() &&
            !$this->shouldSkip($request)) {
            
            $duration = (microtime(true) - $startTime) * 1000; // en millisecondes
            
            try {
                // Enregistrer la vue de page
                PageView::create([
                    'url' => $request->url(),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'referer' => $request->header('referer'),
                    'user_id' => Auth::id(),
                    'visited_at' => now(),
                    'duration' => round($duration)
                ]);
                
                // Incrémenter les métriques quotidiennes
                $this->incrementDailyMetric('page_views');
                
                if (Auth::check()) {
                    $this->incrementDailyMetric('authenticated_page_views');
                } else {
                    $this->incrementDailyMetric('anonymous_page_views');
                }
                
            } catch (\Exception $e) {
                Log::error('Analytics tracking failed: ' . $e->getMessage());
            }
        }

        return $response;
    }

    /**
     * Incrémenter une métrique quotidienne
     */
    private function incrementDailyMetric(string $metricName, int $value = 1): void
    {
        $metric = DailyMetric::firstOrCreate(
            ['date' => today(), 'metric_name' => $metricName],
            ['metric_value' => 0]
        );
        
        $metric->increment('metric_value', $value);
    }

    /**
     * Détermine si la requête doit être ignorée pour le tracking
     */
    private function shouldSkip(Request $request): bool
    {
        $skipPaths = [
            'admin/analytics',
            'analytics-debug',
            'api/',
            '_debugbar',
            'telescope',
            'horizon',
            'favicon.ico',
            '.well-known'
        ];

        $path = $request->getPathInfo();

        foreach ($skipPaths as $skipPath) {
            if (str_starts_with($path, '/' . $skipPath)) {
                return true;
            }
        }

        return false;
    }
}
