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
                             <h3>Jadwal Kajian</h3><br>
                             @foreach ($lectures as $lecture)
                                <div class="card-text"><b>{{$lecture->scholar}}</b><br>
                                {{$lecture->title}}<br>
                                @if($lecture->type)
                                Setiap :<br>
                                    <b>{{$lecture->day}} Jam : {{$lecture->from}} s.d. {{$lecture->untill}}</b>
                                @else
                                Hari :<br>
                                <b>{{$lecture->date}} Jam : {{$lecture->from}} s.d. {{$lecture->untill}}</b>
                                @endif
                                </div><br>
                            @endforeach
                        
                            {{ $lectures->links('frontend::paginator.pagi') }}<br>
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
                                        <p class="card-text" style="text-align:justify">Dengan potensi jamaah 5000 muslim dan muslimah, kami berusaha untuk memberikan tempat ibadah senyaman mungkin, 
                                         namun hal ini tak mungkin terwujud tanpa partisipasi dan peran aktif jamaah Masjid Al-Husna. Untuk itu kami pengurus
                                         mengucapkan terima kasih dan peran aktif jamaah Masjid Al-Husna selama ini.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 about-in middle-grid-info text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fas fa-signal"></i>
                                        <h5 class="card-title">Penyaluran Infaq dan Shadaqah</h5>
                                        <p class="card-text" style="text-align:justify">Infaq dan shadaqah yang disalurkan ke Masjid, kami manfaatkan sebaik-baiknya untuk memelihara dan menjaga aset 
                                          yang ada di Masjid, termasuk biaya - biaya yang di keluarkan untuk penyelenggaraan ibadah Sholat, Pengajian dan kegiatan ibadah
                                          lainnya yang bersifat jamaah yang di langsungkan di Masjid Al-Husna.
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
                                        <p class="card-text" style="text-align:justify">Perkembangan Pembangunan bisa di lihat pada link Pembangunan di header website ini.
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