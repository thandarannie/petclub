<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PetSpecie;
use DB;
use App\PetAndOwner;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class OwnerAndPetController extends Controller
{
    public function add_pet_species(){
        if (Auth::check()) {
        return view('backend.owner_pet.add_pet_species');
      }
       return redirect('/login');
    }
    public function save_pet_species(Request $request){
       $this->validate($request,[
            'species_name'=>"required",
         ]);
        $pet_species=new PetSpecie();
        $pet_species->species_name=$request->species_name;
        $pet_species->save();
        Toastr::success('Pet Species Created', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/add_pet_species'); 
    }
    public function all_pet_species(){
    	$pet_species=PetSpecie::all();
    	return view('backend.owner_pet.all_pet_species',compact('pet_species'));
    }
    public function delete_species($id){
    	PetSpecie::find($id)->delete();
    	Toastr::success('Pet Species Deleted', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/all_pet_species'); 
    }

    //Owner And Pet
    public function add_owner_and_pet(){
        return view('backend.owner_pet.add_owner_and_pet');
    }
    public function save_owner_and_pet(Request $request){
         $this->validate($request,[
            'owner_name'=>"required",
            'email'=>"required|email",
            'phone_no'=>"required",
            'address'=>"required",
            'pet_name'=>"required",
            'pet_image'=>'required',
            'pet_specie'=>"required",
            'age'=>"required",
            'notes'=>"required",
         ]);
         $image=$request->file('pet_image');
        if(isset($image)){
            $currentDate=now()->toDateString();
            $imagename=$currentDate.'_'.uniqid().'.'.
            $image->getClientOriginalExtension();
            if(!file_exists('pets')){
                mkdir('pets', 0777,true);
            }
            $image->move('pets',$imagename);
        }else{
            $imagename='default.png';
        }
         $pet_and_owner=new PetAndOwner();
         $pet_and_owner->owner_name=$request->owner_name;
         $pet_and_owner->email=$request->email;
         $pet_and_owner->phone_no=$request->phone_no;
         $pet_and_owner->address=$request->address;
         $pet_and_owner->pet_name=$request->pet_name;
         $pet_and_owner->pet_image=$imagename;
         $pet_and_owner->species_id=$request->pet_specie;
         $pet_and_owner->age=$request->age;
         $pet_and_owner->notes=$request->notes;
         $pet_and_owner->save();
         Toastr::success('Pet and owner Created', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect('/add_owner_and_pet');
    }
    public function all_owner_and_pet(){
        $pet_and_owners=PetAndOwner::orderBy('id','desc')->get();
         return view('backend.owner_pet.all_owner_and_pet',compact('pet_and_owners'));
    }
}
