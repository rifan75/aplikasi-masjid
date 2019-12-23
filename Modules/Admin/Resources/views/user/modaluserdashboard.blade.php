<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="container-fluid add-product">
<form id="userform" action="{{route('myuser-update',['id' => Auth::user()->id ])}}" method="post" enctype="multipart/form-data" data-toggle="validator">
{{csrf_field()}}
<input id="inputhidden" type='hidden' name='_method' value='PATCH'>
<input id="genderhidden" type='hidden' value="{{Auth::user()->profile->contact['Gender']}}">
    <div class="row">
    <div class="form-group col-md-6">
        <div class="form-group col-md-12" id="leveldiv">
            <p>Size Max : 1 MB<p>
            <img id="img_mosque" src="{{Auth::user()->getFirstMediaUrl('picture')==null ? asset('images/picture.jpg') : Auth::user()->getFirstMediaUrl('picture')}}" class="img-responsive" height="200px" width="200px">
                <br>
            <input type="file" name="picture" id="picture">
            <p style="color:red">{{ $errors->first('picture') }}</p>
        </div>
        <div class="form-group col-md-12">
            <label for="email" class=" control-label">@lang('admin::user.email')</label>
            <input id="email" type="text" class="form-control" name="email" value="{{$user->email}}">
            <p style="color:red">{{ $errors->first('email') }}</p>
        </div>
        <div class="form-group col-md-12">
            <label for="gender">@lang('admin::user.gender')</label>
            <select name="gender" id="gender" class="form-control">
                <option value="Laki-laki" id="laki">Laki-laki</option>
                <option value="Perempuan" id="perempuan">Perempuan</option>
                <p style="color:red">{{ $errors->first('gender') }}</p>
            </select>
        </div>
    </div>
    <div class="form-group col-md-6">

    <div class="form-group col-md-12">
            <label for="name" class=" control-label">@lang('admin::user.name')</label>
            <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}">
            <p style="color:red">{{ $errors->first('name') }}</p>
        </div>

    <div class="form-group col-md-12">
        <label for="telephone" class=" control-label">@lang('admin::user.telephone')</label>
        <input id="telephone" type="text" class="form-control" name="telephone" value="{{Auth::user()->profile->contact['Telephone']}}">
        <p style="color:red">{{ $errors->first('telephone') }}</p>
    </div>
    <div class="form-group col-md-12">
                <label for="address" class=" control-label">@lang('admin::user.address')</label>
                <textarea id="address"  cols="30" rows="2" class="form-control" name="address">{{Auth::user()->profile->contact['Address']}}</textarea>
                <p style="color:red">{{ $errors->first('address') }}</p>
            </div>
            <div class="form-group col-md-12">
                <label for="city" class=" control-label">@lang('admin::user.city')</label>
                <input id="city" type="text" class="form-control" name="city" value="{{Auth::user()->profile->contact['City']}}">
                <p style="color:red">{{ $errors->first('city') }}</p>
            </div>
            <div class="form-group col-md-12">
                <label for="country" class=" control-label">@lang('admin::user.country')</label>
                <input id="country" type="text" class="form-control" name="country" value="{{Auth::user()->profile->contact['Country']}}">
                <p style="color:red">{{ $errors->first('country') }}</p>
            </div>
             
                </div>
                </div>
    <div class="row">
    <div class="form-group col-md-12">
    <input id="submit" type="submit" class="form-control btn btn-primary" value="@lang('admin::user.edit_user')">
    </div>
    </div>
</form>
</div>
      </div>
    </div>
  </div>
</div>