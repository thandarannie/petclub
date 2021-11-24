<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class UnitController extends Controller
{
    public function add_unit(){
      if (Auth::check()) {
        return view('backend.unit.add_unit');
      }
       return redirect('/login');
    	
    }
    public function save_unit(Request $request){
          $this->validate($request,[
            'unit_name'=>"required",
         ]);
        $unit=new Unit();
        $unit->unit_name=$request->unit_name;
        $unit->save();
        Toastr::success('Unit Created', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/add_unit'); 
    }
    public function all_unit(){
       $all_units=Unit::all();
        return view('backend.unit.all_unit',compact('all_units'));
    }
    public function edit_unit($id){
         $unit=Unit::find($id);
         return view('backend.unit.edit_unit',compact('unit'));
    }
    public function update_unit(Request $request,$id){
         DB::table('units')
            ->where('id',$id)
            ->update(['unit_name'=>$request->unit_name]);
            Toastr::success('Unit Update Successfully', 'Success', ["positionClass" => "toast-top-center"]);
          return redirect('/all_unit'); 
    }

    public function delete_unit($id){
        DB::table('units')
            ->where('id',$id)
            ->delete();
            Toastr::success('Unit Deleted ', 'Success', ["positionClass" => "toast-top-center"]);
          return redirect('/all_unit'); 
    }
}
