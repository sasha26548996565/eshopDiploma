<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Barryvdh\Debugbar\Facades\Debugbar;

class CurrencyController extends Controller
{
    public function switchCurrency(string $currency): RedirectResponse
    {
        Debugbar::info($currency);
        session(['currency' => $currency]);
        return back();
    }
}
