<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeavesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Models\Department;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Request;

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
Route::get('/config-cache', function() {
     $exitCode = Artisan::call('config:cache');
    // $exitCodes = Artisan::call('route:cache');
     return 'Config cache cleared';
 });

Route::get('/', function () {
   return redirect()->route('home');
});
Route::get('/paidleaves', [LeavesController::class, 'paidleaves'])->name('paidleaves');

Auth::routes([
    'register' => false,
]);
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::controller(RoleController::class)
    ->prefix('role')
    ->as('role.')
    ->middleware('ReuseableMiddleware')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/detail/{id}', 'show')->name('detail');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });
Route::controller(UserController::class)
    ->prefix('user')
    ->as('user.')
    ->middleware('ReuseableMiddleware')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/detail/{id}', 'show')->name('detail');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}','destroy')->name('delete');
    });
Route::controller(DepartmentController::class)
    ->prefix('dept')
    ->as('dept.')
    ->middleware('ReuseableMiddleware')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/detail/{id}', 'show')->name('detail');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}','destroy')->name('delete');
    });
    Route::controller(DesignationController::class)
        ->prefix('desig')
        ->as('desig.')
        ->middleware('ReuseableMiddleware')
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('/detail/{id}', 'show')->name('detail');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
            Route::get('delete/{id}','destroy')->name('delete');
        });
    Route::controller(VehicleController::class)
        ->prefix('vehicle')
        ->as('vehicle.')
        ->middleware('ReuseableMiddleware')
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('/detail/{id}', 'show')->name('detail');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
            Route::get('delete/{id}','destroy')->name('delete');
        });
    Route::controller(LeavesController::class)
        ->prefix('leave')
        ->as('leave.')
        ->middleware('ReuseableMiddleware')
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('/detail/{id}', 'show')->name('detail');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
            Route::get('delete/{id}','destroy')->name('delete');
        });

// Route::controller(SalesController::class)
//     ->middleware('SheetPermission')
//     ->group(function () {
//         Route::get('sales', 'index')->name('sales');
//         Route::get('sale-closed', 'closeindex')->name('closed-sales');
//         Route::post('file-import',  'import')->name('file-import');
//         Route::get('client/add', 'create')->name('sale.create');
//         Route::post('client/add','store')->name('sale.store');
//         Route::get('client-detail/{id}',  'show')->name('sale-datail');
//         Route::get('client/edit/{id}', 'edit')->name('sale.edit');
//         Route::post('sale/update/{id}', 'update')->name('sale.update');
//         Route::get('sale/delete/{id}', 'destroy')->name('sale.delete');
//         Route::get('sale/conf-delete/{id}', 'delete')->name('sale.conf-delete');
//         Route::get('sale/export', 'export')->name('export');

//     });
//     Route::controller(CommentController::class)
//     ->prefix('comment')
//     ->as('cmnt.')
//     ->middleware('CommentsPermissions')
//     ->group(function () {
//         Route::get('add/{id}', 'create')->name('create');
//         Route::post('store', 'store')->name('store');
//         Route::get('edit/{id}', 'edit')->name('edit');
//         Route::post('update/{id}', 'update')->name('update');
//         Route::get('delete/{id}', 'destroy')->name('delete');
//     });
