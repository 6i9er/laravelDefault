<?php

use \Illuminate\Support\Facades\App;
use \Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mina', function () {
    return "new Route";
    return view('welcome');
});

Route::get('language/{locale}', function ($locale) {
    $languageArr = array("ar","en");
    if(in_array($locale , $languageArr)){
        App::setLocale($locale);
    }
//    return Redirect::to('/',301);
//    return "language updated;";
    //
});
