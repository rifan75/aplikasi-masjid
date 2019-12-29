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
          <h3 class="box-title" id="judulsatuan">@lang("admin::lecture.lecture_input")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form id="lectureform" action="{{ route('lecture-store') }}" method="post" data-toggle="validator">
          <div class="container-fluid col-md-6">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="category">@lang('admin::lecture.category')</label>
                  <select name="category" id="category" class="form-control">
                  @foreach($categories as $category)
                    <option value="{{$category->name}}" id="{{$category->name}}">{{$category->name}}</option>
                  @endforeach
                  </select>
                  <p style="color:red">{{ $errors->first('category') }}</p>
                </div>
                <div class="form-group col-md-9">
                  <label for="scholar">@lang('admin::lecture.scholar')</label>
                  <select name="scholar" id="scholar" class="form-control">
                  @foreach($scholars as $scholar)
                    <option value="{{$scholar->name}}" id="{{$scholar->name}}">{{$scholar->name}}</option>
                  @endforeach
                  </select>
                  <p style="color:red">{{ $errors->first('scholar') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="title" class=" control-label">@lang("admin::lecture.title") : </label>
                <textarea id="title" cols="30" rows="1" class="form-control" name="title">{{ old('title') }}</textarea>
                  <p style="color:red">{{ $errors->first('note') }}</p>
                </div>
              </div>
              
          </div>
          <div class="container-fluid col-md-6">
            <div class="row">
              <div class="form-group col-md-3" id="radiotype">
                <label for="radio" class=" control-label">@lang("admin::lecture.type") </label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type" id="type1" value="1" checked="checked">
                  <label class="form-check-label" for="type1">Rutin</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type" id="type0" value="0">
                  <label class="form-check-label" for="type0">Non Rutin</label>
                </div>
              </div>
              <div class="form-group col-md-6" id=daydiv>
								<label for="day">@lang('admin::lecture.day')</label>
								<select name="day" id="day" class="form-control">
									<option value="Saturday" id="Saturday">@lang("admin::lecture.saturday")</option>
                  <option value="Monday" id="Monday">@lang("admin::lecture.monday")</option>
                  <option value="Sunday" id="Sunday">@lang("admin::lecture.sunday")</option>
                  <option value="Tuesday" id="Tuesday">@lang("admin::lecture.tuesday")</option>
                  <option value="Wednesday" id="Wednesday">@lang("admin::lecture.wednesday")</option>
                  <option value="Thursday" id="Thursday">@lang("admin::lecture.thursday")</option>
                  <option value="Friday" id="Friday">@lang("admin::lecture.friday")</option>
								</select>
								<p style="color:red">{{ $errors->first('day') }}</p>
              </div>
              <div class="form-group col-md-6" id=datediv style="display:none">
                  <label for="date">@lang('admin::lecture.date') : </label>
                  <div class='input-group date'>
                      <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                      <input type='text' class="form-control"  name="date" id="date" value="{{ old('date') }}"/>
                  </div>
                  <p style="color:red">{{ $errors->first('date') }}</p>
              </div>
              <div class="form-group col-md-3">
                <label for="from">@lang('admin::lecture.from') : </label>
                <div class='input-group date'>
                  <div class="input-group-addon"><span class="glyphicon glyphicon-time"></span></div>
                    <input type='text' class="form-control"  name="from" id="from" value="{{ old('from') }}" required/>
                  
                </div>
                <p style="color:red">{{ $errors->first('from') }}</p>
                <label for="from">@lang('admin::lecture.untill') : </label>
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
                  <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="@lang('admin::lecture.lecture_add')">
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
          <h3 class="box-title">@lang("admin::lecture.lecture_list")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
					<form method="post" id="formsatuan">
						<meta id="token" name="token" content="{{ csrf_token() }}">
          <table id="lecturetable" class="table table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Id</th>
              <th style="text-align:center">@lang("admin::lecture.scholar")</th>
              <th style="text-align:center">@lang("admin::lecture.category")</th>
              <th style="text-align:center">@lang("admin::lecture.title")</th>
              <th style="text-align:center">@lang("admin::lecture.status")</th>
              <th style="text-align:center">@lang("admin::lecture.time")</th>
              <th style="text-align:center">@lang("admin::lecture.action")</th>
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
var table = $('#lecturetable').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: true,
    scrollX: true,
    ajax: {"url" : "/admin/lecture"},
    columns: [
        {data: 0, width: '10px', orderable: false},{data: 'id',  visible: false},{data: 'scholar'},
        {data: 'category'},{data: 'title'},{data: 'status'},{data: 'time'},
				{data: 'action', className: 'dt-center', orderable: false}
    ],
});

$(document).ready(function(){
  $('input[type="radio"]').click(function(){ 
            if($('#type1').is(':checked')) { 
              $("#daydiv").show();
              $("#datediv").hide();
            }
            if($('#type0').is(':checked')) { 
              $("#datediv").show();
              $("#daydiv").hide();
            }
  });
});
$('#lectureform')[0].reset();

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
	  $('#lectureform')[0].reset();
	  $.ajax({
	    url : "/admin/lecture/"+id+"/edit",
	    type : "GET",
	    dataType : "JSON",
	    success : function(data){
	      $('#judulsatuan').text('@lang("admin::lecture.lecture_edit")');
        $('#submit').val('@lang("admin::lecture.lecture_edit")');
        $('#category option[value= "'+data.category+'"]').prop("selected",true);
        $('#scholar option[value= "'+data.scholar+'"]').prop("selected",true);
        $('#title').val(data.title);
        if(data.type=='1'){
          $('#type0').prop('checked',false);
          $('#type1').prop('checked',true);
          $("#daydiv").show();
          $("#datediv").hide();
          $('#day option[value= "'+data.day+'"]').prop("selected",true);
        }else{
          $('#type0').prop('checked',true);
          $('#type1').prop('checked',false);
          $("#datediv").show();
          $("#daydiv").hide();
          $('#date').val(data.date);
        }
        $('#from').val(data.from);
        $('#untill').val(data.untill);
	      $('#lectureform').attr('action', '/admin/lecture/'+id);
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
							url : "/admin/lecture/"+id,
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
        url : "/admin/activatelecture/"+id+"/"+act,
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
