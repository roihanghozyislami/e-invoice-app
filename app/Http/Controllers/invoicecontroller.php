<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDF;
use File;
use Carbon\Carbon;

class invoicecontroller extends Controller
{
    public function invoice_page(Request $request){
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
            ->paginate(10); // Tambahkan paginasi

        return view('transaksi_page',['data_transaksi' => $data_transaksi, 'nomor_transaksi' => $newTransactionNumber, 'keyword' => $keyword]);
    }


    public function tambah(){
        if (request('asuransi')=='0') {
            return redirect()->back()->with('asuransi','Gagal Membuat Invoice Karena Anda Belum Memilih Asuransi....');
        }else{
            DB::table('invoice')->insert([
                'nomor_invoice' =>request('nomor_invoice'),
                'konsumen' =>request('konsumen'),
                'angkut_dari' =>request('angkut_dari'),
                'tujuan' =>request('tujuan'),
                'jenis_kendaraan_merk' =>request('kendaraan'),
                'no_rangka_polisi' =>request('rangka_polisi'),
                'no_mesin' =>request('no_mesin'),
                'warna' =>request('warna'),
                'biaya' =>request('biaya'),
                'terbilang' =>request('terbilang'),
                'asuransi' =>request('asuransi'),
                'tanggal' =>request('tanggal')
            ]);
            return redirect('/invoice-page')->with('tambah','Berhasil Membuat Invoice...');
        } 
    }

    public function tangkap($id){
        $hasil = DB::table('invoice')->where('id_invoice',$id)->first();
        return response()->json($hasil);
    }

    public function edit(Request $Request){
        if (request('asuransi')=='0') {
            return redirect()->back()->with('asuransi','Gagal Membuat Invoice Karena Anda Belum Memilih Asuransi....');
        }else{
            DB::table('invoice')->where('id_invoice',$Request->id_invoice)->update([
                'konsumen' =>request('konsumen'),
                'angkut_dari' =>request('angkut_dari'),
                'tujuan' =>request('tujuan'),
                'jenis_kendaraan_merk' =>request('kendaraan'),
                'no_rangka_polisi' =>request('rangka_polisi'),
                'no_mesin' =>request('no_mesin'),
                'warna' =>request('warna'),
                'biaya' =>request('biaya'),
                'terbilang' =>request('terbilang'),
                'asuransi' =>request('asuransi'),
                'tanggal' =>request('tanggal')
            ]);
            return redirect('/invoice-page')->with('edit','Invoice Berhasil Diubah...');
        } 
    }

    public function hapus($id){
        DB::table('invoice')->where('id_invoice',$id)->delete();
        return redirect('/invoice-page');
    }

    public function detail($id){

        $data_invoice_penagihan_detail = DB::table('invoice')
        ->where('id_invoice', $id)
        ->get();
        return view('invoice_page_detail',['data_invoice_penagihan_detail' => $data_invoice_penagihan_detail]);  
    }

    public function cetak($id){
        $data_invoice = DB::table('invoice')
            ->where('id_invoice',$id)
            ->get();
         
        $pdf = PDF::loadview('pdf_invoice',['data_invoice' => $data_invoice]);
        return $pdf->stream('Invoice.pdf');
    }

    public function cari(Request $Request)
    {
        $query = $Request->input('cari'); // Ambil input pencarian

        // Query menggunakan DB facade
        $data_invoice = DB::table('invoice')
                    ->where('nomor_invoice', 'like', "%{$query}%")
                    ->paginate(5); // Mengambil hasil pencarian

        return view('invoice_page', compact('data_invoice', 'query'));
    }
    
}
