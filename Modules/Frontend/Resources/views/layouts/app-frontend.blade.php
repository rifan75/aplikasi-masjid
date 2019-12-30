<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>{{$mosque->name}}</title>

    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content=" Inwardly
 Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--// Meta tag Keywords -->
    <!-- css files -->
    <link rel="shortcut icon" href="{{ asset('images/bismillah1_kecil.png') }}" >
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
    <link href="css/style6.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->
    <!--web font-->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i" rel="stylesheet">
    <!--//web font-->
 @yield('header_styles')
    <style>
    .wsholat {
    padding: 0;
    position: relative;
    float: left;
    width: 504px;
    }
    </style>
</head>

<body>
    <!-- banner -->
    <section class="banner" id="home">
        <!-- header -->
        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="navbar-brand">
                    <h1><a class="navbar-brand" href="{{ route('home') }}">
                    {{$mosque->name}}
                    </a></h1>
                    <h7>{{$datenow}}</h7>
                    </div>
                    <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				            <span class="navbar-toggler-icon"></span>
			              </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto text-center">
                            <li class="nav-item cool">
                                <a class="nav-link" href="{{ route('home') }}">Home
							                  <span class="sr-only">(current)</span>
						                    </a>
                            </li>
                            <li class="nav-item cool">
                                <a class="nav-link" href="{{ route('mosque') }}">Masjid</a>
                            </li>
                            <li class="nav-item cool">
                                <a class="nav-link" href="{{ route('indexresume') }}">Kajian</a>
                            </li>
                            <li class="nav-item cool">
                                <a class="nav-link" href="{{ route('indexarticle') }}">Artikel</a>
                            </li>
                            <li class="nav-item cool">
                                <a class="nav-link" href="{{ route('showevent') }}">Kegiatan</a>
                            </li>
                            <li class="nav-item cool">
                                <a class="nav-link" href="{{ route('showdev') }}">Pembangunan</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <!-- //header -->
        <div class="callbacks_container">
            <ul class="rslides" id="slider3">
                <li>
                    <div class="slider-info bg1">
                        <div class="bs-slider-overlay">
                            <div class="banner-text-w3layouts container" >
                            <div style="align-text:center">
                                <img src="{{asset('images/Bismillah_Transparent.png')}}" style="width:100%;height:20%px;align-text:center">
                            </div>
                            <!--/sub-content-->
                                <div class="top-content-info">
                                    <div class="top-content-right">
                                        <div class="thim-click-to-bottom">
                                            <div class="rotate">
                                                <a href="#about" class="scroll">
                                                   <i class="fas fa-angle-double-down"></i>
                                                   Klik untuk Geser
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!--//sub-content-->
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </section>
    <!-- //banner -->
    <!--/banner-bottom-w3ls-->
    @yield('main-content')

    <!--/footer-->
    <footer class="footer-main-w3layouts py-md-5 py-4">
        <div class="container-fluid px-lg-5 px-3">
            <div class="row">
                <div class="col-lg-4 footer-grid-w3ls">
                        <div class="col-md-12 row" style ="padding-left:30px;padding-bottom:20px">
                         @if(Auth::check())
                            <p>
                                <a  href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color:white">Logout</a>
                            </p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                            <p style="color:white">&nbsp;&nbsp;||&nbsp;&nbsp; </p>
                            <p>
                                <a href="{{ route('admin')}}" style="color:white">Dashboard</a>
                            </p>
                            @else
                            <p>
                                <a   style="color:white" href="{{ route('login')}}">Login</a>
                                ||
                                <a  style="color:white" href="{{ route('register')}}">Daftar Jamaah</a>
                            </p>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <h3 class="mb-4">Alamat</h3>
                            <address class="mb-0">
							<p class="mb-2"><i class="fas fa-map-marker-alt"></i> 
                            {{$mosque->contact['Address']}}<br>{{$mosque->contact['City']}}, {{$mosque->contact['Country']}}.
                            </p>
							<p><i class="far mr-1 fa-envelope-open"></i> <a href="mailto:info@example.com">{{$mosque->contact['Email']}}</a></p>
						</address>
                        </div>
                </div>
                <div class="col-lg-4 footer-grid-w3ls">
                    <div class="col-md-12">
                    <h3 class="mb-4">Sponsor</h3>
                        <div class="blog-grids row mb-3">
                        <div class="col-md-4 blog-grid-left">
                            <a href="https://bendapusaka.id" target="_blank" rel="noopener">
							<img src="/images/benpus.png" class="img-fluid" alt="">
						</a>
                        </div>
                    
                        <div class="col-md-8 blog-grid-right">
                            <h5>
                                <a href="single.html">Manajemen Aset Tetap Di Mesjid Al-Husna Menggunakan Aplikasi BendaPusaka</a>
                            </h5>
                            <div class="sub-meta">
                                <span><a href="https://bendapusaka.id" target="_blank" rel="noopener">
								https://bendapusaka.id</a></span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 footer-grid-w3ls">
                <div class="mapouter">
                <div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4715.69474139903!2d106.62860682325757!3d-6.340806729065529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e4820f5a6b0d%3A0x31a4c7e1b1bf3774!2sMasjid%20Al%20Husna!5e0!3m2!1sen!2sid!4v1576109389014!5m2!1sen!2sid" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
                </div>
            </div>
        </div>
        <div class="copyright-w3layouts mt-md-5 mt-4 text-center">
            <p>© 2019 Masjid Al-Husna . All Rights Reserved </p>
        </div>
    </footer>
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/search.js"></script>
    <!-- /dropdown nav -->
    <script>
        $(document).ready(function() {
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->
    <!-- Banner Responsiveslides -->
    <script src="js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function() {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function() {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function() {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!-- // Banner Responsiveslides -->
    <!-- stats -->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.countup.js"></script>
    <script>
        $('.counter').countUp();
    </script>
    <script src="js/easing.js"></script>
    <script src="js/move-top.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll, .navbar li a, .footer li a").click(function(event) {
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //Smooth-Scrolling-JavaScript -->
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            				  			containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear'
            				 		};
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>

    <!-- //Smooth-Scrolling-JavaScript -->
    <!-- jQuery-Photo-filter-lightbox-Gallery-plugin -->
    <!--// end-smoth-scrolling -->
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/jquery.quicksand.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->

    <!-- //js -->
    <script src="js/bootstrap.js"></script>
    @yield('footer_scripts')
</body>

</html>
