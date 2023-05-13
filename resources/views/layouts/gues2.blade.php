<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PMKS KOTA GORONTALO</title>
	<link rel="icon" href="{{ asset('safario-master/img/Fevicon.png') }}" type="image/png">
  
  
  <link rel="stylesheet" href="{{ asset('safario-master/vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('safario-master/vendors/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('safario-master/vendors/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('safario-master/vendors/linericon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('safario-master/vendors/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('safario-master/vendors/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('safario-master/vendors/flat-icon/font/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('safario-master/vendors/nice-select/nice-select.css') }}">

  <link rel="stylesheet" href="{{ asset('safario-master/css/style.css') }}">
</head>
<body class="bg-shape">

  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('isafario-master/mg/logo.png')}}" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end" style="margin-left: 200px;">
              <li class="nav-item active"><a class="nav-link" href="{{ route('beranda') }}">Home</a></li> 
              <li class="nav-item"><a class="nav-link" href="#statik">Stastik</a></li> 
            </ul>

            <div class="nav-right text-center text-lg-right py-4 py-lg-0">
              @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class=" button btn btn--white">Home</a></li>
                    @else
                        <a href="{{ route('login') }}" class=" button btn btn--white">Masuk</a></li>
                        @if (Route::has('register'))
                        @endif
                    @endauth
                </div>
            @endif
              {{--  <a class="button" href="#">Masuk</a>  --}}
            </div>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->


  <!--================Hero Banner Area Start =================-->
  <section class="hero-banner magic-ball">
    <div class="container">

      <div class="row align-items-center text-center text-md-left">
        <div class="col-md-10 col-lg-6 mb-5 mb-md-0">
          <h1>Sistem Informasi pendukung keputusan Penyandang Masalah Kesejahteraan Sosial</h1>
          <!-- <p>Air seed winged lights saw kind whales in sixth dont seas dron image so fish all tree meat dont there is seed winged lights saw kind whales in sixth dont seas dron image so fish all tree meat dont there </p> -->
     
        </div>
        <div class="col-md-5 col-lg-5 col-xl-6 ">
          <img class="img-fluid" src="{{ asset('safario-master/img/home/1.png') }}" alt="" style=" width: 400px;">
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->


  <!--================Service Area Start =================-->
  <div id="statik" style="margin-top:10rem">

    <section class="section-margin generic-margin">
      <div class="container">
        <div class="section-intro text-center pb-90px">
          <h2>Statistik Data PMKS Kota Gorontalo</h2>
        </div>

        <div class="row">
         @foreach ($data as $item )

          <div class="col-md-5 col-lg-3 mb-3 mb-lg-0 mt-3">
            <div class="service-card text-center bg-3 h-100">
              <div class="service-card-img">
                  @php 
                  $value = App\Models\Pmks::where('id_jenis_pmks' , $item->id)->pluck('id_jenis_pmks')
                  @endphp
                <h1>{{$value->count() ? $value->count() : '0'}}</h1>
              </div>
              <div class="service-card-body">
                <h3>{{ $item->name }}</h3>
                <p>
                
                </p>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section>
  </div>

  <!--================Blog section End =================-->


  <!-- ================ start footer Area ================= -->
  <footer class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>PEMERINTAH KOTA GORONTALO DINAS SOSIAL DAN PEMBERDAYAAN MASYARAKAT</h6>
            <p>
              Jl. H. Nani Wartabone No. 45
              Gorontalo - Kota Gorontalo
            
            </p>
          </div>
        </div>
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>KONTAK KAMI</h6>
            <p>
(0435) 821012 
            </p>
          </div>
        </div>
							
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>SOCIAL MEDIA KAMI</h6>
            <div class="footer-social text-center text-lg-left">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-dribbble"></i></a>
              <a href="#"><i class="fab fa-behance"></i></a>
            </div>					
        </div>		
      </div>				
      </div>

      <div class="footer-bottom">
        <div class="row align-items-center">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-center text-lg-left"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.instagram.com/wahyumusa_/" target="_blank">Wahyu Musa</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          <div class="col-lg-4 col-sm-12 footer-social text-center text-lg-right">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-dribbble"></i></a>
            <a href="#"><i class="fab fa-behance"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- ================ End footer Area ================= -->



  <script src="{{ asset('safario-master/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('safario-master/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('safario-master/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('safario-master/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('safario-master/js/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('safario-master/js/mail-script.js') }}"></script>
  <script src="{{ asset('safario-master/js/skrollr.min.js') }}"></script>
  <script src="{{ asset('safario-master/js/main.js') }}"></script>
</body>
</html>