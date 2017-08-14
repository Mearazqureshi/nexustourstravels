@extends('master')

@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>Package</h3>
  </div>
  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <ol class="breadcrumb">
          <li><i class="fa fa-home" aria-hidden="true"></i> Home</li>
          <li>Package</li>
          <li class="active">Edit</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
      @if(Session::get('success_msg'))
        <div class="alert alert-success" role="alert">
          <a class="alert-link" style="color:#fff;font-size:16px;font-weight: 500;">{{ Session::get('success_msg') }}</a>
        </div>
      @endif
    </div>

  <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0">
      <div class="x_panel">
          <div class="x_title">
              <h2>Edit Package Images</h2>
              <div class="clearfix"></div>
              </div>
            
          <div class="x_content">
                @if($count_package_images == 0)
                    <h4>No images found..</h4>
                @endif

                @foreach($package_images as $package_image) 
                    <img class="marginBottom10" height="300" width="500" src="{{ url('Packages/'.$package_image->package_id.'/'.$package_image->image) }}">

                    <a href="{{ url('admin/package-image-delete/'.$package_image->id) }}"><button class="btn btn-primary btn-delete">Delete</button></a>

                @endforeach
          </div>

          <div class="x_content">
              <form method="post" action="{{ url('admin/add-package-images') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group">

                    <input type="hidden" name="package_id" value="{{ $package_id }}">

                      <label class="col-sm-2 control-label marginBottom10">Package Images</label>
                      <div class="col-sm-10">
                          <input type="file" name="package_images[]" class="form-control marginBottom10" multiple="multiple" required autofocus>
                          @if($errors->first('package_images'))
                          <div class="alert alert-danger">
                            {{ $errors->first('package_images') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-admin margin30">Update</button> 
                    </div>

                  </div>


              </form>
          </div>

      </div>
  </div>
</div>
@endsection


@section('js')

<script>

  
</script>
@endsection