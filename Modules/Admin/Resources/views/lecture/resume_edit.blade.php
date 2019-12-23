@extends('admin::layouts.app')

{{-- page level styles --}}
@section('header_styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<style>
.box-header {background-color: #222d32;}
.box-title {float: left;display: inline-block;font-size: 18px;line-height: 18px;font-weight: 400;margin: 0;
	          padding: 0;margin-bottom: 8px;color: #fff
          }

.note-group-select-from-files {
  display: none;
}
</style>
@stop

@section('content')
<section class="content">
  <div class="row">
  <div class="col-md-3">
    <table id="lecturetable" class="table table-hover">
        <thead style="vertical-align:middle">
        <tr>
        <th></th>
        <th></th>
            <th style="text-align:center">Jadwal</th>
            <th style="text-align:center"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
    <div class="col-md-9">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" id="judulsatuan">@lang("admin::resume.resume_edit")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container-fluid add-product">
          <form id="resumeform" enctype="multipart/form-data" action="{{ route('resume-store') }}" method="post" data-toggle="validator">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="move" class=" control-label">@lang('admin::resume.lecture')</label>
                <input id="move" type="text" class="form-control" 
                value="{{$resume->scholar}} - {{$resume->lecture->type?$resume->lecture->daytrans:$resume->lecture->date}} - {{$resume->lecture->from}} s.d {{$resume->lecture->untill}}" 
                readonly>
                <input id="scholar" type="hidden" class="form-control" name="scholar" value="{{ $resume->scholar }}" readonly>
                <input id="lecture_id" type="hidden" class="form-control" name="lecture_id" value="{{ $resume->lecture_id }}" readonly>
                <p style="color:red">{{ $errors->first('scholar') }}</p>
                </div>
              </div>
              <div class="row" id="datediv">
                <div class="form-group col-md-4">
                  <label for="date">@lang('admin::resume.date') : </label>
                  <div class='input-group date'>
                      <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                      <input type='text' class="form-control"  name="date" id="date" value="{{ $resume->dateedit }}" required/>
                  </div>
                  <p style="color:red">{{ $errors->first('date') }}</p>
                </div>
                <div class="form-group col-md-8">
                <label for="video" class=" control-label">@lang("admin::resume.video") : </label>
                <input type='text' class="form-control"  name="video" id="video" value="{{ $resume->video }}"/>
                  <p style="color:red">{{ $errors->first('video') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4" id="imagediv1">
                  <p>Size Max : 1 MB<p>
                  <img id="img_1" src="{{asset('images/bismillah1.png')}}" style="margin-right:10px" width="100%" height="200px">
                  <br><br>
                  <input type="file" name="img_resume_1" id="img_resume_1"><br>
                  <p style="color:red">{{ $errors->first('img_resume_1') }}</p>
                </div>
                <div class="form-group col-md-4" id="imagediv2">
                  <p>Size Max : 1 MB<p>
                  <img id="img_2" src="{{asset('images/bismillah2.jpg')}}" style="margin-right:10px" width="100%" height="200px">
                  <br><br>
                  <input type="file" name="img_resume_2" id="img_resume_2"><br>
                  <p style="color:red">{{ $errors->first('img_resume_2') }}</p>
                </div>
                <div class="form-group col-md-4" id="imagediv3">
                  <p>Size Max : 1 MB<p>
                  <img id="img_3" src="{{asset('images/bismillah3.jpg')}}" style="margin-right:10px" width="100%" height="200px">
                  <br><br>
                  <input type="file" name="img_resume_3" id="img_resume_3"><br>
                  <p style="color:red">{{ $errors->first('img_resume_2') }}</p>
                </div>
              </div>
              <div class="row">
              <div class="form-group col-md-12">
							<label for="title" class=" control-label">@lang('admin::resume.title')</label>
							<input id="title" type="text" class="form-control" name="title" value="{{ $resume->title }}">
							<p style="color:red">{{ $errors->first('title') }}</p>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-md-12">
              <label for="slug" class=" control-label">@lang('admin::resume.slug')</label>
              <div class="row">
              <div class="col-md-9">
							<input id="slug" type="text" class="form-control" name="slug" value="{{ $resume->slug }}">
              </div>
              <div class="col-md-3">
              <a href="#datediv" onclick="convertToSlug()" class="btn btn-success"role="button">Generate Slug</a>
              </div>
              </div>
              <p style="color:red">{{ $errors->first('slug') }}</p>
              </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="content" class=" control-label">@lang("admin::resume.content") : </label>
                <textarea id="content" cols="30" rows="30" class="form-control" name="content">{{ $resume->content }}</textarea>
                  <p style="color:red">{{ $errors->first('content') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="@lang('admin::resume.resume_add')">
                </div>
              </div>
          </form>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
  <!-- /.row -->
 </div>
</section>
    <!-- /.content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script type="text/javascript" src="{{asset('js/admin/bootstrap-datetimepicker.js')}}" ></script>
<script type="text/javascript">
$('#content').summernote({height: 350});
function readURL1(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      $('#img_1').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);

              }
          }
function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img_2').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);

    }
}
function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img_3').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);

    }
}

$('#img_resume_1').change(function(){
    readURL1(this);
});

$('#img_resume_2').change(function(){
    readURL2(this);
});

$('#img_resume_3').change(function(){
    readURL3(this);
});

function convertToSlug()
{
    var text = $('#title').val();
    var slug = text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');  
    $('#slug').val(slug); 
}

$('#resumeform')[0].reset();
$('#date').datetimepicker({
          format: 'DD MMMM YYYY'
        });
var table = $('#lecturetable').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: false,
    pageLength: 10,
    pagingType: "simple",
    ajax: {"url" : "/admin/resume-create"},
    columns: [
        {data: 'no',visible: false},{data: 'id',visible: false},{data: 'content'},{data: 'klik', className: 'dt-center'},
        {data: 'move',visible: false},{data: 'scholar',visible: false}
    ],
});

$('#lecturetable tbody').on( 'click', '#clicktabel', function () {
    var id = table.row($(this).closest('tr')).data()['id'];
    var move = table.row($(this).closest('tr')).data()['move'];
    var scholar = table.row($(this).closest('tr')).data()['scholar'];
    $('#move').val(move);
    $('#scholar').val(scholar);
    $('#lecture_id').val(id);
} );
</script>
@include('flash')
@stop
