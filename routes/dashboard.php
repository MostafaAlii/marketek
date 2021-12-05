<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GroupController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SubCategoryController;
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

<<<<<<< HEAD
        /***********************************Start Sections ******************************** */
        Route::resource('Sections', SectionController::class)->except(['show']);
        Route::post('Sections/update/{id}',[App\Http\Controllers\Dashboard\SectionController::class, 'update']) -> name('Sections.update');
        Route::get('Sections/file-export', [App\Http\Controllers\Dashboard\SectionController::class, 'fileExport'])->name('Sections.file-export');
        Route::get('Sections/delete/{id}',[App\Http\Controllers\Dashboard\SectionController::class, 'delete']) -> name('Sections.delete');
        /***********************************End Sections ******************************** */
        
=======
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
        });
        /******************************** End Other Authentication Route ****************** */
>>>>>>> 8273472cd26dc1dcea35b25540200588ef209088
        require __DIR__.'/auth.php';
});