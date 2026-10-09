<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UseDariPanelLocale
{
    /**
     * Filament reads `filament-panels::layout.direction` from the active locale.
     * Persian (`fa`) is right-to-left and matches the Dari admin interface.
     */
    public function handle(Request $request, Closure $next): Response
    {
        app()->setLocale('fa');

        return $next($request);
    }
}
