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
              <h2>Edit Vehicle</h2>
              <div class="clearfix"></div>
              </div>
          <div class="x_content">
              <form method="post" action="{{ url('admin/vehicle/update',$vehicle->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Vehicle Name</label>
                      <div class="col-sm-10">
                          <input type="text" name="name" placeholder="Vehicle Name" value="{{ $vehicle->name }}" class="form-control marginBottom10"  autofocus>
                          @if($errors->first('name'))
                          <div class="alert alert-danger">
                            {{ $errors->first('name') }}
                          </div>
                          @endif
                      </div>

                  </div>

                   <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Vehicle type</label>
                      <div class="col-sm-10">
                          <select class="form-control marginBottom10" name="type">
                              <option value="AC"  @if($vehicle->type == "AC" )
                                                      {{ "selected" }}
                                                  @endif>AC</option>
                              <option value="None-AC" @if($vehicle->type == "None-AC" )
                                                          {{ "selected" }}
                                                      @endif>None-AC</option>
                          </select>
                          @if($errors->first('type'))
                          <div class="alert alert-danger">
                            {{ $errors->first('type') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Number Of Seats</label>
                      <div class="col-sm-10">
                          <input type="text" name="no_of_seats" value="{{ $vehicle->no_of_seats }}" placeholder="Number Of seats" class="form-control marginBottom10"  autofocus>
                          @if($errors->first('no_of_seats'))
                          <div class="alert alert-danger">
                            {{ $errors->first('no_of_seats') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Basic Rent</label>
                      <div class="col-sm-10">
                          <input type="text" name="basic_rent" placeholder="Basic Rent" value="{{ $vehicle->basic_rent }}" class="form-control marginBottom10"  autofocus>
                          @if($errors->first('basic_rent'))
                          <div class="alert alert-danger">
                            {{ $errors->first('basic_rent') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Rent per KM</label>
                      <div class="col-sm-10">
                          <input type="text" name="rent_per_km" value="{{ $vehicle->rent_per_km }}" class="form-control marginBottom10"  autofocus>
                          @if($errors->first('rent_per_km'))
                          <div class="alert alert-danger">
                            {{ $errors->first('rent_per_km') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Vehicle Category</label>
                      <div class="col-sm-10">
                          <select class="form-control marginBottom10" name="category">
                              <option value="car" @if($vehicle->category == "car" )
                                                      {{ "selected" }}
                                                  @endif>Car</option>
                              <option value="bus" @if($vehicle->category == "bus" )
                                                          {{ "selected" }}
                                                      @endif>Bus</option>
                          </select>
                          @if($errors->first('category'))
                          <div class="alert alert-danger">
                            {{ $errors->first('category') }}
                          </div>
                          @endif
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Vehicle Image</label>
                      <div class="col-sm-10">
                          <img class="marginBottom10" src="{{ url('vehicles/'.$vehicle->image) }}" height="200" width="500">
                          <input type="file" name="image" class="form-control marginBottom10">
                         
                      </div>

                  </div>

                  <div class="form-group">

                      <label class="col-sm-2 control-label marginBottom10">Vehicle Facilities</label>
                      <div class="col-sm-10">
                          <textarea class="admin-textarea form-control marginBottom10" name="facilities" placeholder="Facilities"  autofocus>{{ $vehicle->facilities }}</textarea>    
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