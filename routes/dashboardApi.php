<?php
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
    Route::get('Get/Group/By/{id}', 'GroupApiController@getGroupById');
    // Main Categories && SubCategory Api
    Route::get('Get/Category', 'CategoryApiController@getMainCategory');
    Route::get('Get/Category/By/{id}', 'CategoryApiController@getCategoryById');
    Route::get('Get/SubCategory', 'CategoryApiController@getSubCategory');
    // Country Api
    Route::get('Get/Countries', 'CountriesApiController@getAllCountries');
    Route::get('Get/Countries/By/{id}', 'CountriesApiController@getCountryById');
    // Provinces Api
    Route::get('Get/Provinces', 'ProvincesApiController@getAllProvinces');
    Route::get('Get/Provinces/By/{id}', 'ProvincesApiController@getProvinceByID');
    // Cities Api
    Route::get('Get/Cities', 'CitiesApiController@getAllCities');
    Route::get('Get/City/By/{id}', 'CitiesApiController@getCityById');
    // Area Api
    Route::get('Get/Areas', 'AreaApiController@getAllArea');
    Route::get('Get/Area/By/{id}', 'AreaApiController@getAreaById');
});