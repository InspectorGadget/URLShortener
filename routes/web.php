<?php

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

Route::get('/', ['as' => 'Home', 'uses' => 'RouteController@renderHomePage']);
Route::get('/r/{unicode}', ['as' => 'Redirect', 'uses' => 'RouteController@redirectPage']);
Route::get('/shorten', ['as' => 'Shorten', 'uses' => 'RouteController@renderShortenPage']);
Route::get('/shorten/me', ['as' => 'Shorten.me', 'uses' => 'RouteController@renderMyPage']);
Route::get('/login', ['as' => 'Login', 'uses' => 'RouteController@renderLoginPage']);
Route::get('/register', ['as' => 'Register', 'uses' => 'RouteController@renderRegisterPage']);
Route::get('/logout', ['as' => 'Logout', 'uses' => 'UserController@logout']);

Route::get('/shorten/link/{id}/delete', ['as' => 'Link.delete', 'uses' => 'LinkController@deleteDIR']);

// POST
Route::post('/shorten', ['as' => 'Shorten.submit', 'uses' => 'LinkController@createDIR']);
Route::post('/register', ['as' => 'Register.submit', 'uses' => 'UserController@register']);
Route::post('/login', ['as' => 'Login.submit', 'uses' => 'UserController@login']);
Route::post('/shorten/link/{id}/edit', ['as' => 'Link.edit', 'uses' => 'LinkController@editDIR']);