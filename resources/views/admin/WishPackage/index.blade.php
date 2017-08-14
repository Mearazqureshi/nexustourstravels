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
          <li>Users</li>
          <li class="active">List</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      @if(Session::get('success_msg'))
        <div class="alert alert-success" role="alert">
          <a class="alert-link" style="color:#fff;font-size:16px;">{{ Session::get('success_msg') }}</a>
        </div>
      @endif
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12"> 
      <div class="x_panel">
        <div class="x_title">
          <h2>List</h2>
          <ul class="nav navbar-right panel_toolbox">
            <h4>Total Wish Packages: {{ $count_wish_packages }}</h4>
          </ul>
                  <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="table table-hover list-table">
            <thead>
              <tr>
                <th> Name </th>
                <th> Number of person </th>
                <th> Source </th>
                <th> Destination </th>
                <th> Journey Date </th>
                <th> Estimate Amount </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
               @if($count_wish_packages == 0)
                  <tr>
                      <td>No Wish Package found..</td>
                  </tr>
                @endif
                @foreach($wish_packages as $wish_package)
                  <tr>
                      <td>{{ $wish_package->name }}</td>
                      <td>{{ $wish_package->no_of_person }}</td>
                      <td>{{ $wish_package->source }}</td>
                      <td>{{ $wish_package->destination }}</td>
                      <td>{{ date('d-m-Y',strtotime($wish_package->journey_date)) }}</td>
                      <td>{{ $wish_package->estimate_amount }}</td>
                      <td><a href="{{ url('admin/show-wish-package',$wish_package->id) }}"><button class="btn btn-confirm">Show</button></a></td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          {{ $wish_packages->links() }}
        </div>
      </div>
    </div>
    </div>

  </div>      
</div>

<!-- End Model -->


<script type="text/javascript">
      $('.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th').css('padding','8px');
</script>


@endsection
