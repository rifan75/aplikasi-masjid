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
    <div class="col-md-5">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">@lang("admin::event.detailevent_list")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
					<form method="post" id="formsatuan">
						<meta id="token" name="token" content="{{ csrf_token() }}">
          <table id="eventtable" class="table table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Id</th>
              <th style="text-align:center">@lang("admin::event.name")</th>
              <th style="text-align:center">@lang("admin::event.preview")</th>
              <th style="text-align:center">@lang("admin::event.action")</th>
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
    <div class="col-md-7">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" id="judulsatuan">@lang("admin::event.detailevent_input")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container-fluid add-product">
          <form id="eventform" action="{{ route('detailevent-store') }}" method="post" data-toggle="validator">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="event_id" class=" control-label">@lang("admin::event.name") : </label>
                <select name="event_id" id="event_id" class="form-control">
                  @foreach($events as $event)
                    <option value="{{$event->id}}" id="{{$event->id}}">{{$event->name}}</option>
                  @endforeach
                  </select>
                  <p style="color:red">{{ $errors->first('event_id') }}</p>
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
<script type="text/javascript">
var table = $('#eventtable').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: true,
    scrollX: true,
    lengthChange: false,
    ajax: {"url" : "/admin/detailevent"},
    columns: [
        {data: 0, width: '10px', orderable: false},{data: 'id',  visible: false},{data: 'name'},{data: 'preview'},
				{data: 'action', className: 'dt-center', orderable: false}
    ],
});
// Showing add product Form
$('#eventform')[0].reset();
function editForm(id){
	  $('#inputhidden').val('PATCH');
	  $('#eventform')[0].reset();
	  $.ajax({
	    url : "/admin/event/"+id+"/edit",
	    type : "GET",
	    dataType : "JSON",
	    success : function(data){
	      $('#judulsatuan').text('@lang("admin::event.detailevent_edit")');
	      $('#submit').val('@lang("admin::event.detailevent_edit")');
	      $('#name').val(data.name);
        $('#note').val(data.note);
	      $('#eventform').attr('action', '/admin/detailevent/'+id);
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
							url : "/admin/detailevent/"+id,
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
