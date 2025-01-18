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
        $prefix = "INV/AJP/{$today}/";

        // Cari nomor urut terakhir dari database
        $lastTransaction = DB::table('invoice')
        ->where('id_invoice', 'like', "{$prefix}%")
        ->orderBy('id_invoice', 'desc')
        ->first();

        if ($lastTransaction) {
            // Ambil nomor urut terakhir, tambahkan 1
            $lastNumber = (int)str_replace($prefix, '', $lastTransaction->id_invoice);
            $newNumber = $lastNumber + 1;
        } else {
            // Jika belum ada, mulai dari 1
            $newNumber = 1;
        }

        $newInvoiceNumber = $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT); // Format: 4 digit


        if ($request->has('telusuri')) {
            $data_invoice = DB::table('invoice')
            ->where('id_invoice','like','%'.$request->telusuri.'%')
            ->paginate(5);
        }else{
            $data_invoice = DB::table('invoice')
            ->orderBy('id_invoice','desc')
            ->paginate(5);
        }
        return view('invoice_page',['data_invoice' => $data_invoice, 'nomorinvoice' => $newInvoiceNumber]);  
    }

    public function tambah(){
        if (request('asuransi')=='0') {
            return redirect()->back()->with('asuransi','Gagal Membuat Invoice Karena Anda Belum Memilih Asuransi....');
        }else{
            DB::table('invoice')->insert([
                'id_invoice' =>request('id_invoice'),
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
                'diterima_dari' =>request('terima_dari'),
                'angkut_dari' =>request('angkut_dari'),
                'tujuan' =>request('tujuan'),
                'jenis_kendaraan_merk' =>request('kendaraan'),
                'no_rangka_polisi' =>request('rangka_polisi'),
                'no_mesin' =>request('no_mesin'),
                'warna' =>request('warna'),
                'biaya' =>request('biaya'),
                'terbilang' =>request('terbilang'),
                'asuransi' =>request('asuransi')
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
    
}
