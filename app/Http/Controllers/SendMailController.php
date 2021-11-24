<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Booking;
use DB;
use Session;
use App;
use Auth;

class SendMailController extends Controller
{
     public function index($id){
     if (Auth::check()) {
         $booking=Booking::find($id);
        
        return view('backend.mail.send_mail',compact('booking'));
      }
       return redirect('/login');
       
    }
    public function inbox(){
    	return view('backend.mail.inbox');
    }
    public function send(Request $request){
    	$this->validate($request,[
            'email'=>'required',
            'subject'=>"required",
            'message'=>'required',
         ]);
    	$data=array(
        'email'=>$request->email,
        'subject'=>$request->subject,
        'bodyMessage'=>$request->message,
        'a_file'=>$request->a_file,
    	);
    	Mail::send('backend.mail.content', $data ,function($message) use ($data){
    		$message->to($data['email']);
    		$message->subject('Welcome From Pet Club');
    		$message->from('yelwin030@gmail.com');;
    		$message->attach($data['a_file']->getRealPath(),array(
              'as' =>'a_file.'.$data['a_file']->getClientOriginalExtension(),
              'mime'=>$data['a_file']->getMimeType()
    		));
    	});
         DB::table('bookings')
            ->where('id',$request->book_id)
            ->update(['pub_status'=>0]);
    	return redirect('/booking_list');
       }
}
