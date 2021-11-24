<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Auth;

class CaseController extends Controller
{
    public function add_case(){
      if (Auth::check()) {
    	return view('backend.case.add_case');
     }
     return redirect('/login');
    }
    public function save_case(Request $request){
         $this->validate($request,[
            'facility'=>'required',
            'pet'=>"required",
            'start_time'=>'required',
            'close_status'=>"required",
         ]);
         DB::table('cases')->insert([
          'facility_id'=>$request->facility,
          'pet_id'=>$request->pet,
          'start_time'=>$request->start_time,
          'end_time'=>$request->end_time,
          'notes'=>$request->notes,
          'closed'=>$request->close_status,
         ]);
          DB::table('provides')->where('facility_id',$request->facility)->increment('currently_used',1);
         Toastr::success('CaseCreate Successifully', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/add_case');
    }
    public function all_case(){
        $cases=DB::table('cases')->get();
        return view('backend.case.all_case',compact('cases'));
    }
    public function update_start_time(Request $request,$id){
          DB::table('cases')
          ->where('id',$id)
          ->update(['start_time'=>$request->start_time]);
          Toastr::success('Start time Update Successifully', 'Success', ["positionClass" => "toast-top-center"]);
      return redirect('/all_case');
    }
     public function update_end_time(Request $request,$id){
          DB::table('cases')
          ->where('id',$id)
          ->update(['end_time'=>$request->end_time]);
          Toastr::success('End Time Update Successifully', 'Success', ["positionClass" => "toast-top-center"]);
      return redirect('/all_case');
    }
    public function unclose_case($id){
       DB::table('cases')
            ->where('id',$id)
            ->update(['closed'=>0]);
        $cases=DB::table('cases')->find($id);
          
        DB::table('provides')->where('facility_id',$cases->facility_id)->increment('currently_used',1); 

            Toastr::success('Unclosed Case Successifully', 'Success', ["positionClass" => "toast-top-center"]);
      return redirect('/all_case');
    }
    public function close_case($id){
       DB::table('cases')
            ->where('id',$id)
            ->update(['closed'=>1]);

       $cases=DB::table('cases')->find($id);    
        DB::table('provides')->where('facility_id',$cases->facility_id)->decrement('currently_used',1); 
            
            Toastr::success('Closed Case Successifully', 'Success', ["positionClass" => "toast-top-center"]);
      return redirect('/all_case');
    }
    public function delete_case($id){
       DB::table('cases')
            ->where('id',$id)
            ->delete();
            Toastr::success('Delete Case Successifully', 'Success', ["positionClass" => "toast-top-center"]);
      return redirect('/all_case');
    }
}
