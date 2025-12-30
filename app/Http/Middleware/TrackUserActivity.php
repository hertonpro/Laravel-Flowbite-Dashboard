<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Analytics\UserActivity;

class TrackUserActivity
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Track seulement pour les utilisateurs authentifiés
        if (Auth::check() && $request->isMethod('POST') && $response->getStatusCode() < 400) {
            try {
                // Déterminer l'action basée sur la route
                $action = $this->determineAction($request);
                
                if ($action) {
                    UserActivity::create([
                        'user_id' => Auth::id(),
                        'action' => $action,
                        'ip_address' => $request->ip(),
                        'user_agent' => $request->userAgent(),
                        'properties' => [
                            'url' => $request->url(),
                            'method' => $request->method(),
                            'route_name' => $request->route()?->getName(),
                        ]
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('User activity tracking failed: ' . $e->getMessage());
            }
        }

        return $response;
    }

    /**
     * Détermine l'action basée sur la requête
     */
    private function determineAction(Request $request): ?string
    {
        $routeName = $request->route()?->getName();
        
        if (!$routeName) {
            return null;
        }

        // Mappage des routes vers des actions
        $actionMap = [
            'admin.users.store' => 'created_user',
            'admin.users.update' => 'updated_user',
            'admin.users.destroy' => 'deleted_user',
            
            'admin.blogs.store' => 'created_blog',
            'admin.blogs.update' => 'updated_blog',
            'admin.blogs.destroy' => 'deleted_blog',
            
            'admin.permissions.roles.store' => 'created_role',
            'admin.permissions.roles.update' => 'updated_role',
            'admin.permissions.roles.destroy' => 'deleted_role',
            
            'admin.settings.profile.update' => 'updated_profile',
            'admin.settings.password.update' => 'changed_password',
            'admin.settings.appearance.update' => 'updated_appearance',
        ];

        return $actionMap[$routeName] ?? 'performed_action';
    }
}
