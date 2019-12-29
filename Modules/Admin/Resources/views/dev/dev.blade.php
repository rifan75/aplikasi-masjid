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
<section class="content">
  <div class="row">
    <div class="col-md-12">
    <a href="{{route('development-create')}}" id="createbutton" type="button" class=" btn btn-primary" style="margin-bottom:5px">@lang("admin::dev.dev_description_input")</a>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">@lang("admin::dev.dev_list")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
					<form method="post" id="formsatuan">
						<meta id="token" name="token" content="{{ csrf_token() }}">
          <table id="devtable" class="table table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Id</th>
              <th style="text-align:center">@lang("admin::dev.name")</th>
              <th style="text-align:center">@lang("admin::dev.description")</th>
              <th style="text-align:center">@lang("admin::dev.account")</th>
              <th style="text-align:center">@lang("admin::dev.slug")</th>
              <th style="text-align:center">@lang("admin::dev.status")</th>
              <th style="text-align:center">@lang("admin::dev.preview")</th>
              <th style="text-align:center">@lang("admin::dev.action")</th>
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
  <!-- /.row -->
 </div>
</section>
    <!-- /.content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript">
var table = $('#devtable').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: true,
    scrollX: true,
    lengthChange: false,
    ajax: {"url" : "/admin/development"},
    columns: [
        {data: 0, width: '10px', orderable: false, className: 'dt-center'},{data: 'id',  visible: false},
		{data: 'name'},{data: 'description'},{data: 'account'},{data: 'slug'},{data: 'status', className: 'dt-center'},{data: 'preview', className: 'dt-center'},
		{data: 'action', className: 'dt-center', orderable: false}
    ],
});
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
						url : "/admin/development/"+id,
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
        url : "/admin/activatedev/"+id+"/"+act,
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
