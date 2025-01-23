<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Invoice | E-Invoice App</title>
		
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
	<script type="text/javascript">
		function edit(idnya) {
			$.ajax({
				type:"GET",
				url:"{{url('/invoice/tangkap')}}/"+idnya,
				success:function(ambil){
					$('#id_invoice').val(ambil.id_invoice);
					$('#konsumen').val(ambil.konsumen);
    				$('#angkut_dari').val(ambil.angkut_dari);
    				$('#tujuan').val(ambil.tujuan);
    				$('#kendaraan').val(ambil.jenis_kendaraan_merk);
    				$('#rangka_polisi').val(ambil.no_rangka_polisi);
    				$('#no_mesin').val(ambil.no_mesin);
    				$('#warna').val(ambil.warna);
    				$('#biaya').val(ambil.biaya);
    				$('#terbilang').val(ambil.terbilang);
    				$('#asuransi').val(ambil.asuransi);
    				$('#tanggal').val(ambil.tanggal);
    				$('#edit').modal('show');
				},
				error:function(){
					alert('gagal proses');
				}
			});	
		}

		function hapus(idnya){
			Swal.fire({
				title: 'Yakin ?',
				text: "Data Yang Sudah Dihapus Tidak Dapat Dikembalikan",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#e33529',
				cancelButtonColor: '#006A67',
				confirmButtonText: 'Yakin',
				cancelButtonText: 'Batal'
			}).then((result)=>{
				if (result.value){
					Swal.fire(
						'Terhapus',
  						'Data Anda Sudah Terhapus',
  						'Berhasil'
					).then((result)=>{
						if (result.value){
							window.location.replace("{{url('/transaksi/hapus')}}/"+idnya);
						}
					})
				}
			})
		}
	</script>
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
                        <span>Menu</span>
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
	                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="{{url('/invoice-page')}}">
	                        <div class="input-group">
	                            <input type="text" class="form-control bg-light border-0 small" placeholder="Telusuri Berdasarkan Nomor Invoice..." aria-label="Search" aria-describedby="basic-addon2" name="cari" value="{{ old('cari', $keyword ?? '') }}">
	                            <div class="input-group-append">
	                                <button class="btn btn-primary" type="submit">
	                                    <i class="fas fa-search fa-sm"></i>
	                                </button>
	                            </div>
	                        </div>
	                    </form>
	                    <ul class="navbar-nav ml-auto">
	                    	<li class="nav-item dropdown no-arrow d-sm-none">
	                    		<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
	                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <i class="fas fa-search fa-fw"></i>
	                            </a>
	                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
	                                aria-labelledby="searchDropdown">
	                            	<form class="form-inline mr-auto w-100 navbar-search" method="get" action="{{url('/invoice-page')}}">
	                                    <div class="input-group">
	                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Telusuri Berdasarkan Nomor Invoice..." aria-label="Search" aria-describedby="basic-addon2" name="cari" value="{{ old('cari', $keyword ?? '') }}">
	                                        <div class="input-group-append">
	                                            <button class="btn btn-primary" type="submit">
	                                                <i class="fas fa-search fa-sm"></i>
	                                            </button>
	                                        </div>
	                                    </div>
	                                </form>
	                            </div>
	                    	</li>
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
						@if(\Session::has('error'))
                            <div class="alert alert-danger">
                                <div>{{Session::get('error')}}</div>
                            </div>
                        @endif 
                        @if(\Session::has('success'))
                            <div class="alert alert-success">
                                <div>{{Session::get('success')}}</div>
                            </div>
                        @endif 
						<a href="{{url('/transaksi-form')}}" class="btn btn-primary btn-sm mb-4">
							<i class="fas fa-plus fa-sm"></i>
							Buat Transaksi Baru +
						</a>
						<a href="{{url('/invoice-page')}}" class="btn btn-secondary btn-sm mb-4">
							<i class="fas fa-redo fa-sm"></i>
							Refresh
						</a>
						<div class="card shadow mb-3">
							<div class="card-header py-3">
	                            <h4 class="m-0 font-weight-bold text-gray">Data Transaksi</h4>
	                        </div>
	                        <div class="card-body">
	                        	<div class="table-responsive">
	                        		<table class="table table-borderless rounded shadow small">
		                                <thead>
		                                    <tr>
		                                        <th>Nomor Transaksi</th>
		                                        <th>Konsumen</th>
		                                        <th>Total</th>
		                                        <th>Tanggal</th>
		                                        <th>Status</th>
		                                        <th>Pengaturan</th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                   
		                                    @forelse($data_transaksi as $data)
		                                    <tr>
		                                        <td>{{$data->nomor_transaksi}}</td>
		                                        <td>{{$data->konsumen}}</td>
		                                        <td>{{$data->total}}</td>
		                                        <td>{{$data->tanggal}}</td>
		                                        <td>
		                                        	<span class="badge text-white
									                    @if($data->status === 'Lunas') bg-success
									                    @else bg-danger
									                    @endif">
									                    {{ $data->status }}
									                </span>
		                                        </td>
		                                        <td>
		                                        	<a href="/transaksi-detail/{{$data->id_transaksi}}" class="btn btn-sm btn-primary">
		                                            	<i class="fas fa-edit fa-sm"></i>
		                                            	Detail
		                                            </a>
		                                        </td>
		                                    </tr>
		                                    @empty
		                                    <tr>
                        						<td colspan="5" class="text-center">Tidak ada data ditemukan.</td>
                    						</tr>
		                                </tbody>
		                                    @endforelse
		                            </table>
	                        	</div>
	                        </div>
						</div>
						{{ $data_transaksi->links() }}
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