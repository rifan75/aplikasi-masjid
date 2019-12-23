@extends('admin::layouts.app')

{{-- page level styles --}}
@section('header_styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
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
          <h3 class="box-title" id="judulsatuan">@lang("admin::mosque.data_mosque")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form id="mosqueform" enctype="multipart/form-data" action="{{ route('mosque-update', ['id' => $mosque->id]) }}" method="post" data-toggle="validator">
          <div class="container-fluid col-md-6">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='PATCH'>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="name" class=" control-label">@lang("admin::mosque.name") : </label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $mosque->name }}" required>
                  <p style="color:red">{{ $errors->first('name') }}</p>
                </div>
              </div>
              <div class="row">
              <div class="form-group col-md-12" id="leveldiv">
                <p>Size Max : 1 MB<p>
                <img id="img_mosque" src="{{$mosque->getFirstMediaUrl('mosque')==null ? asset('images/al-husna-luar-crop.jpg') : $mosque->getFirstMediaUrl('mosque')}}" style="margin-right:20px" width="100%">
								<br><br>
                <input type="file" name="picture" id="picture"><br>
									@if ($errors->has('picture'))
					          <span class="help-block" style="color:red">
					          <strong>{{ $errors->first('picture')}}</strong>
					          </span>
					        @endif
              </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="history" class=" control-label">@lang("admin::mosque.history") : </label>
                <textarea id="history" cols="30" rows="20" class="form-control" name="history">{{ $mosque->history }}</textarea>
                  <p style="color:red">{{ $errors->first('history') }}</p>
                </div>
              </div>
          
          </div>
  
          <div class="container-fluid col-md-6">
          
          <div class="row">
            <div class="form-group col-md-12">
            <label for="email" class=" control-label">@lang("admin::mosque.email") : </label>
            <input id="email" type="text" class="form-control" name="email" value="{{ $mosque->contact['Email'] }}" required>
              <p style="color:red">{{ $errors->first('email') }}</p>
            </div>
          </div>
          <div class="row">
          <div class="form-group col-md-12">
          <label for="telephone" class=" control-label">@lang('admin::mosque.telephone')</label>
          <input id="telephone" type="text" class="form-control" name="telephone" value="{{ $mosque->contact['Telephone'] }}">
          <p style="color:red">{{ $errors->first('telephone') }}</p>
          </div>
          </div>
          <div class="row">
          <div class="form-group col-md-12">
          <label for="address" class=" control-label">@lang('admin::mosque.address')</label>
          <textarea id="address"  cols="30" rows="2" class="form-control" name="address" required>{{ $mosque->contact['Address'] }}</textarea>
          <p style="color:red">{{ $errors->first('address') }}</p>
        </div>
        </div>
          <div class="row">
        <div class="form-group col-md-12">
          <label for="city" class=" control-label">@lang('admin::mosque.city')</label>
          <input id="city" type="text" class="form-control" name="city" value="{{ $mosque->contact['City'] }}" required>
          <p style="color:red">{{ $errors->first('city') }}</p>
        </div>
        </div>
          <div class="row">
          <div class="form-group col-md-12">
            <label for="country" class=" control-label">@lang('admin::mosque.country')</label>
            <input id="country" type="text" class="form-control" name="country" value="{{ $mosque->contact['Country'] }}">
            <p style="color:red">{{ $errors->first('country') }}</p>
          </div>
          </div>
          <h3>@lang("admin::mosque.caretaker")</h3>
          <div class="row">
            <div class="form-group col-md-12">
            <label for="chief" class=" control-label">@lang("admin::mosque.chief") : </label>
            <input id="chief" type="text" class="form-control" name="chief" value="{{ $mosque->organizer['chief'] }}" required>
              <p style="color:red">{{ $errors->first('chief') }}</p>
            </div>
          </div>
          <div class="row">
          <div class="form-group col-md-12">
          <label for="deputy_chief" class=" control-label">@lang('admin::mosque.deputy_chief')</label>
          <input id="deputy_chief" type="text" class="form-control" name="deputy_chief" value="{{ $mosque->organizer['deputy_chief'] }}">
          <p style="color:red">{{ $errors->first('deputy_chief') }}</p>
          </div>
          </div>
          <div class="row">
          <div class="form-group col-md-12">
            <label for="treasury" class=" control-label">@lang('admin::mosque.treasury')</label>
            <input id="treasury" type="text" class="form-control" name="treasury" value="{{ $mosque->organizer['treasury'] }}" required>
            <p style="color:red">{{ $errors->first('treasury') }}</p>
          </div>
        </div>
          <div class="row">
          <div class="form-group col-md-12">
            <label for="consumsi" class=" control-label">@lang('admin::mosque.consumsi')</label>
            <input id="consumsi" type="text" class="form-control" name="consumsi" value="{{ $mosque->organizer['consumsi'] }}">
            <p style="color:red">{{ $errors->first('consumsi') }}</p>
          </div>
          </div>

          <div class="row">
          <div class="form-group col-md-12">
          <label for="security" class=" control-label">@lang('admin::mosque.security')</label>
          <input id="security" type="text" class="form-control" name="security" value="{{ $mosque->organizer['security'] }}">
          <p style="color:red">{{ $errors->first('security') }}</p>
          </div>
          </div>
          <h3>@lang("admin::mosque.implementer")</h3>
          <div class="row">
          <div class="form-group col-md-12">
            <label for="imam" class=" control-label">@lang('admin::mosque.imam')</label>
            <input id="imam" type="text" class="form-control" name="imam" value="{{ $mosque->organizer['imam'] }}" required>
            <p style="color:red">{{ $errors->first('imam') }}</p>
          </div>
        </div>
          <div class="row">
          <div class="form-group col-md-12">
            <label for="marbout" class=" control-label">@lang('admin::mosque.marbout')</label>
            <input id="marbout" type="text" class="form-control" name="marbout" value="{{ $mosque->organizer['marbout'] }}">
            <p style="color:red">{{ $errors->first('marbout') }}</p>
          </div>
          </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="@lang('admin::mosque.mosque_edit')">
            </div>
          </div>
      
      
          </form>
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
<script type="text/javascript">
$('#history').summernote({height: 350});
function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      $('#img_mosque').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);

              }
          }
$('#picture').change(function(){
    readURL(this);
});
$('#mosqueform')[0].reset();
</script>
@include('flash')
@stop
