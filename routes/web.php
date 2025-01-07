<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\invoicecontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login-page',[logincontroller::class,'login_page']);
Route::get('/dashboard',[logincontroller::class,'dashboard']);
Route::post('/login',[logincontroller::class,'login']);
Route::get('/logout',[logincontroller::class,'logout']);

Route::get('/invoice-page',[invoicecontroller::class,'invoice_page']);
Route::post('/invoice/tambah',[invoicecontroller::class,'tambah']);
Route::get('/invoice/tangkap/{id}',[invoicecontroller::class,'tangkap']);
Route::post('/invoice/edit',[invoicecontroller::class,'edit']);
Route::get('/invoice/hapus/{id}',[invoicecontroller::class,'hapus']);
Route::get('/invoice/detail/{id}',[invoicecontroller::class,'detail']);
Route::get('/invoice/pdf/{id}',[invoicecontroller::class,'pdf']);
Route::post('/invoice/pdf/cetak',[invoicecontroller::class,'cetak']);