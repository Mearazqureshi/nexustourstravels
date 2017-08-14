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
          <li class="active">Create</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0">
      <div class="x_panel">
          <div class="x_title">
              <h2>Add New Package</h2>
              <div class="clearfix"></div>
              </div>
          <div class="x_content">
              <form method="post" action="{{ url('admin/package/create') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Package Name</label>
                      <div class="col-sm-10">
                          <input type="text" name="name" placeholder="Package Name" value="{{ old('name') }}" class="form-control marginBottom10"  autofocus required>
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
                          <input type="text" name="no_of_days" value="{{ old('no_of_days') }}" placeholder="Number Of days" class="form-control marginBottom10"  autofocus required>
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
                          <input type="text" name="city" placeholder="City" value="{{ old('city') }}" class="form-control marginBottom10"  autofocus required>
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
                          <input type="text" name="price" placeholder="Package price" value="{{ old('price') }}" class="form-control marginBottom10"  autofocus  required>
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
                          <input type="text" name="from" placeholder="From" value="{{ old('from') }}" class="form-control marginBottom10"  autofocus  required>
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
                          <input type="text" name="to" placeholder="to" value="{{ old('to') }}" class="form-control marginBottom10"  autofocus  required>
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
                          <select name="rank" class="form-control marginBottom10">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                          </select>
                          @if($errors->first('to'))
                          <div class="alert alert-danger">
                            {{ $errors->first('to') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Main Image</label>
                      <div class="col-sm-10">
                          <input type="file" name="image" class="form-control marginBottom10"  required>
                         
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Package Images</label>
                      <div class="col-sm-10">
                          <input type="file" name="package_images[]" class="form-control marginBottom10" multiple="multiple">
                         
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Package Information</label>
                      <div class="col-sm-10">
                          <textarea class="admin-textarea form-control marginBottom10" value="{{ old('information') }}" name="information" placeholder="Information"  autofocus  required></textarea>    
                      </div>

                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-admin margin30">Add Package</button>
                    </div>
                  </div>

              </form>
          </div>
      </div>
  </div>
</div>


@endsection