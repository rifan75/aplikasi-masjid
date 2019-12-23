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
  <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" id="judulsatuan">@lang("admin::event.event_input")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form id="eventform" action="{{ route('event-store') }}" method="post" data-toggle="validator">
          <div class="container-fluid col-md-7">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="category">@lang('admin::event.category')</label>
                  <select name="category" id="category" class="form-control">
                  @foreach($categories as $category)
                    <option value="{{$category->name}}" id="{{$category->name}}">{{$category->name}}</option>
                  @endforeach
                  </select>
                  <p style="color:red">{{ $errors->first('category') }}</p>
                </div>
                <div class="form-group col-md-9">
                  <label for="name">@lang('admin::event.name')</label>
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                  <p style="color:red">{{ $errors->first('name') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="title" class=" control-label">@lang("admin::event.title") : </label>
                <textarea id="title" cols="30" rows="1" class="form-control" name="title">{{ old('title') }}</textarea>
                  <p style="color:red">{{ $errors->first('note') }}</p>
                </div>
              </div>
              
          </div>
          <div class="container-fluid col-md-5">
            <div class="row">
              <div class="form-group col-md-7" id=datediv>
                  <label for="date">@lang('admin::event.date') : </label>
                  <div class='input-group date'>
                      <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                      <input type='text' class="form-control"  name="date" id="date" value="{{ old('date') }}"/>
                  </div>
                  <p style="color:red">{{ $errors->first('date') }}</p>
              </div>
              <div class="form-group col-md-5">
                <label for="from">@lang('admin::event.from') : </label>
                <div class='input-group date'>
                  <div class="input-group-addon"><span class="glyphicon glyphicon-time"></span></div>
                    <input type='text' class="form-control"  name="from" id="from" value="{{ old('from') }}" required/>
                  
                </div>
                <p style="color:red">{{ $errors->first('from') }}</p>
                <label for="from">@lang('admin::event.untill') : </label>
                <div class='input-group date'>
                  <div class="input-group-addon"><span class="glyphicon glyphicon-time"></span></div>
                    <input type='text' class="form-control"  name="untill" id="untill" value="{{ old('untill') }}" required/>
                </div>   
                <p style="color:red">{{ $errors->first('untill') }}</p>
              </div>
            </div>
          </div>
          <div class="form-group col-md-12" ></div>
                <div class="form-group col-md-6" style="text-align:left">
                  <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="@lang('admin::event.event_add')">
                </div>
            
        </div>
        </form>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.row -->
 </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">@lang("admin::event.event_list")</h3>
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
              <th style="text-align:center">@lang("admin::event.category")</th>
              <th style="text-align:center">@lang("admin::event.title")</th>
              <th style="text-align:center">@lang("admin::event.status")</th>
              <th style="text-align:center">@lang("admin::event.time")</th>
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
  <!-- /.row -->
 </div>
</section>
    <!-- /.content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{asset('js/admin/bootstrap-datetimepicker.js')}}" ></script>
<script type="text/javascript">
var table = $('#eventtable').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: true,
    scrollX: true,
    ajax: {"url" : "/admin/event"},
    columns: [
        {data: 0, width: '10px', orderable: false},{data: 'id',  visible: false},{data: 'name'},
        {data: 'category'},{data: 'title'},{data: 'status'},{data: 'date'},
				{data: 'action', className: 'dt-center', orderable: false}
    ],
});


$('#date').datetimepicker({
          format: 'DD MMMM YYYY'
  });

$('#from').datetimepicker({
          format: 'HH:mm'
});

$('#untill').datetimepicker({
          format: 'HH:mm'
});

function editForm(id){
	  $('#inputhidden').val('PATCH');
	  $('#eventform')[0].reset();
	  $.ajax({
	    url : "/admin/event/"+id+"/edit",
	    type : "GET",
	    dataType : "JSON",
	    success : function(data){
	      $('#judulsatuan').text('@lang("admin::event.event_edit")');
        $('#submit').val('@lang("admin::event.event_edit")');
        $('#category option[value= "'+data.category+'"]').prop("selected",true);
        $('#name').val(data.name);
        $('#date').val(data.date);
        $('#title').val(data.title);
        $('#from').val(data.from);
        $('#untill').val(data.untill);
	      $('#eventform').attr('action', '/admin/event/'+id);
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
      type: "warning",
			showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: "@lang('admin::ajax.yes_delete')"
		}).then((result) => {
			if (result.value) {
						$.ajax({
							url : "/admin/event/"+id,
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
