@extends('master')
@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Confirm Vehicles</h3>
  </div>
  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <ol class="breadcrumb">
          <li><i class="fa fa-home" aria-hidden="true"></i> Home</li>
          <li>Vehicles</li>
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
            <h4>Total Confirm Vehicles: {{ $book_vehicles_count }}</h4>
          </ul>
          
        <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="table table-hover list-table">
            <thead>
              <tr>
                <th> User Name </th>
                <th> Vehicle Name </th>
                <th> No of days </th>
                <th> Hire date </th>
                <th> From </th>
                <th> To </th>
                <th> Killo meter </th>
                <th> Phone no </th>
                <th> Total </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @if($book_vehicles_count == 0)
                  <tr>
                      <td>No Vehicles found..</td>
                  </tr>
                @endif
                @foreach($vehicles as $vehicle)
                  <tr>
                      <td>{{ $vehicle->name }}</td>
                      <td>{{ $vehicle->vehicle->name }}</td>
                      <td>{{ $vehicle->no_of_days }}</td>
                      <td>{{ date('d-m-Y',strtotime($vehicle->hire_date)) }}</td>
                      <td>{{ $vehicle->from }}</td>
                      <td>{{ $vehicle->to }}</td>
                      <td>{{ $vehicle->km }}</td>
                      <td>{{ $vehicle->contact_no }}</td>
                      <td>{{ $vehicle->total }}</td>
                      <td><a href="{{ url('admin/cancel-vehicle',$vehicle->id) }}"><button class="btn-cancel">Cancel</button></a></td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          {{ $vehicles->links() }}
        </div>
      </div>
    </div>
    </div>

  </div>      
</div>


<!-- Modal -->
  <form method="post" action="{{ url('admin/package/delete') }}">
      {{ csrf_field() }}
      <div class="modal fade" id="delete_image_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Delete Image</h4>
            </div>
            <div class="modal-body">
              Are you sure want to delete ?
            </div>
            <input type="hidden" id="package_delete_id" name="package_delete_id">
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary btn-model" Value="Delete" ></button>
            </div>
          </div>
        </div>
      </div>
  </form>

<!-- End Model -->


<script type="text/javascript">
      $('.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th').css('padding','8px');
</script>


@endsection
