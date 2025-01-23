<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Transaksi Detail | E-Invoice App</title>
		
	    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
	    <link rel="icon" href="{{asset('img/icon.png')}}"> 
	    
	</head>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
		
		body{
			font-family: 'Poppins', sans-serif;
		}

		.dropdown-item:active{
			background: black;
		}

		.sidebar-dark{
            background-color: #006A67;
        }
	</style>
	<body>
		<div id="wrapper">
			<!-- mulai sidebar -->
			<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/dashboard')}}">
	                <div class="sidebar-brand-text mx-3">E-Invoice Dashboard</div>
            	</a>
            	<hr class="sidebar-divider my-0">
            	<li class="nav-item">
                	<a class="nav-link" href="{{url('/dashboard')}}">
                    	<i class="fas fa-fw fa-tachometer-alt"></i>
                    	<span>Dashboard</span>
                	</a>
            	</li>
            	<hr class="sidebar-divider">
            	<div class="sidebar-heading">
                	Menu
            	</div>
            	<li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Invoice</span>
                    </a>
                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu</h6>
                            <a class="collapse-item font-weight-bold" href="{{url('/invoice-page')}}">Transaksi</a>
                            <a class="collapse-item" href="{{url('/admin/aduan_belum_diproses')}}">Penawaran</a>
                            <a class="collapse-item" href="{{url('/admin/aduan_belum_diproses')}}">Penagihan</a>
                        </div>
                    </div>
                </li>
            	<li class="nav-item">
	                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
	                    aria-expanded="true" aria-controls="collapseUtilities">
	                    <i class="fas fa-fw fa-wrench"></i>
	                    <span>Data Master</span>
	                </a>
	                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
	                    data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">
	                        <h6 class="collapse-header">Data Master</h6>
	                        <a class="collapse-item" href="{{url('/user')}}">User</a>
	                    </div>
	                </div>
            	</li>
            	<hr class="sidebar-divider d-none d-md-block">
            	<div class="text-center d-none d-md-inline">
                	<button class="rounded-circle border-0" id="sidebarToggle"></button>
            	</div>
			</ul>
		<!-- akhir sidebar -->

		<!-- isi -->
			<div id="content-wrapper" class="d-flex flex-column">
				<!-- isi inti -->
				<div id="content">
					<!-- mulai topbar -->
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
						<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
	                        <i class="fa fa-bars"></i>
	                    </button>
	                    <ul class="navbar-nav ml-auto">
	                    	<div class="topbar-divider d-none d-sm-block"></div>
	                    	<li class="nav-item dropdown no-arrow">
	                    		<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
	                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
	                                	{{Session::get('nama')}}
	                                </span>
	                                <img class="img-profile rounded-circle" src="/img/undraw_profile.svg">
	                            </a>
	                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
	                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
	                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
	                                    Logout
	                                </a>
	                            </div>
	                    	</li>
	                    </ul>
					</nav>
					<!-- akhir topbar -->
					
					<div class="container-fluid">
						<div class="card shadow mb-3">
							<div class="card-header py-3">
								<div class="float-left">
									<h4 class="m-0 font-weight-bold text-gray">Detail Transaksi</h4>
								</div>
	                            <div class="float-right">
	                            	<a href="{{url('/transaksi-page')}}" class="btn btn-sm btn-primary">
	                        			Kembali
	                        		</a>
	                        		<a href="/invoice/pdf/{{$transaksi->id_transaksi}}" class="btn btn-sm btn-success">
                                    	<i class="fas fa-edit fa-sm"></i>
                                    	Buat Invoice
                                    </a>
                                    <a href="/invoice/pdf/{{$transaksi->id_transaksi}}" class="btn btn-sm btn-success">
                                    	<i class="fas fa-edit fa-sm"></i>
                                    	Buat Kwitansi
                                    </a>
                                    <a href="javascript:" class="btn btn-sm btn-info" onclick="edit({{$transaksi->id_transaksi}})">
                                    	<i class="fas fa-edit fa-sm"></i>
                                    	Edit
                                    </a>
                                    <a href="/invoice/pdf/{{$transaksi->id_transaksi}}" class="btn btn-sm btn-danger">
                                    	<i class="fas fa-edit fa-sm"></i>
                                    	Hapus Transaksi
                                    </a>
	                            </div>
	                        </div>
	                        <div class="card-body">
	                        	<div class="form-group">
	                        		<strong>Nomor Transaksi :</strong> {{ $transaksi->nomor_transaksi }}<br>
							        <strong>Konsumen :</strong> {{ $transaksi->konsumen }}<br>
							        <strong>Tanggal :</strong> {{ $transaksi->tanggal }}<br>
							        <strong>Asuransi :</strong> {{ $transaksi->asuransi }}<br>
							        <strong>Status :</strong>
							        <span class="badge text-white @if($transaksi->status === 'Lunas') bg-success @else bg-danger @endif">
				                    	{{ $transaksi->status }}
					                </span>
							        <br>
							        <strong>Total Biaya :</strong> Rp {{ number_format($transaksi->total, 0, ',', '.') }}<br>
	                        	</div>
	                        	<hr>
	                        	<div class="form-group table-responsive">
	                        		<h5>Detail Kendaraan</h5>
								    <table class="table table-bordered small">
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
								                <td colspan="6" class="text-center">Tidak ada detail transaksi</td>
								            </tr>
								            @endforelse
								        </tbody>
								    </table>

	                        	</div>
	                        </div>
	                        <div class="card-footer">
	                        	<a href="{{url('/transaksi-page')}}" class="btn btn-sm btn-primary">
	                        		Kembali
	                        	</a>
	                        </div>
						</div>
					</div>
				</div>
				<!-- akhir isi inti -->

				<footer class="sticky-footer bg-white">
	                <div class="container my-auto">
	                    <div class="copyright text-center my-auto">
	                        <span>Copyright &copy; RGI E-Invoice App 2024</span>
	                    </div>
	                </div>
	            </footer>
			</div>
			<!-- akhir isi -->
		</div>
		<!-- akhir wrapper -->

		<!-- tombol back to top -->
		<a class="scroll-to-top rounded" href="body">
        	<i class="fas fa-angle-up"></i>
    	</a>


    	<!-- modal logout -->
    	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
	        <div class="modal-dialog modal-dialog-centered" role="document">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title" id="exampleModalLabel">
	                    	Yakin Ingin Keluar
	                    </h5>
	                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                        <span aria-hidden="true">×</span>
	                    </button>
	                </div>
	                <div class="modal-body">
	                	Jika Yakin, Silahkan Pilih Keluar
	                </div>
	                <div class="modal-footer">
	                    <button class="btn btn-primary" type="button" data-dismiss="modal">
	                    	<i class="fas fa-stop-circle fa-sm"></i>
	                    	Batal
	                    </button>
	                    <a class="btn btn-danger" href="{{url('/logout')}}">
	                    	<i class="fas fa-sign-out-alt fa-sm"></i>
	                    	Keluar
	                    </a>
	                </div>
	            </div>
	        </div>
    	</div>
	 	
	 	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	    <script type="text/javascript" src="/vendor/jquery/jquery.min.js"></script>
	    <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	    <script type="text/javascript" src="/vendor/jquery-easing/jquery.easing.min.js"></script>
	    <script type="text/javascript" src="/js/sb-admin-2.min.js"></script>
	    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</body>
</html>