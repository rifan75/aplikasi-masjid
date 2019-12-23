   @extends('frontend::layouts.app-frontend')

   @section('main-content')
    <section class="banner-bottom-w3ls py-md-5 py-4" id="about">
        <div class="container">
            <div class="inner-sec-wthreelayouts py-md-5 py-4" style="padding-top:0px !important">
                <div class="row">
                    <div class="col-lg-3 about-img">
                        <div class="wsholat"><script type="text/javascript" src="https://www.muslimpro.com/muslimprowidget.js?cityid=1627459&language=id&timeformat=24" async></script> </div>
                    </div>
                    <div class="col-lg-5">
                            <h3>Pengumuman</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing.
                            </p>
                             <h3>Jadwal Kajian</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing.
                            </p>
                        
                     
                        <!--/about-in-->
                    </div>
                    <div class="col-lg-4">
                        <h2>Sejarah Masjid</h2>
                        <p class="my-4">{!!$mosque->history!!}</p>
                        <!--/about-in-->
                    </div>
                </div>
                <!--/services-grids-->
                <div class="service-mid-sec mt-lg-5 mt-4">
                    <div class="middle-serve-content py-md-5 py-4">
                    <h2>Pelayanan</h2><br>
                        <div class="row middle-grids">
                            <div class="col-lg-4 about-in middle-grid-info text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="far fa-lightbulb"></i>
                                        <h5 class="card-title">Tempat Ibadah</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 about-in middle-grid-info text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fas fa-signal"></i>
                                        <h5 class="card-title">Penyaluran Infaq dan Shadaqah</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 about-in middle-grid-info text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="far fa-clone"></i>
                                        <h5 class="card-title">Tempat Pendidikan Al-Quran </h5>
                                        <p class="card-text">(dlm Tahap Pembangunan).
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//services-grids-->
                <!--/progress-->
                <!--//progress-->
            </div>
        </div>
    </section>

@endsection