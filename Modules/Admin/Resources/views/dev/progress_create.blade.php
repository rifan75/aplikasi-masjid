@extends('admin::layouts.app')

{{-- page level styles --}}
@section('header_styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
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
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" id="judulsatuan">@lang("admin::dev.progress_input")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container-fluid add-product">
          <form id="devform" enctype="multipart/form-data" action="{{ route('progress-store') }}" method="post" data-toggle="validator">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
                <div class="form-group col-md-9">
                <label for="dev_id" class=" control-label">@lang("admin::dev.name") : </label>
                <select name="dev_id" id="dev_id" class="form-control">
                  @foreach($devs as $dev)
                    <option value="{{$dev->id}}" id="{{$dev->id}}">{{$dev->name}}</option>
                  @endforeach
                  </select>
                  <p style="color:red">{{ $errors->first('dev_id') }}</p>
                </div>
                <div class="form-group col-md-3">
                  <label for="date" class=" control-label">@lang('admin::dev.date')</label>
                  <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}">
                  <p style="color:red">{{ $errors->first('date') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="description" class=" control-label">@lang("admin::dev.description") : </label>
                <textarea id="description" cols="30" rows="2" class="form-control" name="description">{{ old('description') }}</textarea>
                  <p style="color:red">{{ $errors->first('description') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="image">Images</label>
                <div class="needsclick dropzone" id="image-dropzone">

                </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="@lang('admin::dev.progress_add')">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script type="text/javascript" src="{{asset('js/admin/bootstrap-datetimepicker.js')}}" ></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script type="text/javascript">
$('#description').summernote({height: 250});
$('#date').datetimepicker({
          format: 'DD MMMM YYYY'
});
var uploadedDocumentMap = {}
  Dropzone.options.imageDropzone = { 
    url: '{{ route('tempmedia-store') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="image[]"][value="' + name + '"]').remove()
    },
  }

function convertToSlug()
{
    var text = $('#dev_id').children("option:selected").text();
    var slug = text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');  
    $('#slug').val(slug); 
};
</script>
@include('flash')
@stop
