<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>E Invoice App</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

		<link rel="stylesheet" href="{{asset('css/css-landing.css')}}" />

		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
		<link rel="icon" href="{{asset('img/icon.png')}}"> 

	</head>
	<body>
		<nav class="navbar navbar-expand-lg fixed-top shadow">
		    <div class="container">
		    	<a class="navbar-brand" href="#">
		    		<img src="/img/brand.png">
		    	</a>
		        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		        	<span class="navbar-toggler-icon"></span>
		        </button>
		        <div class="collapse navbar-collapse" id="navbarSupportedContent">
		        	<ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
			            <li class="nav-item">
			            	<a class="nav-link mx-1" aria-current="page" href="#">
			            		Tentang E Invoice App
			            	</a>
			            </li>
		        	</ul>
		        	<div class="text-center">
			          	<a href="{{url('/login-page')}}" class="btn btn-success">
			          		Masuk/Login
			          	</a>
		        	</div>
		        </div>
		    </div>
    	</nav>
		
		<div class="d-flex align-items-center" id="landing-page">
	    	<div class="container">
		        <div class="row">
		        	<div class="col text-center">
			            <h1 class="fw-bold mb-4">
			            	Sistem untuk memudahkan<br>Usaha ataupun bisnis milik anda
			            </h1>
			            <p class="mb-4">
			            	Dengan manajemen transaksi yang baik meliputi invoice, nota pembayaran dan laporan transaksi
			            </p>
		        	</div>
		        </div>
	    	</div>
    	</div>

    	<div id="about">
	    		<div class="container-fluid text-white text-center">
		    		<br>
		    		<br>
		      		<h2>
		      			Fitur
		      		</h2>
			        <div class="row row-cols-lg-4 row-cols-1">
			        	<div class="col text-center py-5 text-white">
			            	<i class="fa-solid fa-users fa-2xl mb-4"></i>
			            	<p>
			              		Masuk/Login
			            	</p>
			          	</div>
			          	<div class="col text-center py-5 text-white">
			            	<i class="fa-solid fa-save fa-2xl mb-4"></i>
			            	<p>
			              		Simpan Transaksi
			            	</p>
			          	</div>
			          	<div class="col text-center py-5 text-white">
			            	<i class="fa-solid fa-clipboard fa-2xl mb-4"></i>
			            	<p>
			              		Invoice & Nota Transaksi
			            	</p>
			          	</div>
			          	<div class="col text-center py-5 text-white">
			            	<i class="fa-solid fa-archive fa-2xl mb-4"></i>
			            	<p>
			              		Laporan Transaksi
			            	</p>
			          	</div>
			        </div>
	    		</div>
    	</div>

    	<div id="laporan">
		    	<div class="container-fluid text-center">
		    			<br>
		    			<br>
		      		<h2>
		      			Jumlah Pengguna Saat Ini
		      		</h2>
		      		<h2>
		      			{{$total_user}}
		      		</h2>
		      		<br>
		      		<br>
		    	</div>
    	</div>

    	<div class="footer pt-5">
	    		<div class="container text-secondary">
	        		<div class="row row-cols-lg-3 row-cols-1 justify-content-between">
				        	<div class="col col-lg-6 mb-lg-0 mb-4">
					          	<h2 class="fw-bold mb-5">
					          			E-Inovice App
					          	</h2>
					            <p>
					            		Sistem Untuk Memudahkan<br>Usaha Atau Bisnis Milik Anda
					            </p>
				          </div>
				          <div class="col col-lg-2 d-flex flex-column mb-lg-0 mb-4">
				          		<h2 class="fw-bold">
				          				Menu
				          		</h2>
				          		<a href="#home" class="text-secondary mt-4 text-decoration-none">
				          				Tentang E-Invoice App
				          		</a>
				          		<a href="{{url('/login-page')}}" class="text-secondary mt-3 text-decoration-none">
				          				Masuk/Login
				          		</a>
				          </div>
				          <div class="col col-lg-3 d-flex flex-column">
				          		<h2 class="fw-bold mb-4">
				          				Hubungi Kami
				          		</h2>
				          		<a href="#" class="text-decoration-none mt-2 text-secondary">
				          				einvoiceapp@gmail.com
				          		</a>
				          		<a href="#" class="text-decoration-none mt-3 text-secondary">
				          				+62 1234 5678 901
				          		</a>
				          		<a href="#" class="text-decoration-none mt-3 text-secondary">
				          				@einvoiceapp (Telegram)
				          		</a>
				          </div>
	        		</div>
	        		<div class="row">
	          			<div class="col">
	            				<p class="text-center copyright">
	            						&copy; Copyright 2025 By Ihanzyis All Right Reserved
	            				</p>
	          			</div>
	      			</div>
	    		</div>
    	</div>


    	<script src="/js/js-landing.js"></script>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

		 	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		 	<script>
     		AOS.init();
    	</script>
	</body>
</html>