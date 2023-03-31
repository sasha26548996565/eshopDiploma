<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function switchLanguage(string $language): RedirectResponse
    {
        if (in_array($language, config('app.languages')) == false)
            $language = config('app.locale');

        session(['language' => $language]);
        App::setLocale(session()->get('language'));
        return back();
    }
}
