<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Main')->name('main.')->group(function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/switch-currency/{currency}', 'CurrencyController@switchCurrency')->name('switchCurrency');
});

Auth::routes();
