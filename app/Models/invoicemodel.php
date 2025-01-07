<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;


class invoicemodel extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invoice) {
            // Format tanggal
            $today = Carbon::now()->format('Ymd');

            // Ambil nomor terakhir dari database
            $lastInvoice = Invoice::latest('id')->first();
            $lastNumber = $lastInvoice ? (int)Str::afterLast($lastInvoice->invoice_number, '/') : 0;

            // Tambahkan nomor urut
            $sequence = $lastNumber + 1;

            // Format nomor invoice
            $invoice->invoice_number = sprintf('INV/AJP/%s/%04d', $today, $sequence);
        });
    }
}
