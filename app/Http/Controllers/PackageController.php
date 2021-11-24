<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Auth;

class PackageController extends Controller
{
    public function add_package(){
        if (Auth::check()) {
        return view('backend.package.add_package');
      }
       return redirect('/login');
    }
    
    public function save_package(Request $request){
    	 $this->validate($request,[
            'package_name'=>'required',
            'service_one'=>"required",
            'service_two'=>'required',
            'service_three'=>'required',
            'price'=>"required",
            'pub_status'=>"required",
         ]);
        $package=new Package();
        $package->package_name=$request->package_name;
        $package->service_one=$request->service_one;
        $package->service_two=$request->service_two;
        $package->service_three=$request->service_three;
        $package->service_four=$request->service_four;
        $package->prices=$request->price;
        $package->pub_status=$request->pub_status;
        $package->save();
        Toastr::success('Package Create Successifully', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/add_package'); 
    }
    public function all_package(){
    	$packages=Package::all();
    	return view('backend.package.all_package',compact('packages'));
    }
    public function unactive_package($id){
        DB::table('packages')
            ->where('id',$id)
            ->update(['pub_status'=>0]);
            Toastr::success('Package Unactive Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_package');
    }
     public function active_package($id){
        DB::table('packages')
            ->where('id',$id)
            ->update(['pub_status'=>1]);
            Toastr::success('Package Active Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_package');
    }
    public function edit_package($id){
    	$package=Package::find($id);
    	return view('backend.package.edit_package',compact('package'));
    }
    public function update_package(Request $request,$id){
    	 $this->validate($request,[
            'package_name'=>'required',
            'service_one'=>"required",
            'service_two'=>'required',
            'service_three'=>"required",
            'service_four'=>"required",
            'price'=>"required",
            'pub_status'=>"required",
         ]);
    	$package=Package::find($id);
        $package->package_name=$request->package_name;
        $package->service_one=$request->service_one;
        $package->service_two=$request->service_two;
        $package->service_three=$request->service_three;
        $package->service_four=$request->service_four;
        $package->prices=$request->price;
        $package->pub_status=$request->pub_status;
        $package->update();
        Toastr::success('Pacakge Update Successifully', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect('/all_package'); 
    }
    public function delete_package($id){
    	Package::find($id)->delete();
    	  Toastr::success('Pacakge Delete Successifully', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect('/all_package'); 
    }
}
