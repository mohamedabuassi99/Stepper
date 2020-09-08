<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can
 web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('homepage.slides.1');
    return view('welcome');
});
/* Slides */
  Route::get('/{slide_number?}', 'SlideController@diet')->name('slide');
  Route::post('/{slide_number}', 'SlideController@next_slide');
