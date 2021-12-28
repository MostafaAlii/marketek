<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Api\GroupApiController;
use App\Http\Controllers\Dashboard\Api\Auth\SupplierTokenController;

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




Route::post('Auth/Token', [SupplierTokenController::class, 'store']);




// Non Authenticated Api For Read Only
Route::group([ 'middleware' => ['guest:sanctum', 'changeLanguage']], function(){
    Route::post('Get/Groups', [GroupApiController::class, 'index']);
    Route::post('Get/Group/By', [GroupApiController::class, 'getGroupById']);
});
