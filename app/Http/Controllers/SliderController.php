<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class SliderController extends Controller
{  

    public function add_slider(){
        if (Auth::check()) {
       return view('backend.slider.add_slider');
       }
       return redirect('/login');
    	
    }
    public function save_slider(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'sub_title'=>"required",
            'slider_image'=>'required',
            'pub_status'=>"required",
         ]);
        $image=$request->file('slider_image');
        $slug=str_slug($request->title);
        if(isset($image)){
            $currentDate=now()->toDateString();
            $imagename=$slug.'_'.$currentDate.'_'.uniqid().'.'.
            $image->getClientOriginalExtension();
            if(!file_exists('slider')){
                mkdir('slider', 0777,true);
            }
            $image->move('slider',$imagename);
        }else{
            $imagename='default.png';
        }
        $slider=new Slider();
        $slider->title=$request->title;
        $slider->sub_title=$request->sub_title;
        $slider->pub_status=$request->pub_status;
        $slider->image=$imagename;
        $slider->save();
        Toastr::success('Slider Created', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/add_slider'); 		
    }

    public function all_slider(){
       $all_sliders=Slider::all();
        return view('backend.slider.all_slider',compact('all_sliders'));
    }
     public function unactive_slider($slider_id){
        DB::table('sliders')
            ->where('id',$slider_id)
            ->update(['pub_status'=>0]);
            Toastr::success('Slider Unactive Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_slider');
    }
     public function active_slider($slider_id){
        DB::table('sliders')
            ->where('id',$slider_id)
            ->update(['pub_status'=>1]);
            Toastr::success('Slider Active Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_slider');
    }

     public function deleteslider($slider_id){
          
       $slider=Slider::find($slider_id);
        if(file_exists('slider/'.$slider->image)){
            unlink('slider/'.$slider->image);
        }
        $slider->delete();
         Toastr::success('Slider Deleteted', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/all_slider');        
     }
}
