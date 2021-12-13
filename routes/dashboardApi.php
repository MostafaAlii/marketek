<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Dahboard API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// All Api Here Must Be Authenticated
Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function(){
    
});

// Non Authenticated Api For Read Only
Route::group(['prefix' => 'v1', 'middleware' => ['guest:sanctum', 'changeLanguage']], function(){
    //Route::resource('Get/Groups', GroupApiController::class)->except(['edit', 'update', 'destroy']);
    Route::get('Get/Groups', 'GroupApiController@index');
    Route::get('Get/Group/By', 'GroupApiController@getGroupById');
});