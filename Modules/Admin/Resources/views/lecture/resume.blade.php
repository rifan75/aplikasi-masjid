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
    <a href="{{route('resume-create')}}" id="createbutton" type="button" class=" btn btn-primary" style="margin-bottom:5px">@lang("admin::resume.resume_add")</a>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">@lang("admin::resume.resume_list")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
					<form method="post" id="formsatuan">
						<meta id="token" name="token" content="{{ csrf_token() }}">
          <table id="resumetable" class="table table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Id</th>
              <th style="text-align:center">@lang("admin::resume.writer")</th>
              <th style="text-align:center">@lang("admin::resume.scholar")</th>
              <th style="text-align:center">@lang("admin::resume.title")</th>
              <th style="text-align:center">@lang("admin::resume.date")</th>
              <th style="text-align:center">@lang("admin::resume.published")</th>
              <th style="text-align:center">@lang("admin::resume.video")</th>
              <th style="text-align:center">@lang("admin::resume.slug")</th>
              <th style="text-align:center">@lang("admin::resume.preview")</th>
              <th style="text-align:center">@lang("admin::resume.action")</th>
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
 </div>
</section>
    <!-- /.content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript">
var table = $('#resumetable').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: true,
    scrollX: true,
    dom: 'Bfrtip',
    buttons: ['csv', 'excel', 'pdf', 'print'],
    ajax: {"url" : "/admin/resume"},
    columns: [
        {data: 0, width: '10px', orderable: false},{data: 'id',  visible: false},
        {data: 'writer'},{data: 'scholar'},{data: 'title'},{data: 'date'},{data: 'published', className: 'dt-center'},{data: 'video'},
				{data: 'slug'},{data: 'preview'},{data: 'action', className: 'dt-center', orderable: false}
    ],
});

function editForm(id){
	  $('#inputhidden').val('PATCH');
	  $('#resumeform')[0].reset();
	  $.ajax({
	    url : "/admin/resume/"+id+"/edit",
	    type : "GET",
	    dataType : "JSON",
	    success : function(data){
	      $('#judulsatuan').text('@lang("admin::resume.resume_edit")');
	      $('#submit').val('@lang("admin::resume.resume_edit")');
	      $('#name').val(data.name);
        $('#gender option[value= "'+data.gender+'"]').prop("selected",true);
        $('#telephone').val(data.telephone);
        $('#address').val(data.address);
        $('#birth').val(data.birth);
        $('#city').val(data.city);
        $('#country').val(data.country);
        $('#note').val(data.note);
        $('#newpicture').remove();
			  $('#image_picture').append('<div class="form-group" id="newpicture">'+
	                                     '<img id="image_baru" src="'+data.full_picture_path+
																			 '" height="150" width="150"></img><br><br>'+
	 																'</div>');
	      $('#resumeform').attr('action', 'resume/'+id);
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
							url : "/admin/resume/"+id,
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
