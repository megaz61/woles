<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\HistoryController;

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'store']);
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/home', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/catalogue', [DashboardController::class, 'ctlg'])->name('katalog');
Route::get('/userprofile', [DashboardController::class, 'profile']);
Route::get('/upBarang', [BarangController::class, 'create']);
Route::post('/upBarang', [BarangController::class, 'store'])->name('upBarang.store');
Route::get('/pesan/{id}', [PesananController::class, 'index'])->name('pesan');
Route::post('/pesan/{id}', [PesananController::class, 'pesan']);
Route::get('/check-out', [PesananController::class, 'check_out']);
Route::delete('/check-out/{id}', [PesananController::class, 'delete']);
Route::get('/konfirmasi-check-out', [PesananController::class, 'konfirmasi']);
Route::get('/editProfil', [DashboardController::class, 'editProfil']);
Route::post('/editProfil', [DashboardController::class, 'store']);
Route::get('/history', [HistoryController::class, 'index']);
Route::get('/history/{id}', [HistoryController::class, 'detail']);
Route::get('/editBarang/{id}', [BarangController::class, 'editBarang']);
Route::post('/updateBarang/{id}', [BarangController::class, 'updateBarang']);
Route::get('/checkon/{id}',[PesananController::class, 'checkon']);
Route::post('/upBukti/{id}', [HistoryController::class, 'bukti']);

//Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
