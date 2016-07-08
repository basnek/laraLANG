<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
});

Route::group(
        [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localize'] // Route translate middleware
        ], function() {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP * */
    Route::get('/', function() {
        // This routes is useless to translate
        return View::make('hello');
    });

    Route::get(LaravelLocalization::transRoute('routes.about'), function() {
        return View::make('about');
    });

    Route::get(LaravelLocalization::transRoute('routes.view'), function($id) {
        return View::make('view', ['id' => $id]);
    });
});
