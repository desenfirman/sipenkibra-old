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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'juri'], function () {
  Route::get('/login', 'JuriAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'JuriAuth\LoginController@login');
  Route::post('/logout', 'JuriAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'JuriAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'JuriAuth\RegisterController@register');

  Route::post('/password/email', 'JuriAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'JuriAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'JuriAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'JuriAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'regupesertum'], function () {
  Route::get('/login', 'RegupesertumAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'RegupesertumAuth\LoginController@login');
  Route::post('/logout', 'RegupesertumAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'RegupesertumAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'RegupesertumAuth\RegisterController@register');

  Route::post('/password/email', 'RegupesertumAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'RegupesertumAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'RegupesertumAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'RegupesertumAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'panitium'], function () {
  Route::get('/login', 'PanitiumAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'PanitiumAuth\LoginController@login');
  Route::post('/logout', 'PanitiumAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'PanitiumAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'PanitiumAuth\RegisterController@register');

  Route::post('/password/email', 'PanitiumAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'PanitiumAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'PanitiumAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'PanitiumAuth\ResetPasswordController@showResetForm');
});
