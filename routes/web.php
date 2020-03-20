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

Route::get('/profile/identity', 'ProfileController@identity')->middleware('auth');

/**
 * Settings for the user
 */
Route::group(['prefix' => 'settings'], function() {
    Route::get('status', 'SettingsController@statusUpdate')->middleware('auth');

    Route::get('age', 'SettingsController@ageUpdate')->middleware('auth');

    Route::get('weight', 'SettingsController@weightUpdate')->middleware('auth');

    Route::post('avatar', 'SettingsController@avatarUpdate')->middleware('auth');

    Route::post('password', 'SettingsController@passwordUpdate')->middleware('auth');
});

Route::group(['prefix' => 'editor'], function() {
    Route::get('index', 'EditorController@index')->middleware('auth');
    Route::get('create', 'EditorController@create')->middleware('auth');
    Route::get('update', 'EditorController@update')->middleware('auth');
    Route::get('read', 'EditorController@read')->middleware('auth');
    Route::get('delete', 'EditorController@delete')->middleware('auth');
    Route::get('demo', 'EditorController@demo')->middleware('auth');
});

Route::get('/user/{id}', 'ProfileController@user');

Route::get('/blog', 'BlogController@index');

Route::get('/blog/detail/{id}', 'BlogController@detail');
