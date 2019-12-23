@extends('frontend::layouts.app-frontend1')

@section('main-content')
<section class="banner-bottom-w3ls py-4" style="padding-top:5rem!important">
    <div class="container">
        <div class="inner-sec-wthreelayouts py-4" style="padding-top:1rem!important">
        <div style ="text-align:center">  
            <img src="{{asset('images/article_head1.png')}}" style="width:60%;height:100px">
        </div>
        <input id="month" type='hidden' name='month' value='0'>
        <input id="year" type='hidden' name='year' value='0'>
            <div class="row">
                <div class="col-md-9" style="color:black">
                <table id="articletable" class="table table-hover">
                        <thead style="vertical-align:middle">
                        <tr>
                        <th></th>
                            <th style="text-align:center">Article</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                <h5 class="tag text-left mb-3">Jadwal Sholat</h5>
                <div class="wsholat"><script type="text/javascript" src="https://www.muslimpro.com/muslimprowidget.js?cityid=1627459&language=id&timeformat=24" async></script> </div>
                <div class="archive mt-5">
                    <h5>Archive :</h5>

                    @foreach($archive as $year => $months)
                        <div id="archive">
                            <div id="heading_{{ $loop->index }}">
                                <h6 class="mb-0">
                                    <button class="btn btn-link py-0 my-0" data-toggle="collapse"
                                            data-target="#collapse_{{ $loop->index }}"
                                            aria-expanded="true"
                                            aria-controls="collapse_{{ $loop->index }}"
                                            style="color:black">
                                        > {{ $year }}
                                    </button>
                                    
                                </h6>
                            </div>

                            <div id="collapse_{{ $loop->index }}" class="collapse" aria-labelledby="heading_{{ $loop->index }}"
                                data-parent="#accordion">
                                <div>
                                    <ul style="list-style-type: square;margin-left:30px">
                                        @foreach($months as $month => $posts)
                                            <li class="">
                                            <a href="#" onclick="loadArticle({{$year}},'{{$month}}')" id="clickarticlerow" style="color:black">
                                            {{ $month }} ( {{ count($posts) }} )
                                            </a>
                                            </li>

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
var month = $('#month').val();
var year = $('#year').val();
var table2 = $('#articletable').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: false,
    pageLength: 10,
    pagingType: "simple",
    ajax:   {   "url" : "/showshortarticle/"+month+"/"+year},
    
    columns: [
        {data: 'no',visible: false}, {data: 'content'}
    ],
});

function loadArticle(year,month){
    $('#articletable').DataTable().ajax.url("/showshortarticle/"+month+"/"+year).load();
}
</script>

@stop