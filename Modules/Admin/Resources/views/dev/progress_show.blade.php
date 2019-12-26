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
                <a href="{{route('detailevent-admin')}}" id="createbutton" type="button" class=" btn-sm btn-primary" style="margin-bottom:5px">@lang("admin::event.detailevent_back")</a><br><br>
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