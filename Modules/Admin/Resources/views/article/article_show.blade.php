@extends('frontend::layouts.app-frontend1')
{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.25.6/sweetalert2.min.css">
@stop
@section('main-content')
<section class="banner-bottom-w3ls py-4" style="padding-top:5rem!important" id="article-content">
    <div class="container">
        <div class="inner-sec-wthreelayouts py-4" style="padding-top:3rem!important">
        <input id="id" type='hidden' name='id' value='0'>
            <div class="row">
                <div class="col-md-3" id="agree">
                {!!$article->published?'<h3>Published</h3>':'<h3>Unpublish</h3>'!!}
                <br>
                @if($article->user_id != Auth::user()->id && !$article->agree->contains('user_id',Auth::user()->id))
                <a href="#" onclick="publishArt('1');" id="createpublishbutton" type="button" class=" btn-sm btn-success" style="margin-bottom:5px">Publish</a>
                <a href="#" onclick="publishArt('0');" id="createnopublishbutton" type="button" class=" btn-sm btn-danger" style="margin-bottom:5px">No Publish</a><br><br>
                @endif
                Yg Menyetujui :<br>
                @foreach($article->agree as $agree)
                    @if($agree->agree==true)
                    <li>
                    {{$agree->user->name}} <br> {{$agree->date}}
                    {!! $agree->user_id==Auth::user()->id?"<a href='#' onclick='editArt(\"".$agree->id."\",\"".$article->id."\")'><i class='fa fa-check' title='edit'></i></a>":"" !!}
                    </li>
                    @endif
                    <li>--</li>
                @endforeach
                <br>
                Yg Tidak Menyetujui :
                @foreach($article->agree as $agree)
                    @if($agree->agree==false)
                    <li>
                    {{$agree->user->name}} <br> {{$agree->date}}
                    {!! $agree->user_id==Auth::user()->id?"<a href='#' onclick='editArt(\"".$agree->id."\",\"".$article->id."\")'><i class='fa fa-ban' title='edit'></i></a>":"" !!}
                    </li>
                    @endif
                    <li>--</li>
                @endforeach
                </div>
                <div class="col-md-9" style="color:black">
                <a href="{{route('article-admin')}}" id="createbutton" type="button" class=" btn-sm btn-primary" style="margin-bottom:5px">@lang("admin::article.article_back")</a><br><br>
                <h1>{{$article->title}}</h1><br>
                    <b>{{$article->user->name}}</b><br>
                    <b>{{$article->date}} || {{$article->hijr}}</b><br>
                    <br>
                    <div class="row">
                        <div class="col-md-12" style="text-align:right">
                            <img src="{{$article->getFirstMediaUrl('article_head')==null ? asset('images/article_head1.png') : $article->getFirstMediaUrl('article_head')}}" style="width:50%;">
                        </div>
                    </div>
                    <br>
                    <div style="color:black">
                    {!!$article->content!!}
                    </div>
                </div>
            <div><br>
            <b>Article Yg Lain :</b>
                <div class="row">
                @foreach($articlerandoms as $articlerandom)
                    <div class="col-lg-4 about-in middle-grid-info">
                        <div class="card">
                            <div class="card-body">
                                <a href="/article/{{$articlerandom->slug}}" style="color:black">
                                    <b>{{$articlerandom->user->name}}</b><br>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.25.6/sweetalert2.min.js"></script>
<script type="text/javascript">
var $=jQuery.noConflict();
function publishArt(publish) {
  swal({
    title: "@lang('admin::ajax.are_you_sure')",
    text: "@lang('admin::ajax.this_will_change_publish_mode')",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "@lang('admin::ajax.yes_i_am_sure')"
  }).then((result) => {
		if (result.value) {
      $.ajax({
        url : "/admin/articleagree/",
        type : "POST",
        data:   {
                    _method: 'POST',
                    _token: "{{ csrf_token() }}",
                    article_id: '{{$article->id}}',
                    agree: publish,
                },
        success : function(data){
        location.reload();
        swal("@lang('admin::ajax.success')","@lang('admin::ajax.publish_mode_is_changed')","success");
      },
        error : function(data) {
        swal("@lang('admin::ajax.error')","@lang('admin::ajax.ops_something_wrong')","error");
      }
      });
		}
  });
}
function editArt(id,artId) {
  swal({
    title: "@lang('admin::ajax.are_you_sure')",
    text: "@lang('admin::ajax.this_will_change_agreement')",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "@lang('admin::ajax.yes_i_am_sure')"
  }).then((result) => {
		if (result.value) {
      $.ajax({
        url : "/admin/articleagree/"+id+"/"+artId,
        type : "PATCH",
        data:   {
                    _method: 'UPDATE',
                    _token: "{{ csrf_token() }}",
                },
        success : function(data){
        location.reload();
        swal("@lang('admin::ajax.success')","@lang('admin::ajax.publish_mode_is_changed')","info");
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