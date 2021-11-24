<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facility;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class FacilityController extends Controller
{
    public function add_facility(){
         if (Auth::check()) {
        return view('backend.facility.add_facility');
      }
       return redirect('/login');
      }
    public function save_facility(Request $request){
         $this->validate($request,[
            'facility_name'=>"required",
            'email'=>"required|email",
            'phone_no'=>"required",
            'address'=>"required",
            'contact_person'=>"required",
         ]);
        $facility=new Facility();
        $facility->facility_name=$request->facility_name;
        $facility->email=$request->email;
        $facility->phone_no=$request->phone_no;
        $facility->address=$request->address;
        $facility->contact_person=$request->contact_person;
        $facility->save();
        Toastr::success('Facility Created', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/add_facility'); 
    }
    public function all_facility(){
    	$facilities=Facility::all();
    	return view('backend.facility.all_facility',compact('facilities'));
    }
    public function delete_facility($id){
         Facility::find($id)->delete();
    	Toastr::success('Facility Deleted', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/all_facility'); 
    }
}
