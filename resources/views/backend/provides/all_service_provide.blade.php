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
              <h3 class="box-title">Service Provide Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Facility</th>
                  <th>Pet</th>
                  <th>Service</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Unit</th>
                  <th>CostPerUnit</th>
                  <th>Price Charge</th>
                  <th>Notes</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
             @foreach($service_provides as $s_p)
                <tr>
                  <?php 
                   $case=DB::table('cases')->find($s_p->case_id);
                   $facility=DB::table('facilities')->find($case->facility_id);
                   $pet=DB::table('pet_and_owners')->find($case->pet_id);
                   $service=DB::table('services')->find($s_p->service_id);
                   ?> 
                  <td>{{$facility->facility_name}}</td>
                  <td>{{$pet->pet_name}}</td>
                  <td>{{$service->service_name}}</td>
                  <td>{{$s_p->start_time}}</td>
                  <td>{{$s_p->end_time}}</td>
                  <td>{{$s_p->unit}}</td>
                  <td>{{$s_p->cost_per_unit}}</td>
                  <td>{{$s_p->price_charged}}</td>
                  <td>{{substr($s_p->notes,0,40)}}</td>
                  <td>
                    <div class="table-data-feature">   
                      <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/edit_service_provide/'.$s_p->id)}}" id="edit" title="Edit">
                          <i class="fa fa-edit" style="font-size: 20px;"></i>
                      </a>
                    </div>
                    <div class="table-data-feature">   
                      <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/delete_service_provide/'.$s_p->id)}}" id="delete" title="Delete">
                          <i class="fa fa-trash" style="font-size: 20px;"></i>
                      </a>
                    </div>
                  </td>
                 </tr>
                 @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Facility</th>
                  <th>Pet</th>
                  <th>Service</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Unit</th>
                  <th>CostPerUnit</th>
                  <th>Price Charge</th>
                  <th>Notes</th>
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