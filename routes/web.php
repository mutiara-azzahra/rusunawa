<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RusunController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\TipeRuanganController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FasilitasGedungController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\PemohonController;
use App\Http\Controllers\TransaksiPembayaranController;
use App\Http\Controllers\DetailTransaksiPembayaranController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LayananInformasiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LantaiController;
use App\Http\Controllers\SyaratMendaftarController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlokController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RusunawaBanjarmasinController;



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

//LoginController
Route::get('/', [LoginController::class,'Beranda'])->name('Beranda');
Route::get('/tanya-jawab', [LoginController::class,'faq'])->name('tanya-jawab');
Route::get('/latar-belakang', [LoginController::class,'latarBelakang'])->name('latar-belakang');
Route::get('/login', [LoginController::class, 'formLogin'])->name('loginPage');
Route::post('/login', [LoginController::class, 'LoginStore'])->name('login');
Route::get('/forgot-password', [LoginController::class, 'lupaPassword'])->name('forgot-password');
Route::post('/forgot-password', [LoginController::class, 'cariEmail'])->name('cariEmail');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'formRegister'])->name('formRegister');
Route::get('/detail-gedung/{id}', [LoginController::class, 'detailgedung'])->name('detailgedung');
Route::get('/detail-rusun/{id}', [LoginController::class, 'detailrusun'])->name('detailrusun');
Route::get('register/create', [LoginController::class, 'formRegister'])->name('register.create');
Route::post('register/create', [LoginController::class, 'RegsiterStore'])->name('register.store');

//AdminController
Route::get('/beranda', [AdminController::class, 'beranda'])->name('beranda');

//ProfilController
Route::get('/profil', [ProfilController::class,'showProfil'])->name('profil.show');
Route::get('/profil/edit/{id_user}',[ProfilController::class,'editProfil'])->name('profil.edit');

//Resource
Route::resource('posts', PostsController::class);
Route::resource('rusun', RusunController::class);
Route::resource('gedung', GedungController::class);
Route::resource('ruangan', RuanganController::class);
Route::resource('tiperuangan', TipeRuanganController::class);
Route::resource('fasilitas', FasilitasController::class);
Route::resource('kelurahan', KelurahanController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::resource('kota', KotaController::class);
Route::resource('galeri', GaleriController::class);
Route::resource('pemohon', PemohonController::class);
Route::resource('layanan-informasi', LayananInformasiController::class);
Route::resource('transaksi-pembayaran', TransaksiPembayaranController::class);
Route::resource('detail-transaksipembayaran', DetailTransaksiPembayaranController::class);
Route::resource('syarat-mendaftar', SyaratMendaftarController::class);
Route::resource('lantai', LantaiController::class);
Route::resource('user', UserController::class);
Route::resource('role', RoleController::class);
Route::resource('blok', BlokController::class);

//HomeController
//middleware
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => 'admin'], function () {
    Route::resource('pemohon', PemohonController::class);
    Route::resource('transaksi-pembayaran', TransaksiPembayaranController::class);
});

//RusunawaBanjarmasinController
Route::post('/kirimemail',[RusunawaBanjarmasinController::class,'index'])->name('sendMail');

//PemohonController
Route::get('pemohon_user/pilih-gedung', [PemohonController::class, 'pilihgedung'])->name('pemohon.pilihgedung');
Route::get('pemohon_user/pilih-ruangan/{id_gedung}', [PemohonController::class, 'pilihruangan'])->name('pemohon.pilihruangan');
Route::get('pemohon_user/pesan-ruangan', [PemohonController::class, 'pesanRuangan'])->name('pemohon.pesanRuangan');
Route::get('pemohon_user/create', [PemohonController::class, 'create'])->name('pemohon_user.create');
Route::get('pemohon_user/{id}', [PemohonController::class, 'show'])->name('pemohon_user.show');
Route::post('pemohon_user/{id}', [PemohonController::class, 'update'])->name('pemohon_user.update');
Route::post('pemohon_users/create', [PemohonController::class, 'store'])->name('pemohon_user.store');
// Route::get('/create/permohonan/{id_gedung}', [PemohonController::class,'pilihruangan'])->name('create.permohonan');
// Route::get('/create/permohonan_user/{id_gedung}', [PemohonController::class,'create_halaman_depan'])->name('create.permohonan-user');
Route::get('penghuni', [PemohonController::class, 'show_penghuni'])->name('penghuni.index');
Route::get('{id}/nonaktif', [PemohonController::class, 'nonaktif'])->name('pemohon.nonaktif');
Route::get('{id}/verifikasi', [PemohonController::class, 'verifikasi'])->name('pemohon.verifikasi');
Route::get('/api_harga/pemohon/{id}/{tahun}', [PemohonController::class,'api'])->name('api.pemohon');

//Report
Route::get('penghuni/report', [PemohonController::class, 'cetak_pdf'])->name('report.pemohon');
Route::get('detail-transaksi-pembayaran/report/{id}', [DetailTransaksiPembayaranController::class, 'cetak_detail_transaksi_user'])->name('report.detail-transaksi-pembayaran');
Route::get('transaksi/report', [TransaksiPembayaranController::class, 'cetak_transaksi_pembayaran_bulanan'])->name('report.transaksi-pembayaran');


//FasilitasController
Route::post('fasilitas-gedung', [FasilitasGedungController::class, 'fasilitas_gedung'])->name('fasilitas.fasilitas-gedung');
Route::post('fasilitas-gedung/destroy', [FasilitasGedungController::class, 'destroy'])->name('fasilitas-gedung.destroy');

//TransaksiPembayaranController
Route::get('transaksi-pembayaran/filter/cetak', [TransaksiPembayaranController::class, 'filter'])->name('transaksi-pembayaran.filter');
Route::get('transaksi-pembayaran_user', [TransaksiPembayaranController::class, 'pemohon_show'])->name('transaksi-pembayaran_user.show');
Route::get('detail-transaksipembayaran_user', [DetailTransaksiPembayaranController::class, 'pemohon_show'])->name('detail-transaksipembayaran_user.show');

//api
Route::get('/api/ruangan_harga/{id}', [RuanganController::class,'api_harga'])->name('api.ruangan');
Route::get('/api/lantai/{id}', [LantaiController::class,'api'])->name('api.lantai');
Route::get('/api/ruangan_gedung/{id}', [RuanganController::class,'api_lantai'])->name('api_lantai.ruangan');
Route::get('/api/kecamatan/{id}', [KecamatanController::class,'api'])->name('api.kecamatan');

//UserController
Route::get('{id}/reset', [UserController::class, 'reset'])->name('user.reset');

