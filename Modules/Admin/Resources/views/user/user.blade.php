@extends('admin::layouts.app')
{{-- page level styles --}}
@section('header_styles')
<style>
.box-header {background-color: #222d32;}
.box-title {float: left;display: inline-block;font-size: 18px;line-height: 18px;font-weight: 400;margin: 0;
	          padding: 0;margin-bottom: 8px;color: #fff
          }
</style>
@stop
@section('content')
<section class="content-header">
  <h1>@lang('admin::user.list_user')<small>&nbsp;<span id="waktu"></span></small></h1>
  <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="#">@lang('admin::user.list_user')</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-9">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">@lang('admin::user.list_user')</h3>
        </div>
        <div class="box-body">
          <form method="post" id="formuser">
						<meta id="token" name="token" content="{{ csrf_token() }}">
          <table id="usertable" class="table table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
							<th ></th>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Id</th>
              <th style="text-align:center">@lang('admin::user.name')</th>
              <th style="text-align:center">@lang('admin::user.gender')</th>
              <th style="text-align:center">@lang('admin::user.email')</th>
              <th style="text-align:center">@lang('admin::user.level')</th>
              <th style="text-align:center">@lang('admin::user.active')</th>
              <th style="text-align:center">@lang('admin::user.action')</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="box" id="form">
        <div class="box-header">
          <h3 id="juduluser" class="box-title">@lang('admin::user.edit_user')</h3>
        </div>
        <div class="box-body">
          <div class="container-fluid add-product">
          <form id="userform" action="" method="post" enctype="multipart/form-data" data-toggle="validator">
            {{csrf_field()}}
            <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
              <div class="form-group col-md-12">
              	<label for="name" class=" control-label">@lang('admin::user.name')</label>
              	<input id="name" type="text" class="form-control" name="name"  readonly>
								@if ($errors->has('name'))
									<span class="help-block" style="color:red">
									<strong>{{ $errors->first('name')}}</strong>
									</span>
								@endif
              </div>
              <div class="form-group col-md-12" id="leveldiv">
								<label for="gender">@lang('admin::user.gender')</label>
								<select name="gender" id="gender" class="form-control">
									<option value="Laki-laki" id="laki">Laki-laki</option>
                  <option value="Perempuan" id="perempuan">Perempuan</option>
								</select>
								@if ($errors->has('gender'))
									<span class="help-block" style="color:red">
									<strong>{{ $errors->first('gender')}}</strong>
									</span>
								@endif
              </div>
							<div class="form-group col-md-12" id="leveldiv">
								<label for="level">@lang('admin::user.level')</label>
								<select name="level" id="level" class="form-control">
								@foreach($levels as $level)
									<option value="{{$level->name}}" id="{{$level->name}}">@lang('admin::role.'.$level->name)</option>
								@endforeach
								</select>
								@if ($errors->has('level'))
									<span class="help-block" style="color:red">
									<strong>{{ $errors->first('level')}}</strong>
									</span>
								@endif
              </div>
              <div class="form-group col-md-12">
							<label for="telephone" class=" control-label">@lang('admin::user.telephone')</label>
							<input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" readonly>
							@if ($errors->has('telephone'))
								<span class="help-block" style="color:red">
								<strong>{{ $errors->first('telephone')}}</strong>
								</span>
							@endif
						  </div>
              <div class="form-group col-md-12">
							<label for="address" class=" control-label">@lang('admin::user.address')</label>
							<textarea id="address"  cols="30" rows="2" class="form-control" name="address" readonly>{{ old('address') }}</textarea>
							@if ($errors->has('address'))
								<span class="help-block" style="color:red">
								<strong>{{ $errors->first('address')}}</strong>
								</span>
							@endif
						</div>
						<div class="form-group col-md-12">
							<label for="city" class=" control-label">@lang('admin::user.city')</label>
							<input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" readonly>
							@if ($errors->has('city'))
								<span class="help-block" style="color:red">
								<strong>{{ $errors->first('city')}}</strong>
								</span>
							@endif
						</div>
						<div class="form-group col-md-12">
							<label for="country" class=" control-label">@lang('admin::user.country')</label>
							<input id="country" type="text" class="form-control" name="country"  readonly>
							@if ($errors->has('country'))
								<span class="help-block" style="color:red">
								<strong>{{ $errors->first('country')}}</strong>
								</span>
							@endif
						</div>
							<div class="form-group col-md-12" id="leveldiv">
                <p>Size Max : 1 MB<p>
								<input type="file" name="picture" id="picture"><br>
									@if ($errors->has('picture'))
					          <span class="help-block" style="color:red">
					          <strong>{{ $errors->first('picture')}}</strong>
					          </span>
                  @endif
				        <br>
								<p id="image_picture"></p>
							</div>
							</div>
              <div class="row">
                <div class="form-group col-md-12">
          	    <input id="submit" type="submit" class="form-control btn btn-primary" value="@lang('admin::user.edit_user')" disabled>
                </div>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js" ></script>
<script id="details-template" type="text/x-handlebars-template">
    <table class="table">
        <tr>
          <td style="width:20%">
            <img src="@{{picture}}" width="100px">
          </td>
          <td style="width:30%; vertical-align:top; text-align:left">
          Telepon : <b>@{{profile_telephone}}</b><br>
          Alamat :<br><b>
          @{{profile_address}} <br>
          @{{profile_city}} @{{profile_country}}</b>
          </td>
          <td style="width:50%; vertical-align:top; text-align:left">
          
          </td>
        </tr>
    </table>
</script>
<script type="text/javascript"> 
var template = Handlebars.compile($("#details-template").html());
var table = $('#usertable').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: true,
    scrollX: true,
    dom: 'Bfrtip',
    buttons: ['csv', 'excel', 'pdf', 'print'],
    ajax: {"url" : "/admin/user"},
    columns: [
        {"className":'details-control',"orderable":false,"searchable":false,"data":null,"defaultContent": ''},
        {data: 0,className: 'dt-center'},{data: 'id', visible:false},{data: 'name'},{data: 'profile_gender'},
				{data: 'email'},{data: 'role'},{data: 'active', className: 'dt-center'},
				{data: 'action', orderable: false, className: 'dt-center'},
    ],
});

