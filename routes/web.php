<?php

use App\Http\Controllers\AdlBabController;
use App\Http\Controllers\AdlMakanController;
use App\Http\Controllers\AdlMandiController;
use App\Http\Controllers\AdlPakaianController;
use App\Http\Controllers\AdlPerawatanDiriController;
use App\Http\Controllers\AdlTransferController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PmksController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PenerimaBantuanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\JenisPmksController;
use App\Http\Controllers\JenisDisabilitasController;
use App\Http\Controllers\CalonPenrimaController;
use App\Http\Controllers\DataAlternatifController;
use App\Http\Controllers\DataKriteriaController;
use App\Http\Controllers\DataSubKriteriaController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\GuessController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KppkController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\SpesificKecacatanController;
use App\Http\Controllers\StpKetStatusRumahController;
use App\Http\Controllers\StpStatusKeberadaanKelController;
use App\Http\Controllers\StpStatusRumahController;
use App\Http\Controllers\UppkController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('landing');
// })->name('beranda');
Route::get('/',[GuessController::class,'beranda'])->name('beranda');
Route::get('cekBansos',[GuessController::class,'cekBansos'])->name('cekBansos');
Route::get('statik',[GuessController::class,'statik'])->name('statik');
Auth::routes();
Auth::routes(['verify' => true]);
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('pmks', PmksController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('penerimaBantuan', PenerimaBantuanController::class);
    Route::resource('calonPenerima', CalonPenrimaController::class);
    Route::resource('dataKriteria', DataKriteriaController::class);
    Route::resource('kelurahan', KelurahanController::class);
    // Route::delete('dataKriteria/{id}',DataKriteriaController::class);
    Route::resource('subDataKriteria', DataSubKriteriaController::class);
    Route::resource('assessment/jenisPmks', JenisPmksController::class);

    Route::resource('assessment/jenisDisabilitas', JenisDisabilitasController::class);
    Route::resource('assessment/StatusKeberadaanKeluarga', StpStatusKeberadaanKelController::class);
    Route::resource('assessment/StatusRumah', StpStatusRumahController::class);
    Route::resource('assessment/KeteranganStatusRumah', StpKetStatusRumahController::class);
    Route::resource('assessment/spesificKecacatan', SpesificKecacatanController::class);
    Route::resource('assessment/adlmandi', AdlMandiController::class);
    Route::resource('assessment/adlmakan', AdlMakanController::class);
    Route::resource('assessment/adlbab', AdlBabController::class);
    Route::resource('assessment/adlpakaian', AdlPakaianController::class);
    Route::resource('assessment/adlPerawatanDiri', AdlPerawatanDiriController::class);
    Route::resource('assessment/adltransfer', AdlTransferController::class);
    Route::resource('assessment/kppk', KppkController::class);
    Route::resource('assessment/uppk', UppkController::class);
    Route::resource('assessment/score', ScoreController::class);
    Route::resource('dataAlternatif', DataAlternatifController::class);
    Route::resource('penilaian', PenilaianController::class);
    Route::resource('perhitungan', PerhitunganController::class);
    Route::resource('DataUser', DataUserController::class);

    Route::get('search', [CalonPenrimaController::class, 'search']);
    Route::get('data', [CalonPenrimaController::class, 'data']);
    Route::get('laporanPMKS', [LaporanController::class, 'laporanPmks'])->name('laporanPmks');
    Route::get('laporanPMKS/cetakPmks', [LaporanController::class, 'cetakPmks'])->name('cetakPmks');
    Route::get('laporanPenyaluran', [LaporanController::class, 'laporanPenyaluran'])->name('laporanPenyaluran');
    Route::get('laporanPenyaluran/cetakLaporan', [LaporanController::class, 'cetakLaporan'])->name('cetakLaporan');
    Route::post('/save-token', [App\Http\Controllers\HomeController::class, 'saveToken'])->name('save-token');
    Route::get('generate', [PenerimaBantuanController::class, 'generate'])->name('generate');
    Route::get('getfilter', [PenerimaBantuanController::class, 'getfilter'])->name('getfilter');
    Route::get('pmks/{pmk}/lihat', [PmksController::class, 'lihat'])->name('lihat');
    Route::put('status/{pmk}',[PmksController::class, 'status'])->name('status');
    Route::get('nilai/utility', [NilaiController::class, 'utility'])->name('utility');
    // Route::get('nilai/hasil', [NilaiController::class, 'hasil'])->name('hasil');
    Route::get('nilai/getHasil', [NilaiController::class, 'getHasil'])->name('getHasil');
    Route::get('nilai/getUtility', [NilaiController::class, 'getUtility'])->name('getUtility');
    Route::get('filter', [PmksController::class, 'filter'])->name('filter');
    Route::get('dataPmks', [PmksController::class, 'dataPmks'])->name('dataPmks');
    Route::get('dataPerhitungan', [PerhitunganController::class, 'dataPerhitungan'])->name('dataPerhitungan');
    Route::get('bobotKriteria', [PerhitunganController::class, 'bobotKriteria'])->name('bobotKriteria');
    Route::get('normalisasiBobotKriteria', [PerhitunganController::class, 'normalisasiBobotKriteria'])->name('normalisasiBobotKriteria');
    Route::get('dataUtility', [PerhitunganController::class, 'dataUtility'])->name('dataUtility');
    Route::get('dataHasil', [PerhitunganController::class, 'dataHasil'])->name('dataHasil');
    Route::get('dataHasilLaporan', [LaporanController::class, 'dataHasil'])->name('dataHasilLaporan');
    Route::get('hasil', [PerhitunganController::class, 'hasil'])->name('hasil');
    Route::get('memberStatus', [PmksController::class, 'memberStatus'])->name('memberStatus');
    Route::get('dataKec', [PmksController::class, 'dataKec'])->name('dataKec');
    Route::get('dataPmksKonfirmasi', [PmksController::class, 'dataPmksKonfirmasi'])->name('dataPmksKonfirmasi');
    Route::get('LaporandataPmks', [LaporanController::class, 'LaporandataPmks'])->name('LaporandataPmks');
    Route::get('LaporandataPmksFilter', [LaporanController::class, 'LaporandataPmksFilter'])->name('LaporandataPmksFilter');
    Route::get('cetakFilterPmks', [LaporanController::class, 'cetakFilterPmks'])->name('cetakFilterPmks');
    Route::get('dataLaporanHasil', [LaporanController::class, 'dataLaporanHasil'])->name('dataLaporanHasil');
    Route::get('dataLaporanHasilFilter', [LaporanController::class, 'dataLaporanHasilFilter'])->name('dataLaporanHasilFilter');
    Route::get('cetakLaporanFilter', [LaporanController::class, 'cetakLaporanFilter'])->name('cetakLaporanFilter');
    

});
