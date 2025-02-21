<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\transaksicontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('landing-page',[logincontroller::class,'landing']);
Route::get('/login-page',[logincontroller::class,'login_page']);
Route::get('/dashboard',[logincontroller::class,'dashboard']);
Route::post('/login',[logincontroller::class,'login']);
Route::get('/logout',[logincontroller::class,'logout']);

Route::get('/transaksi-page',[transaksicontroller::class,'page']);
Route::get('/transaksi-form',[transaksicontroller::class,'formadd']);
Route::post('/transaksi/add',[transaksicontroller::class,'add']);
Route::get('/transaksi/lunas/{id}',[transaksicontroller::class,'paid']);
Route::get('/transaksi/delete/{id}',[transaksicontroller::class,'delete']);
Route::get('/transaksi-detail/{id}',[transaksicontroller::class,'detail']);
Route::get('/transaksi/invoice/{id}',[transaksicontroller::class,'invoice']);
Route::get('/transaksi/kwitansi/{id}',[transaksicontroller::class,'kwitansi']);
Route::get('/transaksi/cari',[transaksicontroller::class,'cari']);