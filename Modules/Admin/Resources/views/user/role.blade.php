@extends('admin::layouts.app')
{{-- page level styles --}}
@section('header_styles')

<style>
.box-header {background-color: #222d32;}
.box-title {float: left;display: inline-block;font-size: 18px;line-height: 18px;font-weight: 400;margin: 0;
	          padding: 0;margin-bottom: 8px;color: #fff
          }
.text-wrap{
    white-space:normal;
}
</style>
@stop
@section('content')
<section class="content-header">
<h1>@lang('admin::role.list_role')</h1>
  <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="#">@lang('admin::role.list_role')</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">@lang('admin::role.list_role')</h3>
        </div>
        <div class="box-body">
          <form method="post" id="formuser">
						<meta id="token" name="token" content="{{ csrf_token() }}">
          <table id="roletable" class="table table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Ide</th>
							<th style="text-align:center">@lang('admin::role.name')</th>
							<th style="text-align:center">@lang('admin::role.permission')</th>
              <th style="text-align:center">@lang('admin::role.action')</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box" id="form">
        <div class="box-header">
          <h3 id="judulrole" class="box-title">@lang('admin::role.edit_role')</h3>
        </div>
        <div class="box-body">
          <div class="container-fluid add-product">
          <form id="roleform" action="" method="post" enctype="multipart/form-data" data-toggle="validator">
            {{csrf_field()}}
            <input id="inputhidden" type='hidden' name='_method' value='PATCH'>
              <div class="row">
              <div class="form-group col-md-12">
              	<label for="name" class=" control-label">@lang('admin::role.name')</label>
              	<input id="name" type="text" class="form-control" name="name"  readonly>
								@if ($errors->has('name'))
									<span class="help-block" style="color:red">
									<strong>{{ $errors->first('name')}}</strong>
									</span>
								@endif
              </div>
							<div class="form-group col-md-12" id="leveldiv">
								<label for="level">@lang('admin::role.permission')</label><br>
								@foreach($permissions as $permission)
                  <input name="permission[]" type="checkbox" id = "{{$permission->id}}" value="{{$permission->id}}">
                  @lang('admin::role.'.$permission->name)<br>
								@endforeach
								@if ($errors->has('level'))
									<span class="help-block" style="color:red">
									<strong>{{ $errors->first('level')}}</strong>
									</span>
								@endif
							</div>
              <div class="row">
                <div class="form-group col-md-12">
          	    <input id="submit" type="submit" class="form-control btn btn-primary" value="@lang('admin::role.edit_role')" disabled>
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
<script type="text/javascript">
var table = $('#roletable').DataTable({
    autoWidth: true,
    processing: true,
    scrollX: true,
    serverSide: true,
    dom: 'Bfrtip',
    buttons: ['csv', 'excel', 'pdf', 'print'],
    ajax: {"url" : "/admin/role"},
    columns: [
        {data: 1, className: 'dt-center'},{data: 2, visible:false},{data: 3},{data: 4},
				{data: 5, className: 'dt-center'}
    ],
    columnDefs: [{ className: "text-wrap", "targets": [ 3 ] }],
    order: [[1,'asc']]
});
$('#roleform')[0].reset();
$("#roleform").submit(function(){
    var checked = $("#roleform input:checked").length > 0;
    if (!checked){
        alert('@lang('admin::role.check')');
        return false;
    }
});
function editForm(id){
	document.getElementById('roleform').reset();
  // $('#inputhidden').val('PATCH');
  $('#leveldiv').show();
	$('#hid1').remove();
  $.ajax({
    url : "/admin/role/"+id+"/edit",
    type : "GET",
    dataType : "JSON",
    success : function(data){
       $('#submit').prop('disabled',false);
       $('#name').val(data.name);
       $.each(data.permission, function(k,v){
        $('#'+v.id).prop('checked', true);
       });
			 
       $('#roleform').attr('action', '/admin/role/'+id);
    },
    error : function() {
      swal("@lang('user::formuser.error')","@lang('admin::ajax.ops_something_wrong')","error");
    },
  });
}
</script>
@include('flash')

@stop