@extends('admin::layouts.app')

{{-- page level styles --}}
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
<section class="content">
  <div class="row">
    <div class="col-md-9">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">@lang("admin::dev.donation_journal") - {{$type}}</h3>
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
              <th style="text-align:center">@lang("admin::dev.name_donatur")</th>
              <th style="text-align:center">@lang("admin::dev.date")</th>
              <th style="text-align:center">@lang("admin::dev.total") (@lang("admin::dev.currency"))</th>
              <th style="text-align:center">@lang("admin::dev.account")</th>
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
    <div class="col-md-3">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" id="judulsatuan">@lang("admin::dev.journal_input")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container-fluid add-product">
          <form id="devform" action="/admin/donadestore" method="post" data-toggle="validator">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <input id="typehidden" type='hidden' name='type' value='{{$type}}'>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="date" class=" control-label">@lang('admin::dev.date')</label>
                  <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}" required>
                  <p style="color:red">{{ $errors->first('date') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="name" class=" control-label">@lang("admin::dev.name_donatur") : </label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                  <p style="color:red">{{ $errors->first('name') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="donations_id">@lang('admin::dev.account')  @lang("admin::dev.finance")</label>
                  <select name="donations_id" id="donations_id" class="form-control">
                  @foreach($donations as $donation)
                    <option value="{{$donation->id}}" id="{{$donation->id}}">{{$donation->name}}</option>
                  @endforeach
                  </select>
                  <p style="color:red">{{ $errors->first('donations_id') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="amount" class=" control-label">@lang("admin::dev.total") (@lang("admin::dev.currency")) </label>
                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" required>
                  <p style="color:red">{{ $errors->first('amount') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="note" class=" control-label">@lang("admin::dev.note") : </label>
                <textarea id="note" cols="30" rows="2" class="form-control" name="note">{{ old('note') }}</textarea>
                  <p style="color:red">{{ $errors->first('note') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="Submit">
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
<script type="text/javascript" src="{{asset('js/admin/bootstrap-datetimepicker.js')}}" ></script>
<script type="text/javascript">
$('#date').datetimepicker({
          format: 'DD MMMM YYYY'
});
//var type = {{$type}};
var table = $('#devtable').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: true,
    scrollX: true,
    dom: 'Bfrtip',
    buttons: ['csv', 'excel', 'pdf', 'print'],
    ajax: {"url" : "/admin/donade/{{$type}}"},
    columns: [
        {data: 0, width: '10px', orderable: false},{data: 'id',  visible: false},{data: 'name'},
        {data: 'date'},{data: 'amount', className: 'dt-right'},{data: 'account'},
				{data: 'action', className: 'dt-center', orderable: false}
    ],
});
// Showing add product Form
$('#devform')[0].reset();
function editForm(id){
	  $('#inputhidden').val('PATCH');
	  $('#devform')[0].reset();
	  $.ajax({
	    url : "/admin/donade-edit/"+id+"/edit",
	    type : "GET",
	    dataType : "JSON",
	    success : function(data){
	      $('#judulsatuan').text('@lang("admin::dev.journal_edit")');
	      $('#submit').val('Submit');
        $('#date').val(data.date);
	      $('#name').val(data.name);
        $('#donations_id option[value= "'+data.donations_id+'"]').prop("selected",true);
        $('#amount').val(data.amount);
        $('#note').val(data.note);
	      $('#devform').attr('action', '/admin/donade/'+id);
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
							url : "/admin/donade/"+id,
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
