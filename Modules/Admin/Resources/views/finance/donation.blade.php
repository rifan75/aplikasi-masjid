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
<h1>@lang("admin::donation.donation")</h1>
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active"><a href="#">@lang("admin::donation.donation")</a></li>
</ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">@lang("admin::donation.donation_list")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
					<form method="post" id="formsatuan">
						<meta id="token" name="token" content="{{ csrf_token() }}">
          <table id="donationtable" class="table table-bordered table-hover">
            <thead>
            <tr>
            <th></th>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Id</th>
              <th style="text-align:center">@lang("admin::donation.name")</th>
              <th style="text-align:center">@lang("admin::donation.form")</th>
              <th style="text-align:center">@lang("admin::donation.type")</th>
              <th style="text-align:center">@lang("admin::donation.action")</th>
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
          <h3 class="box-title" id="judulsatuan">@lang("admin::donation.donation_input")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container-fluid add-product">
          <form id="donationform" action="{{ route('donation-store') }}" method="post" data-toggle="validator">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="name" class=" control-label">@lang("admin::donation.name") : </label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                  <p style="color:red">{{ $errors->first('name') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="type">@lang('admin::donation.type')</label>
                  <select name="type" id="type" class="form-control">
                  @foreach($types as $type)
                    <option value="{{$type->name}}" id="{{$type->name}}">{{$type->name}}</option>
                  @endforeach
                  </select>
                  <p style="color:red">{{ $errors->first('type') }}</p>
                </div>
                <div class="form-group col-md-6">
                <label for="type">@lang('admin::donation.form')</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="form" id="form1" value="lock_box" checked="checked">
                  <label class="form-check-label" for="form1">@lang('admin::donation.lock_box')</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="form" id="form2" value="direct_bank">
                  <label class="form-check-label" for="form2">@lang('admin::donation.direct_bank')</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="form" id="form3" value="material">
                  <label class="form-check-label" for="form3">@lang('admin::donation.material')</label>
                </div>
                </div>
              </div>
              <div id="box">
                <div class="row">
                  <div class="form-group col-md-12">
                  <label for="incharge" class=" control-label">@lang("admin::donation.incharge") : </label>
                  <input id="incharge" type="text" class="form-control" name="incharge" value="{{ old('incharge') }}">
                    <p style="color:red">{{ $errors->first('incharge') }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                  <label for="counter" class=" control-label">@lang("admin::donation.counter") : </label>
                  <input id="counter" type="text" class="form-control" name="counter" value="{{ old('counter') }}">
                    <p style="color:red">{{ $errors->first('counter') }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                  <label for="witness1" class=" control-label">@lang("admin::donation.witness1") : </label>
                  <input id="witness1" type="text" class="form-control" name="witness1" value="{{ old('witness1') }}">
                    <p style="color:red">{{ $errors->first('witness1') }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                  <label for="witness2" class=" control-label">@lang("admin::donation.witness2") : </label>
                  <input id="witness2" type="text" class="form-control" name="witness2" value="{{ old('witness2') }}">
                    <p style="color:red">{{ $errors->first('witness2') }}</p>
                  </div>
                </div>
              </div>
              <div id="nonbox" style="display:none">
                <div class="row">
                  <div class="form-group col-md-12">
                  <label for="received" class=" control-label">@lang("admin::donation.received") : </label>
                  <textarea id="received" cols="30" rows="2" class="form-control" name="received">{{ old('received') }}</textarea>
                    <p style="color:red">{{ $errors->first('received') }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                  <label for="confirmation" class=" control-label">@lang("admin::donation.confirmation") : </label>
                  <textarea id="confirmation" cols="30" rows="2" class="form-control" name="confirmation">{{ old('confirmation') }}</textarea>
                    <p style="color:red">{{ $errors->first('confirmation') }}</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="note" class=" control-label">@lang("admin::donation.note") : </label>
                <textarea id="note" cols="30" rows="2" class="form-control" name="note">{{ old('note') }}</textarea>
                  <p style="color:red">{{ $errors->first('note') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="@lang('admin::donation.donation_add')">
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
          <td style="width:70%; vertical-align:top; text-align:left">
          @{{#if formtrue}}
          Penanggung Jawab : <b>@{{incharge}}</b><br/>
          Penghitung :<b>@{{counter}}</b><br/>
          Saksi I : <b>@{{witness1}}</b><br/>
          Saksi II : <b>@{{witness2}}</b><br/>
          @{{else}}
          Penerima :<b>@{{received}}</b><br/>
          Konfirmasi : <b>@{{confirmation}}</b><br/>
          @{{/if}}
          </td>
          <td style="width:30%">
          </td>
        </tr>
        <tr>
          <td style="width:70%">
            Catatan :<br/> <b>
            @{{note}}</b>
          </td>
          <td style="width:30%">
          </td>
        </tr>
    </table>
</script>
<script type="text/javascript">
var template = Handlebars.compile($("#details-template").html());
var table = $('#donationtable').DataTable({
    processing: true,
    serverSide: true,
    dom: 'Bfrtip',
    buttons: ['csv', 'excel', 'pdf', 'print'],
    ajax: {"url" : "/admin/donation"},
    columns: [
        {"className":'details-control',"orderable":false,"searchable":false,"data":null,"defaultContent": ''},
        {data: 0, width: '10px', orderable: false},{data: 'id',  visible: false},{data: 'name'},{data: 'form'},
        {data: 'type'},{data: 'action', className: 'dt-center', orderable: false}
    ],
});
$('#donationtable tbody').on('click', 'td.details-control', function () {
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
$(document).ready(function(){
  $('input[type="radio"]').click(function(){ 
            if($('#form1').is(':checked')) { 
              $("#box").show();
              $("#nonbox").hide();
            }else{
              $("#nonbox").show();
              $("#box").hide();
            }
  });
});
$('#donationform')[0].reset();
function editForm(id){
	  $('#inputhidden').val('PATCH');
	  $('#donationform')[0].reset();
	  $.ajax({
	    url : "/admin/donation/"+id+"/edit",
	    type : "GET",
	    dataType : "JSON",
	    success : function(data){
        console.log(data);
	      $('#judulsatuan').text('@lang("admin::donation.donation_edit")');
	      $('#submit').val('@lang("admin::donation.donation_edit")');
        $('#name').val(data.name);
        $('#type option[value= "'+data.type+'"]').prop("selected",true);
        if(data.form=="lock_box") {
          $('#form1').prop('checked',true);
          $("#box").show();
          $("#nonbox").hide();
        } else if(data.form=="direct_bank") {
          $('#form2').prop('checked',true);
          $("#box").hide();
          $("#nonbox").show();
        } else if(data.form=="material") {
          $('#form3').prop('checked',true);
          $("#box").hide();
          $("#nonbox").show();
        }
        if(data.form=="lock_box") {
          $('#incharge').val(data.incharge);
          $('#counter').val(data.counter);
          $('#witness1').val(data.witness1);
          $('#witness2').val(data.witness2);
        }else{
          $('#received').val(data.received);
          $('#confirmation').val(data.confirmation);
        }
        $('#note').val(data.note);
	      $('#donationform').attr('action', '/admin/donation/'+id);
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
							url : "/admin/donation/"+id,
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
