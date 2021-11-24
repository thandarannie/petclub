<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Auth;

class ServiceController extends Controller
{
    public function add_service(){
        if (Auth::check()) {
        return view('backend.service.add_service');
      }
       return redirect('/login');
    	
    }
    public function save_service(Request $request){
        $this->validate($request,[
            'service_name'=>'required',
            'service_image'=>"required",
            'unit_type'=>'required',
            'pub_status'=>"required",
            'limit_status'=>"required",
            'cost_per_unit'=>"required",
         ]);
        $image=$request->file('service_image');
        if(isset($image)){
            $currentDate=now()->toDateString();
            $imagename=$currentDate.'_'.uniqid().'.'.
            $image->getClientOriginalExtension();
            if(!file_exists('service')){
                mkdir('service', 0777,true);
            }
            $image->move('service',$imagename);
        }else{
            $imagename='default.png';
        }
        $service=new Service();
        $service->notes=$request->notes;
        $service->service_name=$request->service_name;
        $service->has_limit=$request->limit_status;
        $service->unit_id=$request->unit_type;
        $service->cost_per_unit=$request->cost_per_unit;
        $service->pub_status=$request->pub_status;
        $service->image=$imagename;
        $service->save();
        Toastr::success('Service Create Successifully', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/add_service'); 
    }
    public function all_service(){
        $services=Service::all();
        return view('backend.service.all_service',compact('services'));
    }

    public function unactive_service($id){
        DB::table('services')
            ->where('id',$id)
            ->update(['pub_status'=>0]);
            Toastr::success('Service Unactive Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_service');
    }
     public function active_service($id){
        DB::table('services')
            ->where('id',$id)
            ->update(['pub_status'=>1]);
            Toastr::success('Service Active Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_service');
    }
    public function unlimit_service($id){
        DB::table('services')
            ->where('id',$id)
            ->update(['has_limit'=>0]);
            Toastr::success('Service Unlimit Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_service');
    }
     public function limit_service($id){
        DB::table('services')
            ->where('id',$id)
            ->update(['has_limit'=>1]);
            Toastr::success('Service Limit Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_service');
    }

    public function edit_service(Request $request,$id){
        $service=Service::find($id);
        return view('backend.service.edit_service',compact('service'));
    }

    public function update_service(Request $request,$id){
         $this->validate($request,[
            'service_name'=>'required',
            'unit_type'=>'required',
            'pub_status'=>"required",
            'limit_status'=>"required",
            'cost_per_unit'=>"required",
         ]);
        $service=Service::find($id);
        $service->service_name=$request->service_name;
        $service->notes=$request->notes;
        $service->has_limit=$request->limit_status;
        $service->unit_id=$request->unit_type;
        $service->cost_per_unit=$request->cost_per_unit;
        $service->pub_status=$request->pub_status;
        $service->update();
        Toastr::success('Service Update Successifully', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect('/all_service'); 
    }
    
    public function delete_service($id){
       $service=Service::find($id);
        if(file_exists('service/'.$service->image)){
            unlink('service/'.$service->image);
        }
        $service->delete();
            Toastr::success('Service Deleted', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_service');
    }
}
