<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\TipeRuanganController;
use App\Http\Controllers\FasilitasRuanganController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PemohonController;
use App\Http\Controllers\TransaksiPembayaranController;
use App\Http\Controllers\DetailTransaksiPembayaranController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\InfoRuanganController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LantaiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [LoginController::class,'Beranda'])->name('Beranda');

Route::get('/login', [LoginController::class, 'formLogin'])->name('loginPage');
Route::post('/login', [LoginController::class, 'LoginStore'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'formRegister'])->name('formRegister');
Route::get('/detail-gedung/{id}', [LoginController::class, 'detailgedung'])->name('detailgedung');

Route::get('/admin-beranda', [AdminController::class, 'AdminBeranda'])->name('AdminBeranda');
Route::get('/profil', [ProfilController::class,'showProfil'])->name('profil.show');
Route::get('/profil/edit/{id_user}',[ProfilController::class,'editProfil'])->name('profil.edit');

Route::resource('posts', PostsController::class);
Route::resource('gedung', GedungController::class);
Route::resource('ruangan', RuanganController::class);
Route::resource('tiperuangan', TipeRuanganController::class);
Route::resource('fasilitasruangan', FasilitasRuanganController::class);
Route::resource('fasilitas', FasilitasController::class);
Route::resource('kelurahan', KelurahanController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::resource('galeri', GaleriController::class);
Route::resource('pemohon', PemohonController::class);
Route::resource('transaksipembayaran', TransaksiPembayaranController::class);
Route::resource('detail-transaksipembayaran', DetailTransaksiPembayaranController::class);
Route::resource('lantai', LantaiController::class);
Route::resource('user', UserController::class);
Route::resource('role', RoleController::class);
Route::resource('dokumen', DokumenController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => 'admin'], function () {
    Route::resource('pemohon', PemohonController::class);
    Route::resource('transaksipembayaran', TransaksiPembayaranController::class);

});

Route::get('pemohon_user/pilih-gedung', [PemohonController::class, 'pilihgedung'])->name('pemohon.pilihgedung');
Route::get('pemohon_user/pilih-ruangan/{id_gedung}', [PemohonController::class, 'pilihruangan'])->name('pemohon.pilihruangan');
Route::get('pemohon_user/create', [PemohonController::class, 'create'])->name('pemohon_user.create');
Route::get('pemohon_user/{id}', [PemohonController::class, 'show'])->name('pemohon_user.show');
Route::post('pemohon_user/create', [PemohonController::class, 'store'])->name('pemohon_user.store');

Route::get('/create/permohonan', [PemohonController::class,'create_halaman_depan'])->name('create.permohonan');
Route::get('/create/permohonan_user', [PemohonController::class,'create_halaman_depan'])->name('create.permohonan');

Route::get('transaksipembayaran_user', [TransaksiPembayaranController::class, 'pemohon_show'])->name('transaksipembayaran_user.show');
Route::get('detail-transaksipembayaran_user', [DetailTransaksiPembayaranController::class, 'pemohon_show'])->name('detail-transaksipembayaran_user.show');

Route::get('/api/ruangan/{id}', [RuanganController::class,'api'])->name('api.ruangan');
Route::get('/api/pemohon/{id}/{tahun}', [PemohonController::class,'api'])->name('api.pemohon');
Route::get('/api/lantai/{id}', [LantaiController::class,'api'])->name('api.lantai');
Route::get('/api/ruangan/{id}', [RuanganController::class,'api'])->name('api.ruangan');

Route::get('register/create', [LoginController::class, 'formRegister'])->name('regsiter.create');
Route::post('register/create', [LoginController::class, 'RegsiterStore'])->name('register.store');

Route::get('{id}/reset', [UserController::class, 'reset'])->name('user.reset');

