<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laporan All</title>
	</head>
	<style type="text/css">
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
	</style>
	<body>
		<div class="invoice-container">
	        <div class="invoice-header">
	            <h1>LAPORAN TRANSAKSI SELESAI</h1>
	        </div>
	        <table class="table">
	            <thead>
	                <tr>
	                    <th>No</th>
	                    <th>No Transaksi</th>
	                    <th>Konsumen</th>
	                    <th>Total</th>
	                    <th>Asuransi</th>
	                    <th>Tanggal</th>
	                    <th>Status</th>
	                </tr>
	            </thead>
	            <tbody>
	                @forelse ($transaksi as $index => $transaksi)
	                <tr>
	                    <td>{{ $index + 1 }}</td>
	                    <td>{{ $transaksi->nomor_transaksi }}</td>
	                    <td>{{ $transaksi->konsumen }}</td>
	                    <td> Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
	                    <td>{{ $transaksi->asuransi }}</td>
	                    <td>{{ $transaksi->tanggal }}</td>
	                    <td>{{ $transaksi->status }}</td>
	                </tr>
	                @empty
	                <tr>
	                    <td colspan="6" class="text-center">Tidak ada data</td>
	                </tr>
	                @endforelse
	            </tbody>
	        </table>
    	</div>	
	</body>
</html>