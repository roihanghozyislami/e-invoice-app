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
           
         // Ambil input keyword
        $keyword = $request->input('cari');

        // Jika keyword diisi, filter data; jika tidak, ambil semua data
        $data_transaksi = DB::table('transaksi')
            ->when($keyword, function ($query, $keyword) {
            return $query->where('nomor_transaksi', 'like', "%{$keyword}%");
        })
            ->orderBy('id_transaksi', 'desc')
            ->paginate(10); // Tambahkan paginasi

        return view('transaksi_page',['data_transaksi' => $data_transaksi, 'keyword' => $keyword]);
    }


    public function formadd(){

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

        return view('form_transaksi',['nomor_transaksi' => $newTransactionNumber]);
    }




    public function add(Request $request){
        $request->validate([
            'nomor_transaksi' => 'required|unique:transaksi',
            'konsumen' => 'required',
            'tanggal' => 'required|date',
            'details.*.dari' => 'required',
            'details.*.tujuan' => 'required',
            'details.*.kendaraan' => 'required',
            'details.*.no_polisi' => 'required',
            'details.*.biaya' => 'required|numeric|min:0',
        ]);

        // Gunakan transaksi database untuk memastikan konsistensi
        DB::transaction(function () use ($request) {
            // Simpan ke tabel transaksi
            $idTransaksi = DB::table('transaksi')->insertGetId([
                'nomor_transaksi' => $request->nomor_transaksi,
                'konsumen' => $request->konsumen,
                'total' => array_sum(array_column($request->details, 'biaya')),
                'asuransi' => $request->asuransi,
                'tanggal' => $request->tanggal,
                'status' => $request->status,
            ]);

            // Simpan detail transaksi dengan nomor_transaksi sebagai foreign key
            $detailData = [];
            foreach ($request->details as $detail) {
                $detailData[] = [
                    'id_transaksi' => $idTransaksi,
                    'nomor_transaksi' => $request->nomor_transaksi, // Menggunakan nomor_transaksi sebagai FK
                    'dari' => $detail['dari'],
                    'tujuan' => $detail['tujuan'],
                    'kendaraan' => $detail['kendaraan'],
                    'no_polisi' => $detail['no_polisi'],
                    'biaya' => $detail['biaya'],
                ];
            }

            DB::table('transaksi_detail')->insert($detailData);
        });

        return redirect('/transaksi-page')->with('success', 'Transaksi berhasil disimpan...');
    }

    public function detail($id){
        // Ambil data transaksi berdasarkan nomor_transaksi
        $transaksi = DB::table('transaksi')->where('id_transaksi', $id)->first();

        // Ambil detail transaksi terkait
        $transaksi_detail = DB::table('transaksi_detail')->where('id_transaksi', $id)->get();

        return view('transaksi_page_detail', compact('transaksi', 'transaksi_detail'));
    }

    public function paid($id){
        DB::table('transaksi')->where('id_transaksi',$id)->update([
                'status' => 'Telah Lunas'
            ]);
            return redirect()->back()->with('success','Transaksi telah lunas...');
    }

    public function delete($id){
        DB::table('transaksi')->where('id_transaksi',$id)->delete();
        DB::table('transaksi_detail')->where('id_transaksi',$id)->delete();

        return redirect('/transaksi-page')->with('success','Transaksi telah dihapus...');
    }

    public function invoice($id){
        $transaksi = DB::table('transaksi')->where('id_transaksi',$id)->first();
        $transaksi_detail = DB::table('transaksi_detail')->where('id_transaksi', $id)->get();
 
        $pdf = PDF::loadview('invoice', compact('transaksi', 'transaksi_detail'));
        return $pdf->stream('Invoice.pdf');
    }

    public function kwitansi($id){
        $transaksi = DB::table('transaksi')->where('id_transaksi',$id)->first();
        $transaksi_detail = DB::table('transaksi_detail')->where('id_transaksi', $id)->get();
 
        $pdf = PDF::loadview('kwitansi', compact('transaksi', 'transaksi_detail'));
        return $pdf->stream('Kwitansi-$id.pdf');
    }
}
