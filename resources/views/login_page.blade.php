<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Halaman Login | E-Invoice</title>

        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="icon" href="\img\icon.png">
        
    </head>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        body{
            font-family: 'Poppins', sans-serif;
        }

        .btn-info{
            background-color: #006A67;
        }

        .btn-info:hover{
            background-color: #02403e;
        }
    </style>
    <body class="bg-light">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-5">
                    <div class="card shadow-lg my-5">   
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 font-weight-bold mb-4">Login E-Invoice</h1>
                            </div>
                            <form class="user" method="post" action="{{url('/login')}}">
                                {{ csrf_field() }}
                                @if(\Session::has('gagal'))
                                    <div class="alert alert-danger">
                                        <div>{{Session::get('gagal')}}</div>
                                    </div>
                                @endif
                                @if(\Session::has('belum_login'))
                                    <div class="alert alert-danger">
                                        <div>{{Session::get('belum_login')}}</div>
                                    </div>
                                @endif 
                                @if(\Session::has('logout'))
                                    <div class="alert alert-success">
                                        <div>{{Session::get('logout')}}</div>
                                    </div>
                                @endif  
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Masukan Username..." name="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Masukan Password..." name="password">
                                </div>
                                <button type="submit" class="btn btn-info btn-block">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script> 
        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html>