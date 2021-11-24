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
                  <th>Invoice Code</th>
                  <th>Facility</th>
                  <th>Pet Name</th>
                  <th>Time Generate</th>
                  <th>Invoice Amount</th>
                  <th>Discount</th>
                  <th>Time Charged</th>
                  <th>Amount Charged</th>
                  <th>Notes</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
             @foreach($invoices as $invoice)
                <tr>
                   <td>{{$invoice->invoice_code}}</td>
                  <?php 
                   $case=DB::table('cases')->find($invoice->case_id);
                   $facility=DB::table('facilities')->find($case->facility_id);
                   $pet=DB::table('pet_and_owners')->find($case->pet_id);
                   ?> 
                  <td>{{$facility->facility_name}}</td>
                  <td>{{$pet->pet_name}}</td>
                  <td>{{$invoice->time_generated}}</td>
                  <td>{{$invoice->invoice_amount}}</td>
                  <td>{{$invoice->discount}}</td>
                  <td>{{$invoice->time_charged}}</td>
                  <td>{{$invoice->amount_charged}}</td>
                  <td>{{substr($invoice->notes,0,40)}}</td>
                  <td>
                    <div class="table-data-feature">   
                      <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/invoice/'.$invoice->id)}}" id="delete" title="Delete">
                          <i class="fa fa-share-square" style="font-size: 20px;"></i>
                      </a>
                    </div>
                    <div class="table-data-feature">   
                      <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/edit_invoice/'.$invoice->id)}}" id="edit" title="Edit">
                          <i class="fa fa-edit" style="font-size: 20px;"></i>
                      </a>
                    </div>
                    <div class="table-data-feature">   
                      <a class="item" data-toggle="tooltip" data-placement="top" href="{{url('/delete_invoice/'.$invoice->id)}}" id="delete" title="Delete">
                          <i class="fa fa-trash" style="font-size: 20px;"></i>
                      </a>
                    </div>
                  </td>
                 </tr>
                 @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Invoice Code</th>
                  <th>Facility</th>
                  <th>Pet Name</th>
                  <th>Time Generate</th>
                  <th>Invoice Amount</th>
                  <th>Discount</th>
                  <th>Time Charged</th>
                  <th>Amount Charged</th>
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