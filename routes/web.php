<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SatkerController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\JumlahController;


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

Route::get('/', [HomeController::class, 'index']);


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
Route::get('/admin/peta', [DashboardController::class, 'index'])->name('peta');
Route::resource('/admin/satker', SatkerController::class, ['names' => 'satkers']);
Route::resource('/admin/jabatan', JabatanController::class, ['names' => 'jabatans']);
Route::resource('/admin/jumlahpegawai', JumlahController::class, ['names' => 'jumlahs']);
Route::get('/admin/deleteMultiple', [JumlahController::class, 'deleteMultiple'])->name('jumlahs.deleteMultiple');
Route::get('/admin/deleteMultipleGo', [JumlahController::class, 'deleteMultipleGo'])->name('jumlahs.deleteMultipleGo');

Auth::routes();


