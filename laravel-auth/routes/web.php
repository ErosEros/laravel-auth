<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('guests.home');
// });

Auth::routes();

Route::get('/', function () {
    return view("guests.home");
})->name('index');


Route::middleware('auth')
  ->namespace('admin')
  ->name('admin')
  ->prefix('admin')
  ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::resource('posts', 'PostController');
    });

    Auth::routes();


    Route::get('{any?}', function() {
        return view("guests.home");
    })->where("any", ".*");
