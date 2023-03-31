<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Main')->middleware('localization')->name('main.')->group(function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/switch-currency/{currency}', 'CurrencyController@switchCurrency')->name('switchCurrency');
    Route::get('/switch-language/{language}', 'LocalizationController@switchLanguage')->name('switchLanguage');
});

Auth::routes();
