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

Route::get('/home',function (){
  return redirect('/');
})->name('home');
Route::get('/log-out', 'Auth\LoginController@logout')->name('log-out');

Route::get('/', 'HomeController@index');
/* Slides */
  Route::get('/{slide_number?}', 'SlideController@diet')->name('slide');
  Route::post('/{slide_number}', 'SlideController@next_slide');


Route::post('/student/store','StudentController@store')->name('student.store');

Route::group(['middleware' => 'auth'], function (){
Route::get('/student/all','StudentController@index')->name('student.index');
});
