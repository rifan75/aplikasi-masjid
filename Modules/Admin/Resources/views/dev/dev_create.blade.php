@extends('admin::layouts.app')

{{-- page level styles --}}
@section('header_styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<style>
.box-header {background-color: #222d32;}
.box-title {float: left;display: inline-block;font-size: 18px;line-height: 18px;font-weight: 400;margin: 0;
	          padding: 0;margin-bottom: 8px;color: #fff
          }
</style>
@stop

@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" id="judulsatuan">@lang("admin::event.detailevent_input")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container-fluid add-product">
          <form id="eventform" enctype="multipart/form-data" action="{{ route('detailevent-store') }}" method="post" data-toggle="validator">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="event_id" class=" control-label">@lang("admin::event.name") : </label>
                <select name="event_id" id="event_id" class="form-control">
                  @foreach($events as $event)
                    <option value="{{$event->id}}" id="{{$event->id}}">{{$event->name}} || {{$event->title}}</option>
                  @endforeach
                  </select>
                  <p style="color:red">{{ $errors->first('event_id') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="slug" class=" control-label">@lang('admin::event.slug')</label>
                <div class="row">
                  <div class="col-md-9">
                  <input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}">
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
                <label for="note" class=" control-label">@lang("admin::event.note") : </label>
                <textarea id="note" cols="30" rows="2" class="form-control" name="note">{{ old('note') }}</textarea>
                  <p style="color:red">{{ $errors->first('note') }}</p>
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
                  <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="@lang('admin::event.detailevent_add')">
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
<script type="text/javascript">

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
    var text = $('#event_id').children("option:selected").text();
    var slug = text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');  
    $('#slug').val(slug); 
};
</script>
@include('flash')
@stop