$('#usertable tbody').on('click', 'td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = table.row( tr );
    if ( row.child.isShown() ) {
        row.child.hide();
        tr.removeClass('shown');
    }
    else {
        row.child( template(row.data()) ).show();
        tr.addClass('shown');
    }
});
function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      $('#image_baru').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);

              }
          }
$('#picture').change(function(){
    readURL(this);
    $('#newpicture').remove();
    $('#image_picture').append('<div class="form-group" id="newpicture">'+
                                    '<img id="image_baru" src="" height="150" width="150"></img><br><br>'+
																'</div>');
});

$('#userform')[0].reset();

function editForm(id){
	document.getElementById('userform').reset();
  //$('#userform')[0].reset();
  $('#inputhidden').val('PATCH');
  $('#leveldiv').show();
	$('#hid1').remove();
  $.ajax({
    url : "/admin/user/"+id+"/edit",
    type : "GET",
    dataType : "JSON",
    success : function(data){
       $('#name').prop('readonly',false);
       $('#name').prop('required',true);
       $('#submit').prop('disabled',false);
       $('#name').val(data.name);
			 $('#newpicture').remove();
			 $('#image_picture').append('<div class="form-group" id="newpicture">'+
	                                     '<img id="image_baru" src="'+data.full_picture_path+
																			 '" height="150" width="150"></img><br><br>'+
	 																'</div>');
		
       $('#level option[value= "'+data.level+'"]').prop("selected",true);
       $('#gender option[value= "'+data.gender+'"]').prop("selected",true);
       $('#telephone').prop('readonly',false);
       $('#telephone').val(data.telephone);
       $('#address').prop('readonly',false);
       $('#address').val(data.address);
       $('#city').prop('readonly',false);
       $('#city').val(data.city);
       $('#country').prop('readonly',false);
       $('#country').val(data.country);
       $('#userform').attr('action', '/admin/user/'+id);
    },
    error : function() {
      swal("@lang('admin::ajax.error')","@lang('admin::ajax.ops_something_wrong')","error");
    },
  });
}

function deleteForm(id) {
	swal({
		title: "@lang('admin::ajax.are_you_sure')",
		text: "@lang('admin::ajax.erased_data_cannot_be_back')",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: "@lang('admin::ajax.yes_delete')"
	}).then((result) => {
		if (result.value) {
					$.ajax({
						url : "/admin/user/"+id,
						type : "POST",
						data: {_method: 'DELETE'},
						beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
						success : function(data){
						table.ajax.reload();
						swal("@lang('admin::ajax.success')","@lang('admin::ajax.data_is_erased')","success");
					},
						error : function(data) {
						swal("@lang('admin::ajax.error')","@lang('admin::ajax.cannot_erased_data')","error");
					}
					});
			}
	});
}
function editAct(id,act) {
  swal({
    title: "@lang('admin::ajax.are_you_sure')",
    text: "@lang('admin::ajax.this_will_change_active_mode')",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "@lang('admin::ajax.yes_i_am_sure')"
  }).then((result) => {
		if (result.value) {
      $.ajax({
        url : "/activateuser/"+id+"/"+act,
        type : "PATCH",
        data: {_method: 'UPDATE'},
        beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
        success : function(data){
        table.ajax.reload();
        swal("@lang('admin::ajax.success')","@lang('admin::ajax.active_mode_is_changed')","success");
      },
        error : function(data) {
        swal("@lang('admin::ajax.error')","@lang('admin::ajax.ops_something_wrong')","error");
      }
      });
		}
  });
}
</script>
@include('flash')

@stop
