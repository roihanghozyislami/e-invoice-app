<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .invoice-container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
        }
        .invoice-header .company-info {
            font-size: 14px;
            margin-bottom: 30px;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        .invoice-details {
            margin: 20px 0;
            font-size: 14px;
        }
        .invoice-details div {
            margin-bottom: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .table th {
            background-color: #f4f4f4;
        }
        .total {
            text-align: right;
            margin-top: 20px;
        }
        .total div {
            margin-bottom: 8px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
            color: #888;
        }
        .signature {
            margin-top: 40px;
            text-align: right;
        }
        .signature img {
            width: 250px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div class="company-info">
                <strong>PT ASOKA JAYA PERKASA</strong><br>
                Jl. Raya Kodau No.41 RT003/RW001<br>
                Telepon: 085217716633<br>
                Email: asokajayaperkasa@gmail.com
            </div>
            <h1>KWITANSI</h1>
        </div>

        <div class="invoice-details">
            <div><strong>Nomor Invoice:</strong> {{$transaksi->nomor_transaksi}}</div>
            <div><strong>Kepada:</strong> {{$transaksi->konsumen}}</div>
            <div><strong>Tanggal:</strong> {{$transaksi->tanggal}}</div>
            <div><strong>Asuransi:</strong> {{$transaksi->asuransi}}</div>
            <div><strong>Status :</strong> {{$transaksi->status}}</div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Dari</th>
                    <th>Tujuan</th>
                    <th>Kendaraan</th>
                    <th>No Polisi</th>
                    <th>Biaya</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksi_detail as $index => $detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->dari }}</td>
                    <td>{{ $detail->tujuan }}</td>
                    <td>{{ $detail->kendaraan }}</td>
                    <td>{{ $detail->no_polisi }}</td>
                    <td> Rp {{ number_format($detail->biaya, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="total">
            <div><strong>Total:</strong> <span style="font-size: 18px;">Rp {{ number_format($transaksi->total, 0, ',', '.') }}</span></div>
        </div>

        <div class="signature">
            <p>Hormat Kami,</p>
            <img src="{{ ('img/ttd.jpg') }}">
            <p>PT Asoka Jaya Perkasa</p>
        </div>

        <div class="footer">
            Terima kasih atas bisnis Anda!<br>
            Kwitansi ini adalah bukti transaksi yang sah
        </div>
    </div>
</body>
</html>
