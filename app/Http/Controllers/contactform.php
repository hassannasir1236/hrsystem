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
use App\Models\contactwithus;
use Notification;
use App\Notifications\MyFirstNotification;
use Response;
class contactform extends Controller
{
    public function index(Request $req)
    {
        $req->validate([
        'name'=>'required',
        'email' => 'required',
        'subject' => 'required|min:3',
        'usermessage'=> 'required|max:200'
        ],[
            'email.required' => 'This email is not exist in our record.',
            'usermessage.required'=>'What is your message please write something.',
            'subject.required'=>'What is your subject please write something.'
            ]);
        $email = "hassannasir6321@gmail.com";
        $details=[
                'greeting'=>$req->name,
                'body'=>$req->subject,
                'line'=>$req->usermessage,
                'actiontext'=> 'Lotus Hostel',
                'actionurl'=>'http://localhost:8000/admin/admin_login',
            ];
            Notification::route('mail', $email)->notify(new MyFirstNotification($details));
          $contactwithus = new  contactwithus();
          $contactwithus->name =$req->name;
          $contactwithus->email =$req->email;
          $contactwithus->subject =$req->subject;
          $contactwithus->usermessage =$req->usermessage;
          $save = $contactwithus->save();
          if($save){
       
            return back()->with('success','Your requset has been submit to admin.so our team contact you with in 24 hours');
          }else{
             return back()->with('fail','Fail please try again.');
          }
    }
}
