<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use App\Models\Analytics\ContentStat;
use App\Models\Blog;

class TrackContentViews
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Track seulement les requêtes GET réussies
        if ($request->isMethod('GET') && $response->getStatusCode() === 200) {
            try {
                $this->trackContentView($request);
            } catch (\Exception $e) {
                Log::error('Content view tracking failed: ' . $e->getMessage());
            }
        }

        return $response;
    }

    /**
     * Track la vue de contenu basée sur la route
     */
    private function trackContentView(Request $request): void
    {
        $route = $request->route();
        $routeName = $route?->getName();

        if (!$routeName) {
            return;
        }

        // Track les vues de blogs
        if ($routeName === 'admin.blogs.edit' || $routeName === 'admin.blogs.show') {
            $blog = $route->parameter('blog');
            if ($blog instanceof Blog) {
                $this->incrementContentStats('App\Models\Blog', $blog->id, $request);
            }
        }

        // Ajouter d'autres types de contenu ici si nécessaire
    }

    /**
     * Incrémenter les statistiques de contenu
     */
    private function incrementContentStats(string $modelType, int $modelId, Request $request): void
    {
        $today = today();
        $ipAddress = $request->ip();

        // Vérifier si c'est une vue unique (même IP aujourd'hui)
        $isUnique = !ContentStat::where('model_type', $modelType)
            ->where('model_id', $modelId)
            ->where('date', $today)
            ->whereJsonContains('metadata->ip_addresses', $ipAddress)
            ->exists();

        // Récupérer ou créer le stat du jour
        $stat = ContentStat::firstOrCreate(
            [
                'model_type' => $modelType,
                'model_id' => $modelId,
                'date' => $today
            ],
            [
                'views' => 0,
                'unique_views' => 0,
                'interactions' => 0,
                'metadata' => ['ip_addresses' => []]
            ]
        );

        // Incrémenter les vues
        $stat->increment('views');

        if ($isUnique) {
            $stat->increment('unique_views');
            
            // Ajouter l'IP aux métadonnées
            $metadata = $stat->metadata ?? ['ip_addresses' => []];
            $metadata['ip_addresses'][] = $ipAddress;
            $stat->update(['metadata' => $metadata]);
        }
    }
}
