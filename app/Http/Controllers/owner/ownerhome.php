<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\owner_detail;
use App\Models\hostel_detail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Mail;
 use Storage;
 use Validator; 
 use App\Models\booking;
 Use Alert; 
 use App\Models\pagecount;
class ownerhome extends Controller
{
    public function home(Request $req)
    {
        $count = booking::where('oid',Auth::id())->count();
        $PendingRoom = booking::where('status','Pending')
                        ->where('oid',Auth::id())->count();
        $TotalUser = booking::where('oid',Auth::id())->count();
        $RoomAssign = booking::where('oid',Auth::id())
                        ->where('status','Accepted')->count();
        $revenueMonth = booking::whereBetween('created_at', 
                            [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
                        )->get()->count();


        // Hostel Overview Last month
        // Rejected uesr
        $RejectUser_current_month = booking::whereMonth('created_at',                             Carbon::now()->month)
                                    ->where('oid',Auth::id())
                                    ->where('status','Rejected')->count('id');
        $RejectUser_LastMonth = booking::whereMonth('created_at',Carbon::now()
                                    ->subMonth()->month) 
                                    ->where('oid',Auth::id())
                                   ->where('status','Rejected')->count('id');
                                  
        if($RejectUser_current_month > $RejectUser_LastMonth){
               $RejectCondition = 'increase';
            }elseif($RejectUser_current_month == $RejectUser_LastMonth){
                $RejectCondition = 'warning';
            }elseif($RejectUser_current_month < $RejectUser_LastMonth){
                    $RejectCondition = 'decrease';
            }
            // Room Booking
        $RoomBooking_current_month = booking::whereMonth('created_at',                                 Carbon::now()->month)
                                    ->where('oid',Auth::id())
                                    ->where('status','Accepted')->count('id');
        $RoomBooking_LastMonth = booking::whereMonth('created_at',Carbon::now()
                                    ->subMonth()->month) 
                                    ->where('oid',Auth::id())
                                   ->where('status','Accepted')->count('id');
            if($RoomBooking_current_month > $RoomBooking_LastMonth){
               $BookingCondition = 'increase';
            }elseif($RoomBooking_current_month == $RoomBooking_LastMonth){
                $BookingCondition = 'warning';
            }elseif($RoomBooking_current_month < $RoomBooking_LastMonth){
                    $BookingCondition = 'decrease';
            }
            // REGISTRATION RATE
            $RegisterUser_current_month = booking::whereMonth('created_at',                                 Carbon::now()->month)
                                    ->where('oid',Auth::id())
                                    ->where('status','Pending')->count('id');
            $RegisterUser_LastMonth = booking::whereMonth('created_at',Carbon::now()
                                    ->subMonth()->month) 
                                    ->where('oid',Auth::id())
                                   ->where('status','Pending')->count('id');
            if($RegisterUser_current_month > $RegisterUser_LastMonth){
               $RegistrationCondition = 'increase';
            }elseif($RegisterUser_current_month == $RegisterUser_LastMonth){
                $RegistrationCondition = 'warning';
            }elseif($RegisterUser_current_month < $RegisterUser_LastMonth ){
                    $RegistrationCondition = 'decrease';
            }

            // Data tables pending data
            $PendingUserRecord = booking::join('users', function ($join) {
            $join->on('users.id', '=', 'bookings.uid')
                 ->where('bookings.oid', '=', Auth::guard('owner')->user()->id)
                 ->where('bookings.status', '=', 'Pending');
        })->get();


        // Page view count
            // find hostel id using owner id
            $id = Auth::guard('owner')->user()->id;
            $hid = hostel_detail::where('id',$id)->first();
                $users = pagecount::select('id','hid', 'created_at')
                ->where('hid',$hid->id)
                 ->whereYear('created_at', date('Y'))
                ->get()
                ->groupBy(function ($date) {
                    return Carbon::parse($date->created_at)->format('m');
                });
    $usermcount = [];
    $userPerMonth = [];

    foreach ($users as $key => $value) {
        $usermcount[(int)$key] = count($value);
    }

    $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    for ($i = 1; $i <= 12; $i++) {
        if (!empty($usermcount[$i])) {
            $userPerMonth[$i] = $usermcount[$i];
        } else {
            $userPerMonth[$i] = 0;
        }
        // $userPerMonth[$i]['month'] = $month[$i - 1];
    }
    // dd($userPerMonth);

    //*********
    //*********
    // Last Year user record
    //*********
    //*********

$lastusers = pagecount::select('id', 'created_at')
        ->where('hid',$hid->id)
         ->whereYear('created_at', date('Y', strtotime('-1 year')))
        ->get()
        ->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

    $usermcountlast= [];
    $LastYearMonth = [];

    foreach ($lastusers as $key => $value) {
        $usermcountlast[(int)$key] = count($value);
    }

    $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    for ($i = 1; $i <= 12; $i++) {
        if (!empty($usermcountlast[$i])) {
            $LastYearMonth[$i] = $usermcountlast[$i];
        } else {
            $LastYearMonth[$i] = 0;
        }
        // $userPerMonth[$i]['month'] = $month[$i - 1];
    }


$pagecountuser = pagecount::where('hid',Auth::id())->count();
        return view('dashboard.owner.home',compact('PendingRoom','TotalUser','RoomAssign','RejectUser_current_month','RejectCondition','RoomBooking_current_month',
            'BookingCondition','RegisterUser_current_month','RejectUser_LastMonth','RegistrationCondition','RoomBooking_LastMonth','RegisterUser_LastMonth'
            ,'PendingUserRecord','count','userPerMonth','LastYearMonth','pagecountuser'));
    }
    public function edit($uid,$hid,$status)
    {
       Alert::info('Info Title', 'Info Message');
       if($status == 'PendingPayment'){
        $update = booking::where(['uid'=>$uid,'hid'=>$hid])
        ->update(['payment_status'=>$status]);
       }else{
         $update = booking::where(['uid'=>$uid,'hid'=>$hid])
        ->update([
            'status'=>$status,
            'payment_status'=>''
        ]);
       }
       

       if (isset($update)) {
            return back()->with('success','Status has been update successfully.');
          }else{
            return back()->with('fail','Sorry Your Status has not been update,Please Try Again.'); 
          }
    }
    
}
