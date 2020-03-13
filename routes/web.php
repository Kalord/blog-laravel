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
    return view('index');
});


/** 
 * Login 
 */
//Form
Route::get('/login', 'UserController@login');
//Logic
Route::post('/start', 'UserController@start');

/**
 * Registration
 */
//Form
Route::get('/registration', 'UserController@registration');
//Logic
Route::post('/create', 'UserController@create');

Route::get('/logout', 'UserController@logout');