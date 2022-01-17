<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GroupController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CountryCodeController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\CurrencyController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use App\Http\Controllers\Dashboard\SupplierController;
use App\Http\Controllers\Dashboard\ProvincesController;
use App\Http\Controllers\Dashboard\AreaController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SectionsController;
/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/Dashboard', [DashboardController::class, 'index']);
Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        /*********************************** Start User Dashboard ******************************** */
        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth'])->name('dashboard.user');
        /*********************************** End User Dashboard ******************************** */

        /*********************************** Start Admin Dashboard ******************************** */
        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->middleware(['auth:admin'])->name('dashboard.admin');
        /*********************************** End Admin Dashboard ******************************** */

        /******************************** Start Other Authentication Route ****************** */
        Route::middleware(['auth:admin'])->group( function () {

            /***********************************Start Groups ******************************** */
            Route::resource('Groups', GroupController::class)->except(['show']);
            /***********************************End Groups ******************************** */

            /***********************************Start Category ******************************** */
            Route::resource('Categories', CategoryController::class)->except(['show']);
            /***********************************End Category ******************************** */

            /***********************************Start SubCategory ******************************** */
            Route::resource('SubCategories', SubCategoryController::class)->except(['show']);
            /***********************************End SubCategory ******************************** */

            /***********************************Start CountryCode ******************************** */
            Route::resource('CountryCode', CountryCodeController::class)->except(['show']);
            /***********************************End CountryCode ******************************** */
            
            /***********************************Start Countries ******************************** */
            Route::resource('Countries', CountryController::class)->except(['show']);
            /***********************************End Countries ******************************** */

            /***********************************Start Countries ******************************** */
            Route::resource('Provinces', ProvincesController::class)->except(['show']);
            /***********************************End Countries ******************************** */

            /***********************************Start Cities ******************************** */
            Route::resource('Cities', CityController::class)->except(['show']);
            /***********************************End Cities ******************************** */

            /***********************************Start Areas ******************************** */
            Route::resource('Areas', AreaController::class)->except(['show']);
            /***********************************End Areas ******************************** */

            /***********************************Start Currency ******************************** */
            Route::resource('Currencies', CurrencyController::class)->except(['show']);
            /***********************************End Currency ******************************** */

            /***********************************Start Suppliers ******************************** */
            Route::resource('Suppliers', SupplierController::class);
            /***********************************End Suppliers ******************************** */

            /***********************************Start Services ******************************** */
            Route::resource('Sections', SectionsController::class)->except(['show']);
            /***********************************End Services ******************************** */

            /********************************* Start Products *****************************************/
            Route::get('Products', [ProductController::class, 'index'])->name('products');
            Route::get('Products_Create', [ProductController::class, 'create'])->name('product_general_information_create');
            Route::post('Products/General/Information/Create', [ProductController::class, 'store'])->name('product_general_information_store');
            /********************************* End Products *****************************************/
        });
        /******************************** End Other Authentication Route ****************** */
        require __DIR__.'/auth.php';
});
