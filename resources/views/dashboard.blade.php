<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard | E-Invoice</title>
        
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
                    <div class="sidebar-brand-text mx-3">E-Invoice Dashboard </div>
                </a>
                <hr class="sidebar-divider my-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/dashboard')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Menu
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Menu</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu</h6>
                            <a class="collapse-item" href="{{url('/invoice-page')}}">Invoice</a>
                            <a class="collapse-item" href="{{url('/admin/aduan_belum_diproses')}}">Penawaran</a>
                            <a class="collapse-item" href="{{url('/admin/aduan_belum_diproses')}}">Penagihan</a>
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
                        <div class="alert alert-secondary">
                            Halo {{Session::get('nama')}}, Selamat Datang Di Sistem E-Invoice...
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <a href="#" class="text-decoration-none">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Total Jumlah Pengaduan
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <a href="#" class="text-decoration-none">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                        Jumlah Pengaduan Yang Belum Ditanggapai Atau Diproses
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <a href="#" class="text-decoration-none">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Jumlah Pengaduan Yang Sedang Diproses
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-tools fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <a href="#" class="text-decoration-none">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Jumlah Pengaduan Yang Sudah Selesai
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                      
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-check fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <a href="#" class="btn btn-success" target="blank">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            Download Data PDF
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-download"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <a href="#" class="btn btn-info" target="blank">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            Download Data PDF
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-download"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <a href="#" class="btn btn-warning" target="blank">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            Download Data PDF
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-download"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <a href="#" class="btn btn-primary" target="blank">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            Download Data PDF
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-download"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir isi inti -->

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; RGI E-Invoice-App 2024</span>
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
                        <button class="btn btn-success" type="button" data-dismiss="modal">
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

        <script type="text/javascript" src="/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script type="text/javascript" src="/js/sb-admin-2.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>
</html>