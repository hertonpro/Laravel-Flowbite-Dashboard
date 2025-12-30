<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('lang')) {
            $locale = $request->get('lang');
            if (in_array($locale, ['en', 'fr'])) {
                App::setLocale($locale);
                session(['locale' => $locale]);
            }
        } elseif (session()->has('locale')) {
            App::setLocale(session('locale'));
        }

        return $next($request);
    }
}