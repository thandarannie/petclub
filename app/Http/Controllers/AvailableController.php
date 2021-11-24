<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AvailableFor;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Auth;

class AvailableController extends Controller
{
    public function add_available(){
      if (Auth::check()) {
        return view('backend.available.add_available');
      }
       return redirect('/login');
      }
      public function save_available(Request $request){
           $this->validate($request,[
            'service'=>'required',
            'species'=>"required",
         ]);

         $available=new AvailableFor();
         $available->service_id=$request->service;
         $available->species_id=$request->species;
         $available->save();
          Toastr::success('Avaliable For Pet Create Successifully', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/add_available');
      }
      public function all_available(){
      	$availables=AvailableFor::all();
      	return view('backend.available.all_available',compact('availables'));
      }
      public function edit_available($id){
      	$available=AvailableFor::find($id);
      	return view('backend.available.edit_available',compact('available'));
      }
      public function update_available(Request $request,$id){
      	$this->validate($request,[
            'service'=>'required',
            'species'=>"required",
         ]);

         $available=AvailableFor::find($id);
         $available->service_id=$request->service;
         $available->species_id=$request->species;
         $available->update();
          Toastr::success('Avaliable For Pet Update Successifully', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/all_available');
      }
      public function delete_available($id){
      	AvailableFor::find($id)->delete();
      	Toastr::success('Avaliable For Pet Deleted', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/all_available');
      }
}
