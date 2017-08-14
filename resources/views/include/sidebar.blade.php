<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="fa fa-subway"></i> <span>Nexus Travels</span></a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu side">
                  
                  <li><a><i class="fa fa-th"></i> Package <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin/packages/list') }}">List</a></li>
                      <li><a href="{{ url('admin/package/create') }}">Add Package</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin/users/list') }}">List</a></li>
                    </ul>
                  </li> 

                  <li><a><i class="fa fa-th"></i> Wish Packages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin/wish_packages/list') }}">List</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-car"></i> Vehicles <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin/vehicles/list') }}">List</a></li>
                      <li><a href="{{ url('admin/vehicles/create') }}">Add Vehicle</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-th"></i> Packages order <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin/book_packages/list') }}">List</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-bus"></i> Vehicles order <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin/book_vehicles/list') }}">List</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-pencil-square-o "></i> Confirm orders <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('orders/vehicles/list') }}">Vehicles</a></li>
                      <li><a href="{{ url('orders/packages/list') }}">Packages</a></li>
                    </ul>
                  </li>

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small" >
              <a href="{{ url('admin/logout') }}" style="width:100%;" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>