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
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">@lang("admin::dev.finance")</h3>
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
              <th style="text-align:center">@lang("admin::dev.status")</th>
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
    ajax: {"url" : "/admin/finde"},
    columns: [
        {data: 0, width: '10px', orderable: false, className: 'dt-center'},{data: 'id',  visible: false},
		{data: 'name'},{data: 'description'},{data: 'account'},{data: 'status', className: 'dt-center'},
		{data: 'action', className: 'dt-center', orderable: false}
    ],
});
</script>
@include('flash')
@stop
