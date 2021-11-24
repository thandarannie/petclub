<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class FeedbackController extends Controller
{
    public function save_feedback(Request $request){
    	$this->validate($request,[
            'name'=>'required',
            'email'=>"required",
            'message'=>"required",
         ]);
    	$feedback=new Feedback();
    	$feedback->name=$request->name;
    	$feedback->email=$request->email;
    	$feedback->message=$request->message;

    	$image=$request->file('image');
        if(isset($image)){
            $currentDate=now()->toDateString();
            $imagename=$currentDate.'_'.uniqid().'.'.
            $image->getClientOriginalExtension();
            if(!file_exists('feedback')){
                mkdir('feedback', 0777,true);
            }
            $image->move('feedback',$imagename);
        }else{
            $imagename='default.png';
        }
        $feedback->image=$imagename;
        $feedback->save();
        Toastr::success('Thak you!! for your feedback', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/'); 
    }
    public function unactive_feedback($id){
        DB::table('feedback')
            ->where('id',$id)
            ->update(['pub_status'=>0]);
            Toastr::success('Feedback Unactive Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/dashboard');
    }
     public function active_feedback($id){
        DB::table('feedback')
            ->where('id',$id)
            ->update(['pub_status'=>1]);
            Toastr::success('Feedback active  Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/dashboard');
    }
    public function delete_feedback($id){
     $feedback=Feedback::find($id);
        if(file_exists('feedback/'.$feedback->image)){
            unlink('feedback/'.$feedback->image);
        }
        $feedback->delete();
            Toastr::success('Feedback Deleted', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/dashboard');
    }
}
