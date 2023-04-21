<?php

namespace App\Http\Middleware\Main;

use Closure;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade;

class CartMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ((session()->get('cartId') == null) && (CartFacade::session(session()->get('cartId'))->getContent()->count() <= 0))
            return back();

        return $next($request);
    }
}
