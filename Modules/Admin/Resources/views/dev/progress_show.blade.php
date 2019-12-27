@extends('frontend::layouts.app-frontend1')
@section('header_styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet" />
@stop
@section('main-content')
<section class="banner-bottom-w3ls py-4" style="padding-top:5rem!important">
    <div class="container">
        <div class="inner-sec-wthreelayouts py-4" style="padding-top:3rem!important">
        <input id="slug" type='hidden' name='slug' value='{{$dev->slug}}'>
            <div class="row">
                <div class="col-md-12" style="color:black">
                <a href="{{route('progress-admin')}}" id="backbutton" type="button" class=" btn-sm btn-primary" style="margin-bottom:5px">@lang("admin::dev.progress_back")</a><br><br>
                <h1>{{$dev->name}}</h1><br>
                <div class="row">
                <div class="form-group col-md-9">
                <label for="date" class=" control-label">@lang("admin::dev.date") : </label>
                <select name="date" id="date" class="form-control">
                  @foreach($progresses as $progress)
                    <option  id="{{$progress->date}}" value="{{$progress->dateraw}}">{{$progress->date}}</option>
                  @endforeach
                  </select>
                </div>
              </div>
              <h3 id="title"></h3>
              <div id="description"></div>
                <div class="row justify-content-center" id="image">
                </div>
                <br>
                </div>
        </div>
    </div>
</section>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script type="text/javascript">
var $=jQuery.noConflict();
var datepro =  $('#date'). children("option:selected"). val();
var slug = $('#slug').val();
$.ajax({
    url : "/admin/progress/"+slug+"/"+datepro,
    type : "GET",
    dataType : "JSON",
    success : function(data){
        $('.imagekotak').remove();
        $('#title').text('@lang("admin::dev.progress") Per- '+data.date);
        $('#description').html(data.description);
        var files = data.image;
        
        for (var i in files) {
          var file = files[i]
          file['dataURL'] = "{{config('medialibrary.s3.domain')}}/"+file.id+"/"+file.file_name
          $('#image').append('<div  class="col-sm-4 imagekotak"><a href="'+file.dataURL+'" data-toggle="lightbox" data-gallery="example-gallery">'+
                           '<img src="'+file.dataURL+'" class="img-fluid"></a></div>')
        }
    },
    error : function() {
            swal("@lang('admin::ajax.error')","@lang('admin::ajax.ops_something_wrong')","error");
    },
});

$('#date').on('change', function() {
    var slug = $('#slug').val();
    var datepro =  $('#date'). children("option:selected"). val();
    $.ajax({
    url : "/admin/progress/"+slug+"/"+datepro,
    type : "GET",
    dataType : "JSON",
    success : function(data){
        $('.imagekotak').remove();
        $('#title').text('@lang("admin::dev.progress") Per- '+data.date);
        $('#description').html(data.description);
        var files = data.image;
        
        for (var i in files) {
          var file = files[i]
          file['dataURL'] = "{{config('medialibrary.s3.domain')}}/"+file.id+"/"+file.file_name
          $('#image').append('<div  class="col-sm-4 imagekotak"><a href="'+file.dataURL+'" data-toggle="lightbox" data-gallery="example-gallery">'+
                           '<img src="'+file.dataURL+'" class="img-fluid"></a></div>')
        }
    },
    error : function() {
            swal("@lang('admin::ajax.error')","@lang('admin::ajax.ops_something_wrong')","error");
    },
});
});
</script>
@include('flash')
@stop