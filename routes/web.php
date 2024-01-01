<?php

use App\Http\Controllers\AcproblemController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryKelasController;
use App\Http\Controllers\PengajuanBarangController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\TindakLanjutSaranaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::middleware('auth')->group(function() {


    Route::get('/inventory_ac/cetak_pdf', 'InventoryACController@cetak_pdf')->name('inventoryac.cetak_pdf');
    Route::get('/kebersihan/cetak_pdf', 'KebersihanOutdoorController@cetak_pdf')->name('kebersihan_outdoor.cetak_pdf');
    Route::get('/ruangan/cetak_pdf', 'RuanganController@cetak_pdf')->name('ruangan.cetak_pdf');
    Route::get('/inventory_ruangan/cetak_pdf', 'InventoryController@cetak_pdf')->name('inventory_ruangan.cetak_pdf');
    Route::get('/inventory_kelas/cetak_pdf', 'InventoryKelasController@cetak_pdf')->name('inventory_kelas.cetak_pdf');
    Route::get('/acproblem/cetak_pdf', 'AcproblemController@cetak_pdf')->name('acproblem.cetak_pdf');
    Route::get('/pengajuanbarang/cetak_pdf', 'PengajuanBarangController@cetak_pdf')->name('pengajuanbarang.cetak_pdf');
    Route::get('/tindaklanjutsarana/cetak_pdf', 'TindakLanjutSaranaController@cetak_pdf')->name('tindaklanjutsarana.cetak_pdf');


    Route::resource('inventory_ac', InventoryACController::class);
    Route::resource('kebersihan_outdoor', KebersihanOutdoorController::class);
    Route::get('kebersihan_outdoor/period/{id}', 'KebersihanOutdoorController@iperiod')->name('kebersihan_outdoor.period');
    Route::get('kebersihan_outdoor/create/period/{id}', 'KebersihanOutdoorController@cperiod')->name('kebersihan_outdoor.create.period');
    Route::post('kebersihan_outdoor/store/period', 'KebersihanOutdoorController@speriod')->name('kebersihan_outdoor.store.period');
    Route::get('kebersihan_outdoor/period_edit/{id}', 'KebersihanOutdoorController@perioedit')->name('kebersihan_outdoor.period_edit');

    
    
    Route::resource('ruangan', RuanganController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('inventorykelas', InventoryKelasController::class);
    Route::resource('acproblem', AcproblemController::class);
    Route::resource('pengajuanbarang', PengajuanBarangController::class);
    Route::resource('tindaklanjutsarana', TindakLanjutSaranaController::class);

    
});
