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
<h1>@lang("admin::category.category")</h1>
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active"><a href="#">@lang("admin::category.category")</a></li>
</ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">@lang("admin::category.category_list")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
					<form method="post" id="formsatuan">
						<meta id="token" name="token" content="{{ csrf_token() }}">
          <table id="categorytable" class="table table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Id</th>
              <th style="text-align:center">@lang("admin::category.name")</th>
              <th style="text-align:center">@lang("admin::category.note")</th>
              <th style="text-align:center">@lang("admin::category.action")</th>
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
          <h3 class="box-title" id="judulsatuan">@lang("admin::category.category_input")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container-fluid add-product">
          <form id="categoryform" action="{{ route('category-store') }}" method="post" data-toggle="validator">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="name" class=" control-label">@lang("admin::category.name") : </label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                  <p style="color:red">{{ $errors->first('name') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="note" class=" control-label">@lang("admin::category.note") : </label>
                <textarea id="note" cols="30" rows="2" class="form-control" name="note">{{ old('note') }}</textarea>
                  <p style="color:red">{{ $errors->first('note') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="@lang('admin::category.category_add')">
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
<script type="text/javascript">
var table = $('#categorytable').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: true,
    scrollX: true,
    dom: 'Bfrtip',
    buttons: ['csv', 'excel', 'pdf', 'print'],
    ajax: {"url" : "/admin/category"},
    columns: [
        {data: 0, width: '10px', orderable: false},{data: 1,  visible: false},{data: 2},{data: 3},
				{data: 4, className: 'dt-center', orderable: false}
    ],
});
// Showing add product Form
$('#categoryform')[0].reset();
function editForm(id){
	  $('#inputhidden').val('PATCH');
	  $('#categoryform')[0].reset();
	  $.ajax({
	    url : "/admin/category/"+id+"/edit",
	    type : "GET",
	    dataType : "JSON",
	    success : function(data){
	      $('#judulsatuan').text('@lang("admin::category.category_edit")');
	      $('#submit').val('@lang("admin::category.category_edit")');
	      $('#name').val(data.name);
        $('#note').val(data.note);
	      $('#categoryform').attr('action', 'category/'+id);
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
							url : "category/"+id,
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
