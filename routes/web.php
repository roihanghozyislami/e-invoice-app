<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\transaksicontroller;
use App\Http\Middleware\ceklogin;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([ceklogin::class])->group(function () {
    Route::get('/dashboard',[logincontroller::class,'dashboard']);
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

    Route::get('/transaksi/all',[transaksicontroller::class,'transaksiall']);
    Route::get('/transaksi/pending',[transaksicontroller::class,'transaksipending']);
    Route::get('/transaksi/done',[transaksicontroller::class,'transaksidone']);
    Route::get('/transaksi/month',[transaksicontroller::class,'transaksimonth']);
    Route::get('/transaksi/day',[transaksicontroller::class,'transaksiday']);
    Route::get('/transaksi/year',[transaksicontroller::class,'transaksiyear']);

    Route::get('/download/all',[transaksicontroller::class,'downloadall']);
    Route::get('/download/pending',[transaksicontroller::class,'downloadpending']);
    Route::get('/download/done',[transaksicontroller::class,'downloaddone']);
    Route::get('/download/month',[transaksicontroller::class,'downloadmonth']);
    Route::get('/download/day',[transaksicontroller::class,'downloadday']);
    Route::get('/download/year',[transaksicontroller::class,'downloadyear']);
});


Route::get('landing-page',[logincontroller::class,'landing']);
Route::get('/login-page',[logincontroller::class,'login_page']);
Route::post('/login',[logincontroller::class,'login']);