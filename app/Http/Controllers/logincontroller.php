<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class logincontroller extends Controller
{
    public function login_page(){
        return view('login_page');
    }

    public function dashboard(){

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $today = Carbon::today();
        $currentYear = Carbon::now()->year;

        
        $total_transaksi = DB::table('transaksi')
            ->get()
            ->count();

        $transaksi_belum_bayar = DB::table('transaksi')
            ->get()
            ->where('status','Belum Bayar')
            ->count();

        $transaksi_lunas = DB::table('transaksi')
            ->get()
            ->where('status','Telah Lunas')
            ->count();

        $transaksi_bulan = DB::table('transaksi')
            ->whereBetween('tanggal', [$startOfMonth, $endOfMonth])
            ->count(); 

        $transaksi_hari = DB::table('transaksi')
            ->whereDate('tanggal', '=', $today)
            ->count(); 

        $transaksi_tahun = DB::table('transaksi')
            ->whereYear('tanggal', '=', $currentYear)
            ->count(); 

        return view('dashboard', compact('total_transaksi','transaksi_belum_bayar','transaksi_lunas','transaksi_bulan','transaksi_hari','transaksi_tahun'));
    }

    public function login(){
        $username = request('username');
        $password = request('password');

        $data = DB::table('user')->where('username',$username)->first();
        if($data){
            if($password == $data->password){
                Session::put('password',$data->password);
                Session::put('username',$data->username);
                Session::put('nama',$data->nama_lengkap);
                Session::put('login',TRUE);
                return redirect('/dashboard');
            }else{
                return redirect('/login-page')->with('gagal',"Password Salah...");
            }
        }else{
            return redirect('/login-page')->with('gagal',"Username Tidak Terdaftar...");
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/login-page')->with('logout','Kamu Sudah Logout...');
    }

    public function landing(){
        $total_user = DB::table('user')
            ->get()
            ->count();

            return view('landing', compact('total_user'));
    }
}
