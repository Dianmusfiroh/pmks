<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PmksController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PenerimaBantuanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CalonPenrimaController;
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
    return view('welcome');
});

Auth::routes();
Auth::routes(['verify' => true]);
Route::middleware(['auth', 'verified'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('pmks', PmksController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::resource('penerimaBantuan', PenerimaBantuanController::class);
Route::resource('calonPenerima', CalonPenrimaController::class);
Route::get('laporanPMKS', [LaporanController::class, 'laporanPmks'])->name('laporanPmks');
Route::get('laporanPenyaluran', [LaporanController::class, 'laporanPenyaluran'])->name('laporanPenyaluran');

});
