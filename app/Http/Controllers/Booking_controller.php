<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Storage;
use Illuminate\Support\Facades\File;
use App\Models\owner_detail;
use App\Models\hostel_detail;
use App\Models\booking;
use Notification;
use App\Notifications\MyFirstNotification;
class Booking_controller extends Controller
{
    public function index(Request $req)
    {
        $req->validate([
            'people' => 'required',
        ]);
        $condition = booking::where('uid',$req->uid)->where('hid',$req->hid)->first();
        $email = $req->ownerEmail;
        $ownerdetails = owner_detail::where('email',$email)->first();
        $ownerName = $ownerdetails->manager_name;
       $details=[
                'greeting'=>$ownerName,
                'body'=>'Sir, New user can request a booking for room please verify the details and assign the room according to your requirement.',
                'actiontext'=> 'Lotus Hostel',
                'actionurl'=>'http://localhost:8000/',
                'line'=>'Thank you for using our application!'
            ];
                // Notification::send($email,new MyFirstNotification($details));
              
        if (isset($condition)) {
            return back()->with('info','You already book this hostel');
        }else{
        Notification::route('mail', $email)->notify(new MyFirstNotification($details));
      $booking = new booking();
      $booking->uid =$req->uid;
      $booking->hid =$req->hid;
      $booking->oid =$req->ownerid;
      $booking->status ='Pending';
      $booking->people =$req->people;
      $booking->message =$req->message;
      $save = $booking->save();
      if($save){
   
        return back()->with('success','Your booking is Pending after Complete these process your booking confirm');
      }else{
         return back()->with('fail','Fail please try again.');
      }
     }

    }
}
