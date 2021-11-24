@extends('backlayout.backmain')

@section('title','Dashboard')

@section('content')

 <?php 
	$case=DB::table('cases')->find($invoice->case_id);
	$facility=DB::table('facilities')->find($case->facility_id);
	$pet=DB::table('pet_and_owners')->find($case->pet_id);
 ?>
 <section class="content">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
             <h1 class="profile-username text-center">Pet Club</h1> 	
              <img class="profile-user-img img-responsive img-circle" src="{{asset('/pets/'.$pet->pet_image)}}" alt="Pet picture">
              <p class="text-muted profile-username text-center">{{$pet->pet_name}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Code No</b> <a class="pull-right">{{$invoice->invoice_code}}</a>
                </li>
                <li class="list-group-item">
                  <b>Date</b> <a class="pull-right">{{$invoice->time_generated}}</a>
                </li>
                <li class="list-group-item">
                  <b>Owner Name</b> <a class="pull-right">{{$pet->owner_name}}</a>
                </li>
                <li class="list-group-item">
                  <b>Invoice amount</b> <a class="pull-right">{{$invoice->invoice_amount}}</a>
                </li>
                <li class="list-group-item">
                  <b>Discount</b> <a class="pull-right">{{$invoice->discount}}%</a>
                </li>
                <li class="list-group-item">
                  <b>Time Charged</b> <a class="pull-right">{{$invoice->time_charged}}</a>
                </li>
                <li class="list-group-item">
                  <b>Total</b> <a class="pull-right">{{$invoice->amount_charged}}</a>
                </li>
                <li class="list-group-item">
                  <b>Description</b> <a class="pull-right">{{$invoice->notes}}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
</div>
  <div class="row no-print">
        <div class="col-md-4 col-md-offset-4">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
</section>

@endsection