<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\hostel_detail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Mail;
 use Storage;
 use Validator;
 use App\Models\booking;
 use RealRashid\SweetAlert\Facades\Alert;
class roomassign extends Controller
{
    public function index()
    {
         $ownerid = Auth::guard('owner')->user()->manager_cnic;
        $hostelid =  hostel_detail::where('o_cnic',$ownerid)->get();
        $bookinguser = booking::where('hid',$hostelid[0]->id)->get();
        $ids = $bookinguser->pluck('id')->all();
        // $record = user::select("*")->findMany($ids);
      $record = user::join('bookings', function ($join) {
            $join->on('users.id', '=', 'bookings.uid')->where('status','Accepted');
                })->findMany($ids);
        return view('dashboard/owner/roomassign',compact('record'));
    }
    public function roomno(Request $req)
    {
       $save = booking::where('id',$req->id)->update(['roomno'=>$req->roomno]);
    
        return redirect()->back();
    }
}
