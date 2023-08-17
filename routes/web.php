<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeafletController;
use App\Http\Controllers\Admin\SatkerController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LeafletController::class, 'index']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/admin/peta', [DashboardController::class, 'leaflet'])->name('leaflet');
Route::resource('/admin/tabel', SatkerController::class, ['names' => 'satkers']);
Auth::routes();


