@extends('frontend::layouts.app-frontend1')

@section('main-content')
<section class="banner-bottom-w3ls py-4" style="padding-top:5rem!important">
    <div class="container">
        <div class="inner-sec-wthreelayouts py-4" style="padding-top:3rem!important">
        <input id="id" type='hidden' name='id' value='0'>
            <div class="row">
            
                <div class="col-md-1">
                </div>
                <div class="col-md-10" style="color:black">
                <a href="{{route('resume-admin')}}" id="createbutton" type="button" class=" btn-sm btn-primary" style="margin-bottom:5px">@lang("admin::resume.resume_back")</a><br><br>
                    Pembawa Materi : <b>{{$resume->scholar}}</b><br>
                    Tema Kajian : <b>{{$resume->title}}</b><br>
                    Hari, Tanggal Kajian : <b>{{$resume->date}} || {{$resume->hijr}}</b><br>
                    <br>
                    <div class="row">
                    @if($resume->video_html)
                        <div class="col-md-6">
                            {!! $resume->video_html !!}
                            <br>
                            <span><a href="{{$resume->video}}" target="_blank" rel="noopener">
                            <b>{{$resume->video}}</b></a></span>
                        </div>
                    @endif
                        <div class="col-md-6">
                            <!-- Slideshow container -->
                            <div class="slideshow-container">

                            <!-- Full-width images with number and caption text -->
                                <div class="mySlides" style="text-align:center">
                                <div class="numbertext">1 / 3</div>
                                <img src="{{$resume->getFirstMediaUrl('img_1')==null ? asset('images/bismillah1.png') : $resume->getFirstMediaUrl('img_1')}}" style="width:300px;height:225px;">
                                <div class="text">Caption Text</div>
                                </div>

                                <div class="mySlides" style="text-align:center">
                                <div class="numbertext">2 / 3</div>
                                <img src="{{$resume->getFirstMediaUrl('img_2')==null ? asset('images/bismillah2.jpg') : $resume->getFirstMediaUrl('img_2')}}" style="width:300px;height:225px;">
                                <div class="text">Caption Two</div>
                                </div>

                                <div class="mySlides" style="text-align:center">
                                <div class="numbertext">3 / 3</div>
                                <img src="{{$resume->getFirstMediaUrl('img_3')==null ? asset('images/bismillah3.jpg') : $resume->getFirstMediaUrl('img_3')}}" style="width:300px;height:225px;">
                                <div class="text">Caption Three</div>
                                </div>

                                <!-- Next and previous buttons -->
                                <a class="prevpict" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="nextpict" onclick="plusSlides(1)">&#10095;</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <b>Resume :</b>
                    <div style="color:black">
                    {!!$resume->content!!}
                    </div>
                </div>
                <div class="col-md-1">
                </div>
            </div><br><br>
           
            <div>
            <b>Kajian Yg Lain :</b>
                <div class="row">
                @foreach($resumerandoms as $resumerandom)
                    <div class="col-lg-4 about-in middle-grid-info">
                        <div class="card">
                            <div class="card-body">
                                <a href="/resume/{{$resumerandom->slug}}" style="color:black">
                                    <b>Ustadz : </b>{{$resumerandom->scholar}}</b><br>
                                    {{$resumerandom->title}}<br>
                                    
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript">
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
//   for (i = 0; i < dots.length; i++) {
//       dots[i].className = dots[i].className.replace(" active", "");
//   }
  slides[slideIndex-1].style.display = "block";
//   dots[slideIndex-1].className += " active";
}
</script>

@stop