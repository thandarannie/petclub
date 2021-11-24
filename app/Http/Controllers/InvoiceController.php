<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Auth;

class InvoiceController extends Controller
{
    public function add_invoice(){
      if (Auth::check()) {
        return view('backend.invoice.add_invoice');
      }
       return redirect('/login');
    }
    public function save_invoice(Request $request){
          $this->validate($request,[
            'case'=>'required',
         ]);
          $cases=DB::table('cases')->find($request->case);
          $s_provide=DB::table('service_provides')->where('case_id',$request->case)->first();
   

          $invoices=new Invoice();
          $invoices->invoice_code='Pet_Club_'.mt_rand(100000,999999);
          $invoices->case_id=$request->case;
          $invoices->time_generated=now();
          $invoices->invoice_amount=$s_provide->price_charged; 
          $invoices->discount=$request->discount;
          $invoices->time_charged=round($cases->end_time) - round($cases->start_time);
          $dis=$request->discount/100 * $s_provide->price_charged;
          $invoices->amount_charged=$s_provide->price_charged - $dis;
          $invoices->notes=$request->notes;
          $invoices->save();
          Toastr::success('Invoice Created', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect('/add_invoice');
    }

    public function all_invoice(){
    	$invoices=Invoice::all();
    	return view('backend.invoice.all_invoice',compact('invoices'));
    }
    public function bouncher($id){
     $invoice=Invoice::find($id);
     return view('backend.invoice.bouncher',compact('invoice'));
    }
    public function delete_invoice($id){
        Invoice::find($id)->delete();
      Toastr::success('Invoices Delete Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_invoice');
    }
}
