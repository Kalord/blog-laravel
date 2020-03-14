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

Route::get('/', function () {
    return view('index', [
        'user' => Auth()->user()
    ]);
})->name('home');

Route::get('/home', function () {
    return view('index', [
        'user' => Auth()->user()
    ]);
})->name('home');


/**
 * Login
 */
//Form
Route::get('/login', 'UserController@login')->name('login')->middleware('guest');
//Logic
Route::post('/start', 'UserController@start')->middleware('guest');

/**
 * Registration
 */
//Form
Route::get('/registration', 'UserController@registration')->middleware('guest');
//Logic
Route::post('/create', 'UserController@create')->middleware('guest');

Route::get('/logout', 'UserController@logout')->middleware('auth');

Route::get('/profile', 'ProfileController@index')->middleware('auth');