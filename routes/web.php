<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\transaksicontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login-page',[logincontroller::class,'login_page']);
Route::get('/dashboard',[logincontroller::class,'dashboard']);
Route::post('/login',[logincontroller::class,'login']);
Route::get('/logout',[logincontroller::class,'logout']);

Route::get('/transaksi-page',[transaksicontroller::class,'page']);
Route::post('/transaksi/tambah',[transaksicontroller::class,'tambah']);
Route::get('/transaksi/tangkap/{id}',[transaksicontroller::class,'tangkap']);
Route::post('/transaksi/edit',[transaksicontroller::class,'edit']);
Route::get('/transaksi/hapus/{id}',[transaksicontroller::class,'hapus']);
Route::get('/transaksi/detail/{id}',[transaksicontroller::class,'detail']);
Route::get('/transaksi/pdf/{id}',[transaksicontroller::class,'cetak']);
Route::get('/transaksi/cari',[transaksicontroller::class,'cari']);