@extends('frontend::layouts.app-frontend1')
{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.25.6/sweetalert2.min.css">
@stop
@section('main-content')
<section class="banner-bottom-w3ls py-4" style="padding-top:5rem!important">
    <div class="container">
        <div class="inner-sec-wthreelayouts py-4" style="padding-top:3rem!important">
        <input id="id" type='hidden' name='id' value='0'>
            <div class="row">
                <div class="col-md-3" id="agree">
                {!!$resume->published?'<h3>Published</h3>':'<h3>Unpublish</h3>'!!}
                <br>
                @if($resume->user_id != Auth::user()->id && !$resume->agree->contains('user_id',Auth::user()->id))
                <a href="#" onclick="publishArt('1');" id="createpublishbutton" type="button" class=" btn-sm btn-success" style="margin-bottom:5px">Publish</a>
                <a href="#" onclick="publishArt('0');" id="createnopublishbutton" type="button" class=" btn-sm btn-danger" style="margin-bottom:5px">No Publish</a><br><br>
                @endif
                Yg Menyetujui :<br>
                @foreach($resume->agree as $agree)
                    @if($agree->agree==true)
                    <li>
                    {{$agree->user->name}} <br> {{$agree->date}}
                    {!! $agree->user_id==Auth::user()->id?"<a href='#' onclick='editArt(\"".$agree->id."\",\"".$resume->id."\")'><i class='fa fa-check' title='edit'></i></a>":"" !!}
                    </li>
                    @endif
                    <li>--</li>
                @endforeach
                <br>
                Yg Tidak Menyetujui :
                @foreach($resume->agree as $agree)
                    @if($agree->agree==false)
                    <li>
                    {{$agree->user->name}} <br> {{$agree->date}}
                    {!! $agree->user_id==Auth::user()->id?"<a href='#' onclick='editArt(\"".$agree->id."\",\"".$resume->id."\")'><i class='fa fa-ban' title='edit'></i></a>":"" !!}
                    </li>
                    @endif
                    <li>--</li>
                @endforeach
                </div>
                <div class="col-md-9" style="color:black">
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
                                <img src="{{$resume->getFirstMediaUrl('img_resume_1')==null ? asset('images/bismillah1.png') : $resume->getFirstMediaUrl('img_resume_1')}}" style="width:300px;height:225px;">
                                <div class="text">Caption Text</div>
                                </div>

                                <div class="mySlides" style="text-align:center">
                                <div class="numbertext">2 / 3</div>
                                <img src="{{$resume->getFirstMediaUrl('img_resume_2')==null ? asset('images/bismillah2.jpg') : $resume->getFirstMediaUrl('img_resume_2')}}" style="width:300px;height:225px;">
                                <div class="text">Caption Two</div>
                                </div>

                                <div class="mySlides" style="text-align:center">
                                <div class="numbertext">3 / 3</div>
                                <img src="{{$resume->getFirstMediaUrl('img_resume_3')==null ? asset('images/bismillah3.jpg') : $resume->getFirstMediaUrl('img_resume_3')}}" style="width:300px;height:225px;">
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.25.6/sweetalert2.min.js"></script>
<script type="text/javascript">
var $=jQuery.noConflict();

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
function publishArt(publish) {
  swal({
    title: "@lang('admin::ajax.are_you_sure')",
    text: "@lang('admin::ajax.this_will_change_publish_mode')",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "@lang('admin::ajax.yes_i_am_sure')"
  }).then((result) => {
		if (result.value) {
      $.ajax({
        url : "/admin/resumeagree/",
        type : "POST",
        data:   {
                    _method: 'POST',
                    _token: "{{ csrf_token() }}",
                    resume_id: '{{$resume->id}}',
                    agree: publish,
                },
        success : function(data){
        location.reload();
        swal("@lang('admin::ajax.success')","@lang('admin::ajax.publish_mode_is_changed')","success");
      },
        error : function(data) {
        swal("@lang('admin::ajax.error')","@lang('admin::ajax.ops_something_wrong')","error");
      }
      });
		}
  });
}
function editArt(id,artId) {
  swal({
    title: "@lang('admin::ajax.are_you_sure')",
    text: "@lang('admin::ajax.this_will_change_agreement')",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "@lang('admin::ajax.yes_i_am_sure')"
  }).then((result) => {
		if (result.value) {
      $.ajax({
        url : "/admin/resumeagree/"+id+"/"+artId,
        type : "PATCH",
        data:   {
                    _method: 'UPDATE',
                    _token: "{{ csrf_token() }}",
                },
        success : function(data){
        location.reload();
        swal("@lang('admin::ajax.success')","@lang('admin::ajax.publish_mode_is_changed')","info");
      },
        error : function(data) {
        swal("@lang('admin::ajax.error')","@lang('admin::ajax.ops_something_wrong')","error");
      }
      });
		}
  });
}
</script>

@stop