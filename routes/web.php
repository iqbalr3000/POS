<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;


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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
      
    //admin
    Route::resource('/brands', BrandController::class);
    Route::resource('/distributors', DistributorController::class);
    Route::resource('/items', ItemController::class);

    //kasir
    Route::resource('/transactions', TransactionController::class);

    //manager
    Route::get('/reportsTransaction', [ReportController::class, 'index'])->name('reports.transaction');
    Route::get('/reportsItem', [ReportController::class, 'barang'])->name('reports.item');
    Route::get('/laporan/cari', [ReportController::class, 'cari'])->name('reports.cari');
    Route::get('/laporan/search', [ReportController::class, 'search'])->name('reports.search');

});
