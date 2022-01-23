<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Auth\NewPasswordController;
use App\Http\Controllers\Api\Auth\EmailVerificationController;
use App\Http\Controllers\Api\Category\CategoryApiController;
use App\Http\Controllers\Api\Country\CountriesApiController;
use App\Http\Controllers\Api\Province\ProvincesApiController;
use App\Http\Controllers\Api\City\CitiesApiController;
use App\Http\Controllers\Api\Area\AreasApiController;
use App\Http\Controllers\Api\Currency\CurrenciesApiController;
use App\Http\Controllers\Api\CountryCode\CountryCodeApiController;
use App\Http\Controllers\Api\Supplier\SupplierApiController;
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
Route::middleware(['auth:sanctum'])->group( function () {
    Route::get('/user', [AuthController::class, 'getUserInfo']);
    Route::post('/sign-out', [AuthController::class, 'signOut']);
    // Email Verification ::
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail']);
    Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
});

// Non Authenticated Api Route
Route::middleware(['guest:sanctum'])->group( function () {
    Route::post('/signin', [AuthController::class, 'signin']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('second_register/{id}', [AuthController::class, 'second_step_register']);
    // Password Resetting Api ::
    Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
    Route::post('reset-password', [NewPasswordController::class, 'reset']);
    // Country Code && Country Flag ::
    Route::get('getCountryCode', [CountryCodeApiController::class, 'getCountryCode']);
    // Countries Api ::
    Route::get('getCountries', [CountriesApiController::class, 'getCountries']);
    Route::get('Country/{id}/show', [CountriesApiController::class, 'getCountryById']);
    // Proviences Api ::
    Route::get('getProviences', [ProvincesApiController::class, 'getProviences']);
    Route::get('Provience/{id}/show', [ProvincesApiController::class, 'getProvienceById']);
    // Cities Api ::
    Route::get('getCities', [CitiesApiController::class, 'getCities']);
    Route::get('City/{id}/show', [CitiesApiController::class, 'getCityById']);
    // Areas Api ::
    Route::get('getAreas', [AreasApiController::class, 'getAreas']);
    Route::get('Area/{id}/show', [AreasApiController::class, 'getAreaById']);
    // Currencies Api ::
    Route::get('getCurrencies', [CurrenciesApiController::class, 'getCurrencies']);
    Route::get('Currency/{id}/show', [CurrenciesApiController::class, 'getCurrencyById']);
    // Categories && SubCategory ::
    Route::get('getMainCategories', [CategoryApiController::class, 'getMainCategory']);
    Route::get('Category/{id}/show', [CategoryApiController::class, 'getCategoryById']);
    Route::get('getSubCategories', [CategoryApiController::class, 'getSubCategory']);
    // Supplier ::
    Route::get('Supplier/{id}/show', [SupplierApiController::class, 'getSupplierById']);
    Route::post('Supplier/{id}/edit', [SupplierApiController::class, 'updateSupplierInfo']);
});