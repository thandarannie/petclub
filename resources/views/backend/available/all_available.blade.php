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
              <h3 class="box-title">Pet And Pet Owner Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Service Name</th>
                  <th>Species</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
             @foreach($availables as $available)
                <tr>
                    <?php 
                   $pet_species=DB::table('pet_species')->find($available->species_id);
                   $pet_services=DB::table('services')->find($available->service_id);
                   ?> 
                   <td>{{$pet_services->service_name}}</td>
                  <td>{{$pet_species->species_name}}</td>
                  <td>
                    <div class="table-data-feature">  
                     <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/edit_available/'.$available->id)}}" id="edit" title="Edit">
                          <i class="fa fa-edit" style="font-size: 20px;"></i>
                      </a>/ 
                      <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/delete_available/'.$available->id)}}" id="delete" title="Delete">
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
                  <th>Species</th>
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