@extends('admin::layouts.app')

{{-- page level styles --}}
@section('header_styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<style>
.box-header {background-color: #222d32;}
.box-title {float: left;display: inline-block;font-size: 18px;line-height: 18px;font-weight: 400;margin: 0;
	          padding: 0;margin-bottom: 8px;color: #fff
          }
.dz-image img{width: 100%;height: 100%;}
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
          <h3 class="box-title" id="judulsatuan">@lang("admin::dev.dev_description_edit")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container-fluid add-product">
          <form id="devform" enctype="multipart/form-data" action="{{ route('development-update',['id' => $dev->id]) }}" method="post" data-toggle="validator">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='PATCH'>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="name" class=" control-label">@lang("admin::dev.name") : </label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $dev->name }}">
                  <p style="color:red">{{ $errors->first('name') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="slug" class=" control-label">@lang('admin::dev.slug')</label>
                <div class="row">
                  <div class="col-md-9">
                  <input id="slug" type="text" class="form-control" name="slug" value="{{ $dev->slug }}">
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
                <label for="description" class=" control-label">@lang("admin::dev.description") : </label>
                <textarea id="description" cols="30" rows="2" class="form-control" name="description">{{ $dev->description }}</textarea>
                  <p style="color:red">{{ $errors->first('description') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="document">Dokumen</label>
                <div class="needsclick dropzone" id="document-dropzone">

                </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="design">Gambar Kerja</label>
                <div class="needsclick dropzone" id="design-dropzone">

                </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="@lang('admin::dev.dev_edit')">
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script type="text/javascript">
$('#description').summernote({height: 350});
var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = { 
    url: '{{ route('tempmedia-store') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
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
      $('form').find('input[name="document[]"][value="' + name + '"]').remove()
    },
    init: function () {
    
    @if(isset($dev) && $dev->document)
      var files =
        {!! json_encode($dev->document) !!}
      
      for (var i in files) {
        var file = files[i]
        file['dataURL'] = "{{config('medialibrary.s3.domain')}}/"+file.id+"/"+file.file_name
        
        this.options.addedfile.call(this, file)
        this.options.thumbnail.call(this, file, file.dataURL);
        file.previewElement.classList.add('dz-complete')

        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
      }
    @endif
  }
}
var uploadedImageMap = {}
  Dropzone.options.designDropzone = { 
    url: '{{ route('tempmedia-store') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="design[]" value="' + response.name + '">')
      uploadedImageMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImageMap[file.name]
      }
      $('form').find('input[name="design[]"][value="' + name + '"]').remove()
    },
    init: function () {
    
    @if(isset($dev) && $dev->design)
      var files =
        {!! json_encode($dev->design) !!}
      
      for (var i in files) {
        var file = files[i]
        file['dataURL'] = "{{config('medialibrary.s3.domain')}}/"+file.id+"/"+file.file_name
        
        this.options.addedfile.call(this, file)
        this.options.thumbnail.call(this, file, file.dataURL);
        file.previewElement.classList.add('dz-complete')

        $('form').append('<input type="hidden" name="design[]" value="' + file.file_name + '">')
      }
    @endif
  }
}

function convertToSlug()
{
    var text = $('#name').val();
    var slug = text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');  
    $('#slug').val(slug); 
};
</script>
@include('flash')
@stop
