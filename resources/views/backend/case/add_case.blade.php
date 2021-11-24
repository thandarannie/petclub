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
              <h3 class="box-title">Add Cases</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body"> 
            <form role="form" action="" method="post">
              {{csrf_field()}}
                <div class="form-group">
                  <label>Facility</label>
                  <select class="form-control" name="facility">
                   <?php 
                     $facilities=DB::table('facilities')->get();
                     ?>  
                     @if (count($facilities) > 0) 
                       @foreach ($facilities as $facility)
                        <option value="{{$facility->id}}">{{$facility->facility_name}}</option>
                       @endforeach
                     @else
                        <option value="">Empty Facility</option>
                     @endif
                    </select>
                </div> 

                <div class="form-group">
                  <label>Pet</label>
                  <select class="form-control" name="pet">
                   <?php 
                     $pets=DB::table('pet_and_owners')->get();
                   ?>    
                     @if (count($pets)>0) 
                       @foreach ($pets as $pet)
                        <option value="{{$pet->id}}">{{$pet->pet_name}}</option>
                      @endforeach
                     @else
                    
                        <option value="">Empty Pet</option>
                     @endif
                    </select>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="start_time">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                   <div class="input-group">
                    <input type="text" class="form-control timepicker" name="end_time">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div> 
                <div class="form-group">
                <textarea name="notes" placeholder="Notes"
                 style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="0" name="close_status">Closed
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