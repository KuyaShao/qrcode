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



Route::namespace('Business')->prefix('business')->group(function(){
    //
    Route::get('/login','AuthController@index')->name('business.login');
    Route::get('/register','AuthController@index')->name('business.register');
    Route::post('/login/log','AuthController@login');
    Route::post('/register/create','AuthController@register');
});

//user
Route::resource('profile','Api\ProfileController')->only(['update','index']);
Route::get('/profileShow','Api\ProfileController@profileShow');
Route::resource('/qrcode','Api\QrCodeController')->only(['create','index']);
Route::post('/health-declaration','Api\HealthDeclarationController')->name('healthDeclaration');
Route::post('/login','AuthController@login')->name('login');
Route::post('/register','AuthController@register')->name('register');


//
Route::resource('scanner','ScannerController')->only(['show','store','edit']);
Route::get('/logout','AuthController@logout');
Route::get('/','AuthController@index');
Route::get('{slug}','AuthController@index');

