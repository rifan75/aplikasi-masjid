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
    <!--section starts-->
<h1>@lang("admin::scholar.scholar")</h1>
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active"><a href="#">@lang("admin::scholar.scholar")</a></li>
</ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">@lang("admin::scholar.scholar_list")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
					<form method="post" id="formsatuan">
						<meta id="token" name="token" content="{{ csrf_token() }}">
          <table id="scholartable" class="table table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
              <th ></th>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Id</th>
              <th style="text-align:center">@lang("admin::scholar.name")</th>
              <th style="text-align:center">@lang("admin::scholar.gender")</th>
              <th style="text-align:center">@lang("admin::scholar.telephone")</th>
              <th style="text-align:center">@lang("admin::scholar.action")</th>
            </tr>
            </thead>
            <tbody>
		        </tbody>
          </table>
					</form>
        </div>
            <!-- /.box-body -->
      </div>
	  <!-- /.box -->
	  </div>
    <div class="col-md-4">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" id="judulsatuan">@lang("admin::scholar.scholar_input")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container-fluid add-product">
          <form id="scholarform" enctype="multipart/form-data" action="{{ route('scholar-store') }}" method="post" data-toggle="validator">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="name" class=" control-label">@lang("admin::scholar.name") : </label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                  <p style="color:red">{{ $errors->first('name') }}</p>
                </div>
              </div>
              <div class="row">
              <div class="form-group col-md-12" id="leveldiv">
								<label for="gender">@lang('admin::scholar.gender')</label>
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
              </div>
              <div class="row">
              <div class="form-group col-md-12">
							<label for="telephone" class=" control-label">@lang('admin::scholar.telephone')</label>
							<input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}">
							<p style="color:red">{{ $errors->first('telephone') }}</p>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-md-12">
							<label for="address" class=" control-label">@lang('admin::scholar.address')</label>
							<textarea id="address"  cols="30" rows="2" class="form-control" name="address">{{ old('address') }}</textarea>
							<p style="color:red">{{ $errors->first('address') }}</p>
            </div>
            </div>
              <div class="row">
						<div class="form-group col-md-12">
							<label for="city" class=" control-label">@lang('admin::scholar.city')</label>
							<input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">
							<p style="color:red">{{ $errors->first('city') }}</p>
            </div>
            </div>
              <div class="row">
						<div class="form-group col-md-12">
							<label for="country" class=" control-label">@lang('admin::scholar.country')</label>
							<input id="country" type="text" class="form-control" name="country">
							<p style="color:red">{{ $errors->first('country') }}</p>
						</div>
							
							</div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="note" class=" control-label">@lang("admin::scholar.note") : </label>
                <textarea id="note" cols="30" rows="2" class="form-control" name="note">{{ old('note') }}</textarea>
                  <p style="color:red">{{ $errors->first('note') }}</p>
                </div>
              </div>
              <div class="row">
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
                  <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="@lang('admin::scholar.scholar_add')">
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js" ></script>
<script id="details-template" type="text/x-handlebars-template">
    <table class="table">
        <tr>
          <td style="width:20%">
            <img src="@{{picture}}" width="100px">
          </td>
          <td style="width:60%; vertical-align:top; text-align:left">
          Alamat :<br><b>
          @{{address}} <br>
          @{{city}} @{{country}}</b><br>
          </td>
          <td style="width:20%; vertical-align:top; text-align:left">
          
          </td>
        </tr>
        <tr>
          <td style="width:80%" colspan="3">
            Note :<br> <b>
            @{{note}}</b>
          </td>
        </tr>
    </table>
</script>
<script type="text/javascript">
var template = Handlebars.compile($("#details-template").html());
var table = $('#scholartable').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: true,
    scrollX: true,
    dom: 'Bfrtip',
    buttons: ['csv', 'excel', 'pdf', 'print'],
    ajax: {"url" : "/admin/scholar"},
    columns: [
        {"className":'details-control',"orderable":false,"searchable":false,"data":null,"defaultContent": ''},
        {data: 0, width: '10px', orderable: false},{data: 'id',  visible: false},
        {data: 'name'},{data: 'gender'},{data: 'telephone'},
				{data: 'action', className: 'dt-center', orderable: false}
    ],
});
$('#scholartable tbody').on('click', 'td.details-control', function () {
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

$('#scholarform')[0].reset();
function editForm(id){
	  $('#inputhidden').val('PATCH');
	  $('#scholarform')[0].reset();
	  $.ajax({
	    url : "/admin/scholar/"+id+"/edit",
	    type : "GET",
	    dataType : "JSON",
	    success : function(data){
	      $('#judulsatuan').text('@lang("admin::scholar.scholar_edit")');
	      $('#submit').val('@lang("admin::scholar.scholar_edit")');
	      $('#name').val(data.name);
        $('#gender option[value= "'+data.gender+'"]').prop("selected",true);
        $('#telephone').val(data.telephone);
        $('#address').val(data.address);
        $('#city').val(data.city);
        $('#country').val(data.country);
        $('#note').val(data.note);
        $('#newpicture').remove();
			  $('#image_picture').append('<div class="form-group" id="newpicture">'+
	                                     '<img id="image_baru" src="'+data.full_picture_path+
																			 '" height="150" width="150"></img><br><br>'+
	 																'</div>');
	      $('#scholarform').attr('action', 'scholar/'+id);
	    },
	    error : function() {
				swal("@lang('admin::ajax.error')","@lang('admin::ajax.ops_something_wrong')","error");
	    },
		});
	}
//Menghapud data
	function deleteForm(id) {
    swal({
      title: "@lang('admin::ajax.are_you_sure')",
		  text: "@lang('admin::ajax.erased_data_cannot_be_back')",
      type: "warning",
			showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: "@lang('admin::ajax.yes_delete')"
		}).then((result) => {
			if (result.value) {
						$.ajax({
							url : "scholar/"+id,
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
</script>
@include('flash')
@stop
