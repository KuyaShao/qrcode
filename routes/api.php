<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();


});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   return $request->user();
});
//
//Route::post('/login','AuthController@login');
//Route::post('/register','AuthController@register');
//Route::get('/questionare','AuthController@index');
//Route::apiResource('profile','Api\ProfileController')->only(['update','index']);

Route::namespace('Business')->prefix('business')->group(function(){
    //

    Route::post('/login/log','AuthController@login');
    Route::post('/register/create','AuthController@register');
});

//user
Route::apiResource('profile','Api\ProfileController')->only(['update'])->middleware('auth:sanctum');
Route::get('/profileShow','Api\ProfileController@profileShow')->middleware('auth:sanctum');
Route::apiResource('/qrcode','Api\QrCodeController')->only(['create'])->middleware('auth:sanctum');
Route::post('/health-declaration','Api\HealthDeclarationController')->name('healthDeclaration');

Route::get('/login','AuthController@index')->name('login');
Route::post('/logins','AuthController@login');
//Route::post('/register','AuthController@register')->name('register');
Route::post('/register','AuthController@register');

//
Route::apiResource('scanner','ScannerController')->only(['edit','store']);
Route::get('/logout','AuthController@logout');
