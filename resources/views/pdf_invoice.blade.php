<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Invoice</title>

		<link href="css/sb-admin-2.min.css" rel="stylesheet">
		
	</head>
	<body>
		<?php $no=1;?>
        @foreach($data_invoice as $data)	

        <div class="card shadow mb-3">
			<div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-gray">Invoice</h4>
            </div>
            <div class="card-body">
            	<div class="table-responsive">
            		<table class="table table-borderless rounded shadow small" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Angkut Dari</th>
                                <th>Tujuan</th>
                                <th>Kendaraan</th>
                                <th>No Polisi</th>
                                <th>Biaya</th>
                                <th>Asuransi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$data->angkut_dari}}</td>
                                <td>{{$data->tujuan}}</td>
                                <td>{{$data->jenis_kendaraan_merk}}</td>
                                <td>{{$data->no_rangka_polisi}}</td>
                                <td>{{$data->biaya}}</td>
                                <td>{{$data->asuransi}}</td>
                            </tr>
                        </tbody>
                    </table>
            	</div>
            </div>
		</div>
        <?php $no++; ?>
        @endforeach
	</body>
</html>