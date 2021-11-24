<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\RecordBooking;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\NotifyBooking;
use Auth;

class BookingController extends Controller
{
    public function save_booking(Request $request){
       $this->validate($request,[
            'name'=>'required',
            'email'=>"required|email",
            'phone_no'=>'required',
            'service_name'=>"required",
         ]);
        $booking=new Booking();
        $booking->owner_name=$request->name;
        $booking->email=$request->email;
        $booking->phone_no=$request->phone_no;
        $booking->package=$request->service_name;
        $booking->save();
        $rb=new RecordBooking();
        $rb->owner_name=$request->name;
        $rb->email=$request->email;
        $rb->phone_no=$request->phone_no;
        $rb->package=$request->service_name;
        $rb->save();
        $booking->notify(new NotifyBooking($booking));
        Toastr::success('Your Booking Successifully', 'Success', ["positionClass" => "toast-top-center"]);
	    return redirect('/');
    }
    public function booking_list(){
      if (Auth::check()) {
        $booking_lists=Booking::orderBy('id','desc')->get();
        return view('backend.package.booking_list',compact('booking_lists'));
         }
       return redirect('/login');
    }
      public function unactive_booking($id){
        DB::table('bookings')
            ->where('id',$id)
            ->update(['pub_status'=>0]);
            Toastr::success('Booking Confirm Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/booking_list');
    }
     public function active_booking($id){
        DB::table('bookings')
            ->where('id',$id)
            ->update(['pub_status'=>1]);
            Toastr::success('Booking Unconfirm Successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/booking_list');
    }
     public function delete_booking($id){
            Booking::find($id)->delete();
            Toastr::success('Booking Deleted', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/booking_list');
    }
    public function all_booking_delete(Request $req){
        $delid=$req->delid;
        Booking::whereIn('id',$delid)->delete();
            Toastr::success('Booking Deleted', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect('/booking_list');
    }
    public function booking_list_record(){
        if (Auth::check()) { 
         $record_booking_lists=RecordBooking::orderBy('id','desc')->get();
        return view('backend.package.record_booking_list',compact('record_booking_lists'));
         }
       return redirect('/login'); 
    }
}

