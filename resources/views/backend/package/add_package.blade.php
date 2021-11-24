@extends('backlayout.backmain')

@section('title','Dashboard')

@section('content')

<div class="wrapper">
   @include('backlayout.header')
  
   @include('backlayout.backsidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      @include('backlayout.second_header')
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
             <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Package</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body"> 
            <form role="form" action="" method="post">
              {{csrf_field()}}
                <div class="form-group">
                  <input type="text" class="form-control" name="package_name" placeholder="Package Name">
                </div>
                <div class="form-group">
                  <label>Service One</label>
                  <select class="form-control" name="service_one">
                      <?php 
                     $services=DB::table('services')->where('pub_status',1)->get();
                     ?>
                     <option value="">Select Services</option>
                      @foreach ($services as $service) 
                        <option value="{{$service->service_name}}">{{$service->service_name}}</option>
                      @endforeach
                    </select>
                </div> 

                <div class="form-group">
                  <label>Service Two</label>
                  <select class="form-control" name="service_two">
                      <?php 
                     $services=DB::table('services')->where('pub_status',1)->get();
                     ?>
                     <option value="">Select Services</option>
                      @foreach ($services as $service) 
                        <option value="{{$service->service_name}}">{{$service->service_name}}</option>
                      @endforeach
                    </select>
                </div> 

                <div class="form-group">
                  <label>Service Three</label>
                  <select class="form-control" name="service_three">
                   <?php 
                     $services=DB::table('services')->where('pub_status',1)->get();
                     ?>
                     <option value="">Select Services</option>
                      @foreach ($services as $service) 
                        <option value="{{$service->service_name}}">{{$service->service_name}}</option>
                      @endforeach
                    </select>
                </div> 
                <div class="form-group">
                  <input type="text" class="form-control" name="price" placeholder="Prices">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" name="pub_status"> Publication Status
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          </div>
          <!-- /.box -->
        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('backlayout.footer')
  <!-- Control Sidebar -->
  @include('backlayout.control_sidebar')

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@endsection