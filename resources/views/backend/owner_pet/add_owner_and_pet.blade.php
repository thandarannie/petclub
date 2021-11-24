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
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
             <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Pet Owner Abd Pet</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body"> 
            <form role="form" action="" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
                <div class="form-group">
                  <input type="text" class="form-control" name="owner_name" placeholder="Owner's Name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Owner's Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="phone_no" placeholder="Owner's Phone No">
                </div>
                <div class="form-group">
                <textarea name="address" placeholder="Address"
                 style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="pet_name" placeholder="Pet's Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Pet Image</label>
                  <input type="file" id="exampleInputFile" name="pet_image">
                </div>
                <div class="form-group">
                  <label>Pet Species</label>
                      <select class="form-control" name="pet_specie">
                   <?php 
                     $pet_species=DB::table('pet_species')->get();
                      foreach ($pet_species as $pet_specie) { ?>
                        <option value="{{$pet_specie->id}}">{{$pet_specie->species_name}}</option>
                     <?php } ?>  
                      </select>
                </div> 
                <div class="form-group">
                  <input type="text" class="form-control" name="age" placeholder=" Per Age">
                </div>
                <div class="form-group">
                <textarea name="notes" placeholder="About Pet"
                 style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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