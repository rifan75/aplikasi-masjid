@extends('admin::layouts.app')
@section('header_styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<style>
.box-header {background-color: #222d32;}
.box-title {float: left;display: inline-block;font-size: 18px;line-height: 18px;font-weight: 400;margin: 0;
	          padding: 0;margin-bottom: 8px;color: #fff
          }
</style>
@stop
@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="row"  style="margin-left:0px;margin-right:0px">
		<div class="box">
			<div class="box-header">
                <h3 class="box-title">Assalamualaikum,&nbsp; {{Auth::user()->name}}</h3>
                
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
					<div id="image" class="col-md-6"> 
						<img alt="User Pic" src="{{Auth::user()->getFirstMediaUrl('picture')==null ? asset('images/picture.jpg') : Auth::user()->getFirstMediaUrl('picture')}}" class="img-responsive" height="200px" width="200px">
					</div>
					<div id="side" class="col-md-6"> 
                        <p>@lang('admin::myuser.gender') : {{$user->profile->contact['Gender']}}</p>
						<p>@lang('admin::myuser.telephone') : <br>{{$user->profile->contact['Telephone']}}</p>
						<p>@lang('admin::myuser.email') : {{$user->email}}</p>
						
						@lang('admin::myuser.address') : <br>
							{{$user->profile->contact['Address']}}
							{{$user->profile->contact['City']}}
							{{$user->profile->contact['Country']}}
					</div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#profileModal" style="margin-top:15px;margin-left:15px">@lang('admin::myuser.edit_profile')</button>
						</div>
					</div>
				</div>
            </div>
            <div class="box">
		<div class="box-header">
			<h3 id="judulchangepassword" class="box-title">@lang('admin::myuser.change')</h3>
		</div>
		<div class="box-body">
			<div class="container-fluid">
				<form id="userform" action="/admin/passwd/{{Auth::user()->id}}" method="post" enctype="multipart/form-data" data-toggle="validator">
					{{csrf_field()}}
					<input id="inputhidden" type='hidden' name='_method' value='PATCH'>
					<div class="form-group col-md-12">
					  <label class="col-md-4 control-label" style="padding-left:0px" for="piCurrPass">@lang('admin::myuser.old') </label>
					  <div class="col-md-8" style="padding-left:0px;padding-right:0px">
					    <input id="oldpassword" name="oldpassword" type="password"  class="form-control input-md" required>
					  </div>
						@if ($errors->has('oldpassword'))
							<span class="help-block" style="color:red">
							<strong>{{ $errors->first('oldpassword')}}</strong>
							</span>
						@endif
					</div>
					<div class="form-group col-md-12">
					  <label class="col-md-4" style="padding-left:0px" for="piNewPass">@lang('admin::myuser.new') </label>
					  <div class="col-md-8" style="padding-left:0px;padding-right:0px">
					    <input id="password" name="password" type="password"  class="form-control input-md" required>
					  </div>
						@if ($errors->has('password'))
							<span class="help-block" style="color:red">
							<strong>{{ $errors->first('password')}}</strong>
							</span>
						@endif
					</div>
					<div class="form-group col-md-12">
					  <label class="col-md-4 control-label" style="padding-left:0px" for="piNewPassRepeat">@lang('admin::myuser.confirm') </label>
					  <div class="col-md-8" style="padding-left:0px;padding-right:0px">
					    <input id="password_confirmation" name="password_confirmation"
							data-match="#password" type="password" placeholder="" class="form-control input-md" required="">
					  </div>
						@if ($errors->has('outlet_province'))
							<span class="help-block" style="color:red">
							<strong>{{ $errors->first('outlet_province')}}</strong>
							</span>
						@endif
					</div>
					<div class="form-group col-md-12">
					    <button id="submit" type="submit" class="btn btn-success">@lang('admin::myuser.edit')</button>
					</div>
				</form>
            </div>
            </div>
        </div>
		</div>
	</div>

<div class="container">
<div class="col-md-6">
    <div class="row justify-content-center">
        <div class="col-md-12" style="text-align:center;display: inline-block;">
            <div class="card">
                <div class="card-header">
                    <img src="{{asset('images/bismillah1.png')}}" style="width:20%">
                    <h1>Aplikasi Masjid Al-Husna</h1>
                </div>
                <div class="card-body">
                    <h2>version 1.0</h2><br>
                    <p>created by : Mohamad Rifan Baihaqie</p>
                    <h4>Gunakan <a href="https://bendapusaka.id" target="_blank" rel="noopener">
                                https://bendapusaka.id</a>
                        Untuk Mengelola Aset Anda                    
                    </h4>
                </div>
                <a href="https://bendapusaka.id" target="_blank" rel="noopener">
							<img src="/images/benpus.png" class="img-fluid" alt="">
						</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@include('admin::user.modaluserdashboard')
<br><br><br><br>
@endsection
{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript">
var g = $('#genderhidden').val();
$('#gender option[value= "'+g+'"]').prop("selected",true);
function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      $('#img_user').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);

              }
          }
$('#picture').change(function(){
    readURL(this);
});
$('#userform')[0].reset();
</script>
@include('flash')
@stop
