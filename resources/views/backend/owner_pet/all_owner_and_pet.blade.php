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
                  <th>Owner's Name</th>
                  <th>Email</th>
                  <th>Phone No</th>
                  <th>Address</th>
                  <th>Pet's Name</th>
                  <th>Pet Image</th>
                  <th>Pet Species</th>
                  <th>Ages</th>
                  <th>Notes</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
             @foreach($pet_and_owners as $p_and_o)
                <tr>
                  <td>{{$p_and_o->owner_name}}</td>
                  <td>{{$p_and_o->email}}</td>
                  <td>{{$p_and_o->phone_no}}</td>
                  <td>{{$p_and_o->address}}</td>
                  <td>{{$p_and_o->pet_name}}</td>
                  <td><img src="{{asset('pets/'.$p_and_o->pet_image)}}" style="height: 70px; width: 90px;"></td>
                    <?php 
                   $pet_species=DB::table('pet_species')->find($p_and_o->species_id);
                   ?> 
                  <td>{{$pet_species->species_name}}</td>


                  <td>{{$p_and_o->age}}</td>
                  <td>{{substr($p_and_o->notes,0,40)}}</td>
                  <td>
                    <div class="table-data-feature">   
                      <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/delete_species/'.$p_and_o->id)}}" id="delete" title="Delete">
                          <i class="fa fa-trash" style="font-size: 20px;"></i>
                      </a>
                    </div>
                  </td>
                 </tr>
                 @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Owner's Name</th>
                  <th>Email</th>
                  <th>Phone No</th>
                  <th>Address</th>
                  <th>Pet's Name</th>
                  <th>Pet Image</th>
                  <th>Pet Species</th>
                  <th>Ages</th>
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