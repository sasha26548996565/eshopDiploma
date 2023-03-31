<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('language') == null)
            session(['language' => config('app.locale')]);

        App::setLocale(session()->get('language'));
        return $next($request);
    }
}
