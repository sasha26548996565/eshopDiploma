<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Main')->middleware('localization')->name('main.')->group(function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/switch-currency/{currency}', 'CurrencyController@switchCurrency')->name('switchCurrency');
    Route::get('/switch-language/{language}', 'LocalizationController@switchLanguage')->name('switchLanguage');
    Route::get('/product/{article}', 'ProductController@show')->name('product.show');
    Route::name('cart.')->prefix('cart')->group(function () {
        Route::post('/add', 'CartController@add')->name('add');
        Route::middleware('cart')->group(function () {
            Route::get('/', 'CartController@index')->name('index');
            Route::post('/update', 'CartController@update')->name('update');
            Route::post('/remove', 'CartController@remove')->name('remove');
            Route::post('/clear', 'CartController@clear')->name('clear');
        });
    });
});

Auth::routes();
