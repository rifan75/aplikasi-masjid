@extends('frontend::layouts.app-frontend1')

@section('main-content')
<section class="banner-bottom-w3ls py-md-5 py-4">
    <div class="container">
        <div class="inner-sec-wthreelayouts py-md-5 py-4">
        <div style ="text-align:center">  
            <img src="{{asset('images/article_head1.png')}}" style="width:60%;height:100px">
        </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                <h3 style="text-align:center">Pembangunan/Renovasi Masjid</h3><br>

                @foreach($devs as $dev)
                <a href="{{route('showdevprogress',['slug'=>$dev->slug,'date'=>'detail'])}}" id="createbutton" type="button" class=" btn-sm btn-success" style="margin-bottom:5px">Perkembangan</a>
                <a href="{{route('showdevlapkeu',['slug'=>$dev->slug])}}" id="createbutton" type="button" class=" btn-sm btn-success" style="margin-bottom:5px">Laporan Keuangan</a><br><br>
                <h3>{{$dev->name}}</h3>
                {!! $dev->description !!}
                    
                    <br><br>
                    <h4>Dokumen</h4><br>
                    <div class="row justify-content-center">
                        @foreach($dev->document as $document)
                            <a href="{{$document->getFullUrl()}}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-3">
                                <img src="{{$document->getFullUrl()}}" class="img-fluid">
                            </a>
                        @endforeach
                    </div>
                    <h4>Gambar Kerja</h4><br>
                    <div class="row justify-content-center">
                        @foreach($dev->design as $design)
                            <a href="{{$design->getFullUrl()}}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-3">
                                <img src="{{$design->getFullUrl()}}" class="img-fluid">
                            </a>
                        @endforeach
                    </div>
    
                    <br>
                @endforeach
                {{ $devs->links('frontend::paginator.pagi') }}
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