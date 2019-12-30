@extends('frontend::layouts.app-frontend1')
@section('header_styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet" />
@stop
@section('main-content')
<section class="banner-bottom-w3ls py-4" style="padding-top:5rem!important">
    <div class="container">
        <div class="inner-sec-wthreelayouts py-4" style="padding-top:3rem!important">
        <input id="id" type='hidden' name='id' value='0'>
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10" style="color:black">
                <a href="{{route('development-admin')}}" id="createbutton" type="button" class=" btn-sm btn-primary" style="margin-bottom:5px">@lang("admin::dev.dev_back")</a><br><br>
                <h3>{{$dev->name}}</h3><br>
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
                </div>
                <div class="col-md-1">
                </div>
        </div>
    </div>
</section>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
@stop