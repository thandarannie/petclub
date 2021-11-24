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
                  <th>Package ID</th>
                  <th>Package Name</th>
                  <th>Service One</th>
                  <th>Service two</th>
                  <th>Service Three</th>
                  <th>Service Four</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
             @foreach($packages as $package)
                <tr>
                  <td>{{$package->id}}</td>
                  <td>{{$package->package_name}}</td>
                  <td>{{$package->service_one}}</td>
                  <td>{{$package->service_two}}</td>
                  <td>{{$package->service_three}}</td>
                  <td>{{$package->service_four}}</td>
                  <td>{{$package->prices}}</td>
                  <td>
                     @if($package->pub_status==1)
                           <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/unactive_package/'.$package->id)}}" title="Click To Unactive">
                          <span class="label label-success" style="font-size: 15px;">Active</span>
                          </a>
                     @else 
                            <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/active_package/'.$package->id)}}" title="Click To Active">
                            <span class="label label-danger" style="font-size: 15px;">Unactive</span>
                            </a> 
                     @endif  
                  </td>
                  <td>
                    <div class="table-data-feature"> 
                       <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/edit_package/'.$package->id)}}" id="delete" title="Edit">
                            <i class="fa fa-edit" style="font-size: 20px;"></i>
                        </a>   /   
                        <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/delete_package/'.$package->id)}}" id="delete" title="Delete">
                            <i class="fa fa-trash" style="font-size: 20px;"></i>
                        </a>
                    </div>
                  </td>
                 </tr>
                 @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Package ID</th>
                  <th>Package Name</th>
                  <th>Service One</th>
                  <th>Service two</th>
                  <th>Service Three</th>
                  <th>Service Four</th>
                  <th>Price</th>
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