<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      
      <div class="user-panel">
        <div class="pull-left image">
          <img src="backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Pet Species</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">new</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/add_pet_species')}}"><i class="fa fa-circle-o"></i>Add_Pet_Species</a></li>
            <li><a href="{{url('/all_pet_species')}}"><i class="fa fa-circle-o"></i>All_Pet_Species</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Slider</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/add_slider')}}"><i class="fa fa-circle-o"></i> Add Slider</a></li>
            <li><a href="{{url('/all_slider')}}"><i class="fa fa-circle-o"></i> All Slider</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/add_service')}}"><i class="fa fa-circle-o"></i>Add Services</a></li>
            <li><a href="{{url('/all_service')}}"><i class="fa fa-circle-o"></i>All Servicess</a></li>
            <li><a href="{{url('/add_unit')}}"><i class="fa fa-circle-o"></i>Add Unit</a></li>
            <li><a href="{{url('/all_unit')}}"><i class="fa fa-circle-o"></i>Show Unit</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Facility</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/add_facility')}}"><i class="fa fa-circle-o"></i> Add Facility</a></li>
            <li><a href="{{url('/all_facility')}}"><i class="fa fa-circle-o"></i>All Facility</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Available & Service Provide</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/add_available')}}"><i class="fa fa-circle-o"></i> Add Available</a></li>
            <li><a href="{{url('/all_available')}}"><i class="fa fa-circle-o"></i>All Available</a></li>
            <li><a href="{{url('/add_provides')}}"><i class="fa fa-circle-o"></i> Add Service_Provides</a></li>
            <li><a href="{{url('/all_provides')}}"><i class="fa fa-circle-o"></i>All Service_Provides</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Packages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/add_package')}}"><i class="fa fa-circle-o"></i>Add Packages</a></li>
            <li><a href="{{url('/all_package')}}"><i class="fa fa-circle-o"></i>Show Packages</a></li>
          </ul>
        </li>
        <li>
          <a href="{{url('/booking_list')}}">
            <i class="fa fa-circle-o"></i> <span>Daily Booking</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Pet&Owner</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">new</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/add_owner_and_pet')}}"><i class="fa fa-circle-o"></i>Add_Owner&Pet</a></li>
            <li><a href="{{url('/all_owner_and_pet')}}"><i class="fa fa-circle-o"></i>All_Owner&Pet</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Case</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/add_case')}}"><i class="fa fa-circle-o"></i>Add Cases</a></li>
            <li><a href="{{url('/all_case')}}"><i class="fa fa-circle-o"></i>Show Cases</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Service Provide</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/add_service_provide')}}"><i class="fa fa-circle-o"></i> Add ServiceProvide</a></li>
            <li><a href="{{url('/all_service_provide')}}"><i class="fa fa-circle-o"></i> All ServiceProvide</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Invoices</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/add_invoice')}}"><i class="fa fa-circle-o"></i> Add Invoice</a></li>
            <li><a href="{{url('/all_invoice')}}"><i class="fa fa-circle-o"></i> All Invoice</a></li>
          </ul>
        </li>
        <li>
          <a href="{{url('/booking_list_record')}}">
            <i class="fa fa-share"></i> <span>Booking Record</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
      </ul>
    </section>
  
  </aside>
