@extends('admin::layouts.app')

{{-- page level styles --}}
@section('header_styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<style>
.box-header {background-color: #222d32;}
.box-title {float: left;display: inline-block;font-size: 18px;line-height: 18px;font-weight: 400;margin: 0;
	          padding: 0;margin-bottom: 8px;color: #fff
          }
.note-group-select-from-files {
  display: none;
}
</style>
@stop

@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" id="judulsatuan">@lang("admin::article.article_edit")</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container-fluid add-product">
          <form id="articleform" enctype="multipart/form-data" action="{{ route('article-update',['id'=>$article->id]) }}" method="post" data-toggle="validator">
              {{csrf_field()}}
              <input id="inputhidden" type='hidden' name='_method' value='PATCH'>
              <div class="row">
              <div class="form-group col-md-5">
                  <label for="category">@lang('admin::lecture.category')</label>
                  <select name="category" id="category" class="form-control">
                  @foreach($categories as $category)
                    <option value="{{$category->name}}" id="{{$category->name}}" {{$article->category==$category->name?'selected':''}}>{{$category->name}}</option>
                  @endforeach
                  </select>
                  <p style="color:red">{{ $errors->first('category') }}</p>
                </div>
                <div class="form-group col-md-7" id="imagediv1" style="text-align:right">
                  <p style="text-align:left">Size Max : 1 MB<p>
                  <img id="img_1" src="{{$article->getFirstMediaUrl('article_head')==null ? asset('images/article_head1.png') : $article->getFirstMediaUrl('article_head')}}" style="margin-right:10px" width="100%">
                  <br><br>
                  <input type="file" name="img_article_1" id="img_article_1"><br>
                  <p style="color:red">{{ $errors->first('img_article_1') }}</p>
                </div>
              </div>
              <div class="row">
              <div class="form-group col-md-12">
							<label for="title" class=" control-label">@lang('admin::article.title')</label>
							<input id="title" type="text" class="form-control" name="title" value="{{ $article->title }}">
							<p style="color:red">{{ $errors->first('title') }}</p>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-md-12">
              <label for="slug" class=" control-label">@lang('admin::article.slug')</label>
              <div class="row">
              <div class="col-md-9">
							<input id="slug" type="text" class="form-control" name="slug" value="{{ $article->slug }}">
              </div>
              <div class="col-md-3">
              <a href="#datediv" onclick="convertToSlug()" class="btn btn-success"role="button">Generate Slug</a>
              </div>
              </div>
              <p style="color:red">{{ $errors->first('slug') }}</p>
              </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                <label for="content" class=" control-label">@lang("admin::article.content") </label>
                <textarea id="content" cols="30" rows="30" class="form-control" name="content">{{ $article->content }}</textarea>
                  <p style="color:red">{{ $errors->first('content') }}</p>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="@lang('admin::article.article_edit')">
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script type="text/javascript">
$('#content').summernote({height: 350});
function readURL1(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      $('#img_1').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);

              }
          }
$('#img_article_1').change(function(){
    readURL1(this);
});
function convertToSlug()
{
    var text = $('#title').val();
    var slug = text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');  
    $('#slug').val(slug); 
}
</script>
@include('flash')
@stop
