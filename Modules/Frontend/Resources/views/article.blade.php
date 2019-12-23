@extends('frontend::layouts.app-frontend1')

@section('main-content')
<section class="banner-bottom-w3ls py-4" style="padding-top:5rem!important">
    <div class="container">
        <div class="inner-sec-wthreelayouts py-4" style="padding-top:3rem!important">
        <input id="id" type='hidden' name='id' value='0'>
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10" style="color:black">
                <h1>{{$article->title}}</h1><br>
                    <b>{{$article->user}}</b><br>
                    <b>{{$article->date}} || {{$article->hijr}}</b><br>
                    <br>
                    <div class="row">
                        <div class="col-md-12" style="text-align:right">
                            <img src="{{$article->getFirstMediaUrl('article_head')==null ? asset('images/article_head1.png') : $article->getFirstMediaUrl('img_1')}}" style="width:50%;">
                        </div>
                    </div>
                    <br>
                    <div style="color:black">
                    {{$article->content}}
                    </div>
                </div>
                <div class="col-md-1">
                </div>
            <div><br>
            <b>Article Yg Lain :</b>
                <div class="row">
                @foreach($articlerandoms as $articlerandom)
                    <div class="col-lg-4 about-in middle-grid-info">
                        <div class="card">
                            <div class="card-body">
                                <a href="/article/{{$articlerandom->slug}}" style="color:black">
                                    <b>{{$articlerandom->user}}</b><br>
                                    {{$articlerandom->title}}<br>
                                    
                                </a>
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
</script>

@stop