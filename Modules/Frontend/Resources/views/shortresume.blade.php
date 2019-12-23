@extends('frontend::layouts.app-frontend1')

@section('main-content')
<section class="banner-bottom-w3ls py-md-5 py-4">
    <div class="container">
        <div class="inner-sec-wthreelayouts py-md-5 py-4">
        <div style ="text-align:center">  
            <img src="{{asset('images/article_head1.png')}}" style="width:60%;height:100px">
        </div>
        <input id="id" type='hidden' name='id' value='0'>
            <div class="row">
                <div class="col-md-8">
                    <table id="resumetable" class="table table-hover">
                        <thead style="vertical-align:middle">
                        <tr>
                        <th></th>
                            <th style="text-align:center">Kajian</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <table id="lecturetable" class="table table-hover">
                        <thead style="vertical-align:middle">
                        <tr>
                        <th></th>
                        <th></th>
                            <th style="text-align:center">Jadwal</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript">
var $=jQuery.noConflict();


var table1 = $('#lecturetable').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: false,
    pageLength: 10,
    pagingType: "simple",
    ajax: {"url" : "/lecture"},
    columns: [
        {data: 'no',visible: false},{data: 'id',visible: false},{data: 'lecture'}
    ],
});

var id = $('#id').val();
var table2 = $('#resumetable').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: false,
    pageLength: 10,
    pagingType: "simple",
    ajax:   {   "url" : "/showshortresume/"+id},
    
    columns: [
        {data: 'no',visible: false}, {data: 'content'}
    ],
});
$('#lecturetable tbody').on( 'click', '#clickresumerow', function () {
    var id = table1.row($(this).closest('tr')).data()['id'];
    $('#resumetable').DataTable().ajax.url("/showshortresume/"+id).load();
} );
</script>

@stop