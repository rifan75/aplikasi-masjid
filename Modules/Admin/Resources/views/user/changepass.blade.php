@extends('app')
{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="/css/bootstrap-datetimepicker.css">
<style>
.box-header {background-color: #F89A14;}
.box-title {float: left;display: inline-block;font-size: 18px;line-height: 18px;font-weight: 400;margin: 0;
	          padding: 0;margin-bottom: 8px;color: #fff
          }
</style>
@stop
@section('content')
<section class="content-header">
  <h1>@lang('user::password.title')<small>&nbsp;<span id="waktu"></span></small></h1>
  <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="#">@lang('user::password.title')</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
	<div class="box">
		<div class="box-header">
			<h3 id="judulchangepassword" class="box-title">@lang('user::password.change')</h3>
		</div>
		<div class="box-body">
			<div class="container-fluid" align="center">
				<form id="userform" action="/passwd/{{$uuid}}" method="post" enctype="multipart/form-data" data-toggle="validator">
					{{csrf_field()}}
					<input id="inputhidden" type='hidden' name='_method' value='PATCH'>
					<div class="form-group col-md-8">
					  <label class="col-md-4 control-label" for="piCurrPass">@lang('user::password.old')</label>
					  <div class="col-md-8">
					    <input id="oldpassword" name="oldpassword" type="password"  class="form-control input-md" required>
					  </div>
						@if ($errors->has('oldpassword'))
							<span class="help-block" style="color:red">
							<strong>{{ $errors->first('oldpassword')}}</strong>
							</span>
						@endif
					</div>
					<div class="form-group col-md-8">
					  <label class="col-md-4 control-label" for="piNewPass">@lang('user::password.new')</label>
					  <div class="col-md-8">
					    <input id="password" name="password" type="password"  class="form-control input-md" required>
					  </div>
						@if ($errors->has('password'))
							<span class="help-block" style="color:red">
							<strong>{{ $errors->first('password')}}</strong>
							</span>
						@endif
					</div>
					<div class="form-group col-md-8">
					  <label class="col-md-4 control-label" for="piNewPassRepeat">@lang('user::password.confirm')</label>
					  <div class="col-md-8">
					    <input id="password_confirmation" name="password_confirmation"
							data-match="#password" type="password" placeholder="" class="form-control input-md" required="">
					  </div>
						@if ($errors->has('outlet_province'))
							<span class="help-block" style="color:red">
							<strong>{{ $errors->first('outlet_province')}}</strong>
							</span>
						@endif
					</div>
					<div class="form-group col-md-8">
					    <button id="submit" type="submit" class="btn btn-success">@lang('user::password.edit')</button>
					</div>
				</form>
  	</div>
	</div>
</div>
</div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
@include('flash')
@stop
