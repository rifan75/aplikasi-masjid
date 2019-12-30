@extends('frontend::layouts.app-frontend1')

@section('main-content')
<section class="banner-bottom-w3ls py-md-5 py-4">
    <div class="container">
        <div class="inner-sec-wthreelayouts py-md-5 py-4">
        <div style ="text-align:center">  
            <img src="{{asset('images/article_head1.png')}}" style="width:60%;height:100px">
        </div>
            <div class="row">
                <div class="col-md-9">
                <h3 style="text-align:center">Kegiatan Masjid</h3><br>
                @if($detailevent==null)
                <h1>Kegiatan Belum di Input</h1>
                @else
                <h1>{{$detailevent->event->name}}</h1><br>
                <b>{{$detailevent->event->date}} || Jam : {{$detailevent->event->from}} s.d. {{$detailevent->event->untill}}</b><br>
                @lang("admin::event.title") :<b>{{$detailevent->event->title}}</b><br>
                    
                <br><br>
                
                <div class="row justify-content-center">
                @foreach($detailevent->attachments as $image)
                    <a href="{{$image->getFullUrl()}}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                        <img src="{{$image->getFullUrl()}}" class="img-fluid">
                    </a>
                @endforeach
                </div>
                @endif
                </div>
                <div class="col-md-3">
                    <table id="eventtable" class="table table-hover">
                        <thead style="vertical-align:middle">
                        <tr>
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


var table1 = $('#eventtable').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: false,
    pageLength: 10,
    pagingType: "simple",
    ajax: {"url" : "/event"},
    columns: [
        {data: 0,visible: false},{data: 'content'}
    ],
});

</script>

@stop