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
              <h3 class="box-title">Case Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Facility</th>
                  <th>Pet</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Notes</th>
                  <th>Close Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
             @foreach($cases as $case)
                <tr>
                  <?php 
                   $facility=DB::table('facilities')->find($case->facility_id);
                   $pet=DB::table('pet_and_owners')->find($case->pet_id);
                   ?>
                  @if($facility) 
                  <td>{{$facility->facility_name}}</td>
                  @else 
                  <td>Nothing Facility</td>
                  @endif

                  @if($pet)
                  <td>{{$pet->pet_name}}</td>
                  @else 
                  <td>Nothing Pet</td>
                  @endif
                  <td>
                     <div class="col-6">
                      <form role="form" action="{{url('/update_start_time/'.$case->id)}}" method="post">
                        {{csrf_field()}}
                          <div class="form-group">
                            <input type="time" class="form-control" value="{{$case->start_time}}" name="start_time" >
                          </div>
                          <button type="submit" class="btn btn-primary"><i class="fa fa-refresh" style="font-size: 15px;"></i></button>
                      </form>
                    </div>
                  </td>
                  <td>
                     <div class="col-6">
                      <form role="form" action="{{url('/update_end_time/'.$case->id)}}" method="post">
                        {{csrf_field()}}
                          <div class="form-group">
                            <input type="time" class="form-control" value="{{$case->end_time}}" name="end_time" >
                          </div>
                          <button type="submit" class="btn btn-primary"><i class="fa fa-refresh" style="font-size: 15px;"></i></button>
                      </form>
                    </div>
                  </td>
                  <td>{{substr($case->notes,0,40)}}</td>
                  <td>
                  @if($case->closed==1)
                          <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/unclose_case/'.$case->id)}}" title="Click To Unclose">
                          <span class="label label-success" style="font-size: 15px;">Closed</span>
                          </a>
                     @else 
                          <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/close_case/'.$case->id)}}" title="When end time is reach Click to Close">
                            <span class="label label-danger" style="font-size: 15px;">UnClose</span>
                            </a> 
                     @endif
                  </td>     
                  <td>
                    <div class="table-data-feature">   
                      <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/delete_case/'.$case->id)}}" id="delete" title="Delete">
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
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Notes</th>
                  <th>Close Status</th>
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