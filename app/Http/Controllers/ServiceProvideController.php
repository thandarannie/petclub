<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceProvide;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Auth;

class ServiceProvideController extends Controller
{
    public function add_service_provide(){
      if (Auth::check()) {
        return view('backend.provides.add_service_provide');
      }
       return redirect('/login');
    	
    }
    public function save_service_provide(Request $request){
            $this->validate($request,[
            'case'=>'required',
            'service'=>"required",
         ]);
          $cases=DB::table('cases')->find($request->case);
          $services=DB::table('services')->find($request->service);
          $units=DB::table('units')->find($services->unit_id);

          $service_proivde=new ServiceProvide();
          $service_proivde->case_id=$request->case;
          $service_proivde->service_id=$request->service;
          $service_proivde->start_time=$cases->start_time;
          $service_proivde->end_time=$cases->end_time;
          $service_proivde->unit=$services->unit_id;
          $service_proivde->cost_per_unit=$services->cost_per_unit;
          // if($units->unit_name=="One Hour"){
          // 	$unit=1;
          // }
          // if ($units->unit_name=="Two Hours") {
          // 	$unit=2;
          // }
          // if ($units->unit_name=="Three Hours") {
          // 	$unit=3;
          // }
          // if ($units->unit_name=="Four Hours") {
          // 	$unit=4;
          // }
          $unit=round($cases->end_time) - round($cases->start_time);
          $service_proivde->price_charged=$unit * $services->cost_per_unit;
          $service_proivde->notes=$request->notes;
          $service_proivde->save();
           Toastr::success('Service Provides Created', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect('/add_service_provide');

    }
    public function all_service_provide(){
    	$service_provides=ServiceProvide::all();
    	return view('backend.provides.all_service_provide',compact('service_provides'));
    }
    public function edit_service_provide($id){
    	$service_provide=ServiceProvide::find($id);
    	return view('backend.provides.edit_service_provide',compact('service_provide'));
    }
    public function update_service_provide(Request $request,$id){
             $this->validate($request,[
            'case'=>'required',
            'service'=>"required",
         ]);
          $cases=DB::table('cases')->find($request->case);
          $services=DB::table('services')->find($request->service);
          $units=DB::table('units')->find($services->unit_id);

          $service_proivde=ServiceProvide::find($id);
          $service_proivde->case_id=$request->case;
          $service_proivde->service_id=$request->service;
          $service_proivde->start_time=$cases->start_time;
          $service_proivde->end_time=$cases->end_time;
          $service_proivde->unit=$services->unit_id;
          $service_proivde->cost_per_unit=$services->cost_per_unit;
          if($units->unit_name=="One Hour"){
          	$unit=1;
          }
          if ($units->unit_name=="Two Hours") {
          	$unit=2;
          }
          if ($units->unit_name=="Three Hours") {
          	$unit=3;
          }
          if ($units->unit_name=="Four Hours") {
          	$unit=4;
          }
          $service_proivde->price_charged=$unit * $services->cost_per_unit;
          $service_proivde->notes=$request->notes;
          $service_proivde->update();
           Toastr::success('Service Provides Updated', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect('/all_service_provide');
    }
    public function delete_service_provide($id){
    	ServiceProvide::find($id)->delete();
    	Toastr::success('Service Provides Deleted', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect('/all_service_provide');
    }
}
