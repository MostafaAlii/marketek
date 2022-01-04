<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function(Request $request) {
    return $request->user();
});

Route::post('/auth/token', [AuthController::class, 'store'])->name('supplierLogin');
Route::post('register', [AuthController::class, 'register']);