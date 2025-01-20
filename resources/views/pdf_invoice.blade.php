<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
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
    @foreach($data_invoice as $data)
    <div class="invoice-container">
        <div class="invoice-header">
            <div class="company-info">
                <strong>PT ASOKA JAYA PERKASA</strong><br>
                Jl. Raya Kodau No.41 RT003/RW001<br>
                Telepon: 085217716633<br>
                Email: asokajayaperkasa@gmail.com
            </div>
            <h1>INVOICE</h1>
        </div>

        <div class="invoice-details">
            <div><strong>Nomor Invoice:</strong> {{$data->nomor_invoice}}</div>
            <div><strong>Tanggal:</strong> {{$data->tanggal}}</div>
            <div><strong>Jatuh Tempo:</strong> Segera</div>
            <div><strong>Kepada:</strong> {{$data->konsumen}}</div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Dari-Tujuan</th>
                    <th>Kendaraan</th>
                    <th>No Polisi</th>
                    <th>Warna</th>
                    <th>Biaya</th>
                    <th>Asuransi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$data->angkut_dari}} - {{$data->tujuan}}</td>
                    <td>{{$data->jenis_kendaraan_merk}}</td>
                    <td>{{$data->no_rangka_polisi}}</td>
                    <td>{{$data->warna}}</td>
                    <td>{{$data->biaya}}</td>
                    <td>{{$data->asuransi}}</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            <div><strong>Subtotal:</strong>-</div>
            <div><strong>Pajak:</strong>-</div>
            <div><strong>Total:</strong> <span style="font-size: 18px;">{{$data->biaya}}</span></div>
            <div><strong>Terbilang:</strong> <span style="font-size: 18px;">{{$data->terbilang}}</span></div>
        </div>

        <div class="signature">
            <p>Hormat Kami,</p>
            <img src="{{ ('img/ttd.jpg') }}">
        </div>

        <div class="footer">
            Terima kasih atas bisnis Anda!<br>
            Mohon transfer pembayaran ke rekening berikut: Bank BCA - 123456789 - Atas Nama Perusahaan
        </div>
    </div>
    @endforeach
</body>
</html>
