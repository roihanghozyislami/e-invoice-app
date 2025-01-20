<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDF;
use File;
//use Carbon\Carbon;

class transaksicontroller extends Controller
{
    public function page(Request $request){
        // Membuat nomor invoice baru
        $today = now()->format('Ymd'); // Format tanggal hari ini: YYYYMMDD
        $prefix = "AJP/{$today}/";

        // Cari nomor urut terakhir dari database
        $lastTransaction = DB::table('transaksi')
        ->where('nomor_transaksi', 'like', "{$prefix}%")
        ->orderBy('nomor_transaksi', 'desc')
        ->first();

        if ($lastTransaction) {
            // Ambil nomor urut terakhir, tambahkan 1
            $lastNumber = (int)str_replace($prefix, '', $lastTransaction->nomor_transaksi);
            $newNumber = $lastNumber + 1;
        } else {
            // Jika belum ada, mulai dari 1
            $newNumber = 1;
        }

        $newTransactionNumber = $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT); // Format: 4 digit

        

        //detek input cari      
         // Ambil input keyword
        $keyword = $request->input('cari');

        // Jika keyword diisi, filter data; jika tidak, ambil semua data
        $data_transaksi = DB::table('transaksi')
            ->when($keyword, function ($query, $keyword) {
            return $query->where('nomor_transaksi', 'like', "%{$keyword}%");
        })
            ->orderBy('nomor_transaksi', 'desc')
            ->paginate(10); // Tambahkan paginasi

        return view('transaksi_page',['data_transaksi' => $data_transaksi, 'nomor_transaksi' => $newTransactionNumber, 'keyword' => $keyword]);
    }


    public function tambah(Request $request){

        // Validasi data input
        $request->validate([
            'nomor_transaksi' => 'required|unique:transaksi,nomor_transaksi', // Nomor transaksi sebagai primary key
            'total_harga' => 'required|numeric',
            'status' => 'required',
            'kendaraan' => 'required|array',
            'kendaraan.*.dari' => 'required|string',
            'kendaraan.*.tujuan' => 'required|string',
            'kendaraan.*.kendaraan' => 'required|string',
            'kendaraan.*.no_polisi' => 'required|string',
            'kendaraan.*.biaya' => 'required|numeric',
        ]);

        if (request('asuransi')=='0') {
            return redirect()->back()->with('error','Gagal Simpan Transaksi Karena Anda Belum Memilih Asuransi....');
        }else{
              // Hitung ulang total harga dari data kendaraan untuk validasi tambahan
            $calculatedTotal = array_reduce($request->kendaraan, function ($carry, $kendaraan) {
                return $carry + $kendaraan['biaya'];
            }, 0);

            // Pastikan total_harga yang dikirim sesuai dengan total yang dihitung
            if ($calculatedTotal != $request->total_harga) {
                return redirect()->back()->with('error', 'Total harga tidak valid! Harap periksa kembali data Anda.');
            }

            // Mulai transaksi database
            DB::beginTransaction();

            // Simpan data transaksi
            DB::table('transaksi')->insert([
                'nomor_transaksi' => $request->nomor_transaksi,
                'konsumen' => $request->konsumen,
                'total' => $calculatedTotal,
                'asuransi' => $request->asuransi, 
                'tanggal' => now(),
                'status' => $request->status,
            ]);

            // Simpan detail kendaraan
            foreach ($request->kendaraan as $kendaraan) {
                DB::table('transaksi_detail')->insert([
                    'nomor_transaksi' => $request->nomor_transaksi,
                    'dari' => $kendaraan['dari'],
                    'tujuan' => $kendaraan['tujuan'],
                    'kendaraan' => $kendaraan['kendaraan'],
                    'no_polisi' => $kendaraan['no_polisi'],
                    'biaya' => $kendaraan['biaya'],
                ]);
            }

            // Commit transaksi jika semua berhasil
            DB::commit();

            // Redirect dengan pesan sukses
            return redirect('/transaksi_page')->with('success', 'Transaksi berhasil disimpan');
        }
    }
}
