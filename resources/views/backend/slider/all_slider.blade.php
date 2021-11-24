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
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Slider ID</th>
                  <th>Slider Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
             @foreach($all_sliders as $v_slider)
                <tr>
                  <td>{{$v_slider->id}}</td>
                        <td><img src="{{asset('slider/'.$v_slider->image)}}" style="height: 80px; width: 100px;"></td>
                        <td>
                           @if($v_slider->pub_status==1)
                                  <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/unactive_slider/'.$v_slider->id)}}" title="Unactive"><span class="label label-success" style="font-size:15px;">Active</span>
                                   </a>                            
                           @else 
                                   <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/active_slider/'.$v_slider->id)}}" title="Active">
                                  <span class="label label-danger" style="font-size: 15px;">Unactive</span>
                                  </a>
                           @endif  
                        </td>
                        <td>
                          <div class="table-data-feature">
                                      <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/delete_slider/'.$v_slider->id)}}" id="delete" title="Delete">
                                          <i class="fa fa-trash" style="font-size: 20px;"></i>
                                      </a>
                                  </div>
                        </td>
                 </tr>
                 @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Slider ID</th>
                  <th>Slider Image</th>
                  <th>Status</th>
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