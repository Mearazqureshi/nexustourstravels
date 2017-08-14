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
  <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0">
      <div class="x_panel">
          <div class="x_title">
              <h2>Edit Package</h2>
              <div class="clearfix"></div>
              </div>
          <div class="x_content">
              <form method="post" action="{{ url('admin/package/update') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group">

                      <input type="hidden" name="id" value="{{ $package->id }}">

                      <label class="col-sm-2 control-label marginBottom10">Package Name</label>
                      <div class="col-sm-10">
                          <input type="text" name="name" placeholder="Package Name" value="{{ $package->name }}" class="form-control marginBottom10"  required autofocus>
                          @if($errors->first('name'))
                          <div class="alert alert-danger">
                            {{ $errors->first('name') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Number Of Days</label>
                      <div class="col-sm-10">
                          <input type="text" name="no_of_days" value="{{ $package->no_of_days }}" placeholder="Number Of days" class="form-control marginBottom10"  required autofocus>
                          @if($errors->first('no_of_days'))
                          <div class="alert alert-danger">
                            {{ $errors->first('no_of_days') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">City</label>
                      <div class="col-sm-10">
                          <input type="text" name="city" placeholder="City" value="{{ $package->city }}" class="form-control marginBottom10"  required autofocus>
                          @if($errors->first('city'))
                          <div class="alert alert-danger">
                            {{ $errors->first('city') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Price</label>
                      <div class="col-sm-10">
                          <input type="text" name="price" placeholder="Package price" value="{{ $package->price }}" class="form-control marginBottom10"  required autofocus>
                          @if($errors->first('price'))
                          <div class="alert alert-danger">
                            {{ $errors->first('price') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">From</label>
                      <div class="col-sm-10">
                          <input type="text" name="from" value="{{ $package->from }}" class="form-control marginBottom10"  required autofocus>
                          @if($errors->first('from'))
                          <div class="alert alert-danger">
                            {{ $errors->first('from') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">To</label>
                      <div class="col-sm-10">
                          <input type="text" name="to" value="{{ $package->to }}" class="form-control marginBottom10" required autofocus>
                          @if($errors->first('to'))
                          <div class="alert alert-danger">
                            {{ $errors->first('to') }}
                          </div>
                          @endif
                      </div>

                  </div>


                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Rank</label>
                      <div class="col-sm-10">
                          <select class="form-control marginBottom10" name="rank">
                              <option value="0"  @if($package->rank == "0" )
                                                      {{ "selected" }}
                                                  @endif>0</option>
                              <option value="1" @if($package->rank == "1" )
                                                          {{ "selected" }}
                                                      @endif>1</option>
                              <option value="2"  @if($package->rank == "2" )
                                                      {{ "selected" }}
                                                  @endif>2</option>
                              <option value="3" @if($package->rank == "3" )
                                                          {{ "selected" }}
                                                      @endif>3</option>
                              <option value="4"  @if($package->rank == "4" )
                                                      {{ "selected" }}
                                                  @endif>4</option>
                              <option value="5" @if($package->rank == "5" )
                                                          {{ "selected" }}
                                                      @endif>5</option>
                              <option value="6"  @if($package->rank == "6" )
                                                      {{ "selected" }}
                                                  @endif>6</option>
                              <option value="7" @if($package->rank == "7" )
                                                          {{ "selected" }}
                                                      @endif>7</option>
                              <option value="8"  @if($package->rank == "8" )
                                                      {{ "selected" }}
                                                  @endif>8</option>
                              <option value="9" @if($package->rank == "9" )
                                                          {{ "selected" }}
                                                      @endif>9</option>
                              <option value="10"  @if($package->rank == "10" )
                                                      {{ "selected" }}
                                                  @endif>10</option>


                          </select>

                          @if($errors->first('rank'))
                          <div class="alert alert-danger">
                            {{ $errors->first('rank') }}
                          </div>
                          @endif
                      </div>

                  </div>


                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Main Image</label>
                      <div class="col-sm-10">
                          <img class="marginBottom10" src="{{ url('Packages/'.$package->image) }}" height="200" width="500">
                          <input type="file" name="image" class="form-control marginBottom10">
                         
                      </div>

                  </div>

                  <!-- <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Package Images</label>
                      <div class="col-sm-10">
                          <input type="file" name="package_images[]" class="form-control marginBottom10" multiple="multiple">
                         
                      </div>

                  </div> -->

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Package Information</label>
                      <div class="col-sm-10">
                          <textarea class="admin-textarea form-control marginBottom10" name="information" placeholder="Information"  required autofocus>{{ $package->information }}</textarea>    
                      </div>

                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-admin margin30">Update Package</button>
                      <a class="link" href="{{ url('admin/edit-package-images',$package->id) }}">Edit Package Images</a>
                  
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