@extends('master')
@section('content')
<div class="page-title">
<!--   <div class="title_left">
    <h3>Users</h3>
  </div> -->
  <div class="title_right">
  <!--   <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <ol class="breadcrumb">
          <li><i class="fa fa-home" aria-hidden="true"></i> Home</li>
          <li>Users</li>
          <li class="active">List</li>
        </ol>
      </div>
    </div> -->
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
        <!--<div class="x_title">
          <h2>List</h2> 
         <!--  <ul class="nav navbar-right panel_toolbox">
            <a href="{{ url('admin/package/create') }}" class="btn btn-primary pull-right btn-admin">Add Package</a>
                  </ul> 
                  <div class="clearfix"></div> 


        </div>-->
        <div class="x_content">
            <div class="col-md-3 admin-blade">
                <div class="panel panel-admin blue">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-user admin-icon"></i>
                            </div>
        
                            <div class="col-xs-3 text-right">
                                <div class="icon-text">Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('admin/users/list') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3 col-md-offset-1 admin-blade">
                <div class="panel panel-admin red-background">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-th admin-icon"></i>
                            </div>
        
                            <div class="col-xs-3 text-right">
                                <div class="icon-text">Packages</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('admin/packages/list') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-md-3 col-md-offset-1 admin-blade">
                <div class="panel panel-admin yellow-background">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-car admin-icon"></i>
                            </div>
        
                            <div class="col-xs-3 text-right">
                                <div class="icon-text">Vehicles</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('admin/vehicles/list') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3 admin-blade">
                <div class="panel panel-admin green-background">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-th admin-icon"></i>
                            </div>
        
                            <div class="col-xs-3 text-right">
                                <div class="icon-text">Wish Package</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('admin/wish_packages/list') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3 col-md-offset-1 admin-blade">
                <div class="panel panel-admin black-background">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-bus admin-icon"></i>
                            </div>
        
                            <div class="col-xs-3 text-right">
                                <div class="icon-text">Vehicles order</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('admin/book_vehicles/list') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3 col-md-offset-1 admin-blade">
                <div class="panel panel-admin neon-background">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-th admin-icon"></i>
                            </div>
        
                            <div class="col-xs-3 text-right">
                                <div class="icon-text">Packages order</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('admin/book_packages/list') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3 admin-blade">
                <div class="panel panel-admin pink-background">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-car admin-icon"></i>
                            </div>
        
                            <div class="col-xs-3 text-right">
                                <div class="icon-text">Confirm Vehicles</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('orders/vehicles/list') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-md-3 col-md-offset-1 admin-blade">
                <div class="panel panel-admin orange-background">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-car admin-icon"></i>
                            </div>
        
                            <div class="col-xs-3 text-right">
                                <div class="icon-text">Confirm Packages</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('orders/packages/list') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


        </div>
      </div>
    </div>
    </div>

  </div>      
</div>

<script>
    $('.right_col').addClass("admin_dashboard");
    $('.x_panel').css('background-color','rgba(0,0,0,0.2)');
    $('.x_panel').css('border-color','rgba(0,0,0,0.1)');

</script>

@endsection