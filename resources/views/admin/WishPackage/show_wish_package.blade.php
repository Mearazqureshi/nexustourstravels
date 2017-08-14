@extends('master')

@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>Wish Package</h3>
  </div>
  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <ol class="breadcrumb">
          <li><i class="fa fa-home" aria-hidden="true"></i> Home</li>
          <li>Wish Package</li>
          <li class="active">Show</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0">
      <div class="x_panel">
          <div class="x_title">
              <h2>Show Wish Package</h2>
              <div class="clearfix"></div>
              </div>
          <div class="x_content">

                  <div class="form-group">

                      <label class="col-sm-12 control-label marginBottom10">Name : {{ $wish_package->name }}</label>

                      <label class="col-sm-12 control-label marginBottom10">E-mail : {{ $wish_package->email }}</label>

                      <label class="col-sm-12 control-label marginBottom10">Source : {{ $wish_package->source }}</label>

                      <label class="col-sm-12 control-label marginBottom10">Destination : {{ $wish_package->destination }}</label>

                      <label class="col-sm-12 control-label marginBottom10">Contact Number : {{ $wish_package->contact_no }}</label>

                      <label class="col-sm-12 control-label marginBottom10">Journey Date : {{ date('d-m-Y',strtotime($wish_package->journey_date)) }}</label>

                      <label class="col-sm-12 control-label marginBottom10">Estimate Amount : {{ $wish_package->estimate_amount }}</label>

                  </div>


          </div>
      </div>
  </div>
</div>
@endsection