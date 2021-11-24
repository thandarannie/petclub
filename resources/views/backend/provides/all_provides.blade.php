
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Service Provide Tables</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Service Name</th>
                  <th>Facility Name</th>
                  <th>Number_Of_Limit</th>
                  <th>Currently_used</th>
                  <th>Remain</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
             @foreach($provides as $provide)
                <tr>
                   <?php 
                   $service=DB::table('services')->find($provide->service_id);
                   $facility=DB::table('facilities')->find($provide->facility_id);
                   ?> 
                  <td>{{$service->service_name}}</td>
                  <td>{{$facility->facility_name}}</td>
                  <td>
                    <div class="col-6">
                      <form role="form" action="{{url('/update_limit/'.$provide->id)}}" method="post">
                        {{csrf_field()}}
                        @if($provide->service_limit==0)
                          <div class="form-group">
                              <span style="font-size: 15px;" class="label label-primary">Unlimited Services</span>
                          </div>
                        @else
                        <div class="form-group">
                            <input type="number" class="form-control" value="{{$provide->service_limit}}" name="has_limit" >
                          </div>
                           <button type="submit" class="btn btn-primary"><i class="fa fa-refresh" style="font-size: 20px;"></i></button>
                        @endif    
                         
                      </form>
                    </div>
                  </td>
                  <td>
                     <div class="col-6">
                      <form role="form" action="{{url('/update_currently_use/'.$provide->id)}}" method="post">
                        {{csrf_field()}}
                         @if($provide->service_limit==0)
                          <div class="form-group">
                          <span style="font-size: 15px;" class="label label-primary">Anything</span>
                          </div>
                        @else
                        <div class="form-group">
                           <input type="number" class="form-control" value="{{$provide->currently_used}}" name="currently_used" >
                          </div>
                          <button type="submit" class="btn btn-success"><i class="fa fa-refresh" style="font-size: 20px;"></i></button>
                        @endif 
                      </form>
                    </div>
                  </td>
                  <td>{{$provide->service_limit - $provide->currently_used}}</td>
                  <td>
                    <div class="table-data-feature">   
                        <a class="item btn btn-danger" data-toggle="tooltip" data-placement="top" href="{{url('/delete_provide/'.$provide->id)}}" id="delete" title="Delete">
                            <i class="fa fa-trash" style="font-size: 20px;"></i>
                        </a>
                    </div>
                  </td>
                 </tr>
                 @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Service Name</th>
                  <th>Facility Name</th>
                  <th>Number_Of_Limit</th>
                  <th>Currently_used</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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