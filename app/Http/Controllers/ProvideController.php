<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provide;
use App\Service;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class ProvideController extends Controller
{
    public function add_provides(){
      if (Auth::check()) {
         return view('backend.provides.add_provides');
      }
       return redirect('/login');
      
    }
    public function save_provides(Request $request){
       $this->validate($request,[
            'facility'=>"required",
            'service'=>"required",
         ]);
       $limit=Service::find($request->service);
       $provides=new Provide();
       $provides->facility_id=$request->facility;
       $provides->service_id=$request->service;
       
       if($limit->has_limit==1){
       	 $provides->service_limit=10;
       	 $provides->currently_used=4;
       }else{
         $provides->service_limit=0;
         $provides->currently_used=0;
       }
       $provides->save();
       Toastr::success('Service Provide Create Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/add_provides');
    }
    public function all_provides(){
    	$provides=Provide::all();
    	return view('backend.provides.all_provides',compact('provides'));
    }
    public function update_limit(Request $request,$id){
    	Provide::find($id)->update(['service_limit'=>$request->has_limit]);
    	Toastr::success('Service Limit Update Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_provides');
    }
    public function update_currently_use(Request $request,$id){
    	Provide::find($id)->update(['currently_used'=>$request->currently_used]);
    	Toastr::success('Currently Used Update Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_provides');
    }
    public function delete_provide($id){
    	Provide::find($id)->delete();
    	Toastr::success('Service Provides Delete Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_provides');
    }
}
