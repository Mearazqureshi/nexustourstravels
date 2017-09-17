@extends('master')

@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>Vehicle</h3>
  </div>
  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <ol class="breadcrumb">
          <li><i class="fa fa-home" aria-hidden="true"></i> Home</li>
          <li>Vehicle</li>
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
              <h2>Add New Vehicle</h2>
              <div class="clearfix"></div>
              </div>
          <div class="x_content">
              <form method="post" action="{{ url('admin/vehicles/create') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Vehicle Name</label>
                      <div class="col-sm-10">
                          <input type="text" name="name" placeholder="Vehicle Name" value="{{ old('name') }}" class="form-control marginBottom10"  autofocus>
                          @if($errors->first('name'))
                          <div class="alert alert-danger">
                            {{ $errors->first('name') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Vehicle Type</label>
                      <div class="col-sm-10">
                          <select name="type" class="form-control marginBottom10">
                              <option value="AC">AC</option>
                              <option value="None-AC">None-AC</option>
                          </select>
                          @if($errors->first('type'))
                          <div class="alert alert-danger">
                            {{ $errors->first('type') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Number of seats</label>
                      <div class="col-sm-10">
                          <input type="text" name="no_of_seats" value="{{ old('no_of_seats') }}" placeholder="Number Of Seats" class="form-control marginBottom10"  autofocus>
                          @if($errors->first('no_of_seats'))
                          <div class="alert alert-danger">
                            {{ $errors->first('no_of_seats') }}
                          </div>
                          @endif
                      </div>

                  </div>

                 <!--  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Basic Rent</label>
                      <div class="col-sm-10">
                          <input type="text" name="basic_rent" placeholder="Basic Rent" value="{{ old('basic_rent') }}" class="form-control marginBottom10"  autofocus>
                          @if($errors->first('basic_rent'))
                          <div class="alert alert-danger">
                            {{ $errors->first('basic_rent') }}
                          </div>
                          @endif
                      </div>

                  </div>
 -->
                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Rent per KM</label>
                      <div class="col-sm-10">
                          <input type="text" name="rent_per_km" placeholder="Rent Per KM" value="{{ old('rent_per_km') }}" class="form-control marginBottom10"  autofocus>
                          @if($errors->first('rent_per_km'))
                          <div class="alert alert-danger">
                            {{ $errors->first('rent_per_km') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Category</label>
                      <div class="col-sm-10">
                          <select name="category" class="form-control marginBottom10">
                              <option value="car">Car</option>
                              <option value="bus">Bus</option>
                          </select>
                          @if($errors->first('category'))
                          <div class="alert alert-danger">
                            {{ $errors->first('category') }}
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
                          @if($errors->first('rank'))
                          <div class="alert alert-danger">
                            {{ $errors->first('rank') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Vehicle Image</label>
                      <div class="col-sm-10">
                          <input type="file" name="image" class="form-control marginBottom10">
                          @if($errors->first('image'))
                            <div class="alert alert-danger">
                              {{ $errors->first('image') }}
                            </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Vehicle Facilities</label>
                      <div class="col-sm-10">
                          <textarea class="admin-textarea form-control marginBottom10" value="{{ old('facilities') }}" name="facilities" placeholder="Facilities"  autofocus></textarea>    
                      </div>

                  </div>                  

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-admin margin30">Add Vehicle</button>
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