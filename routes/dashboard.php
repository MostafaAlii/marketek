<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
//use App\Http\Controllers\Dashboard\SectionController;
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
        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth'])->name('dashboard.user');
        
        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->middleware(['auth:admin'])->name('dashboard.admin');

        /***********************************Start Sections ******************************** */
        Route::resource('Sections', SectionController::class)->except(['show']);
        Route::post('Sections/update/{id}',[App\Http\Controllers\Dashboard\SectionController::class, 'update']) -> name('Sections.update');
        Route::get('Sections/file-export', [App\Http\Controllers\Dashboard\SectionController::class, 'fileExport'])->name('Sections.file-export');
        Route::get('Sections/delete/{id}',[App\Http\Controllers\Dashboard\SectionController::class, 'delete']) -> name('Sections.delete');
        /***********************************End Sections ******************************** */
        
        require __DIR__.'/auth.php';
});