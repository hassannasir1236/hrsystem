<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\owner_detail;
use App\Models\admin;
use App\Models\hostel_detail;
use App\Models\user;
use App\Models\booking;
use App\Models\contactwithus;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Mail;
 use Notification;
 use App\Notifications\MyFirstNotification;
 use Storage;
 use Validator;

class adminhome extends Controller
{
     public function index()
    {
        $alluser = user::count();
        $allowner = owner_detail::count();
        $allhostel = hostel_detail::count();
        $todaymail = contactwithus::whereDate('created_at',Carbon::today())->count();
        $todaymaildata = contactwithus::orderBy('id', 'DESC')->get();
        // **************
        // ***********
        // Line Chart For User 
        // ***********
        // **************
    //    $userPerMonth= array();

    // for ($i=1; $i<=12; $i++){
    //     $age= 12 - $i;
    //     $userPerMonth[$i] = count(user::whereNotIn('id', [0])
    //                          ->whereYear('created_at', date('Y'))
    //                         ->whereMonth('created_at', '=', date('n') -$age)->get());
    // }
    
    // dd($userPerMonth);
         $users = User::select('id', 'created_at')
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

$lastusers = User::select('id', 'created_at')
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

   //     $LastYearMonth= array();

   //           $dateS = Carbon::now()->startOfMonth()->subMonth(12);
   //  $dateE = Carbon::now()->endOfMonth();
   //  for ($i=1; $i<=12; $i++){
   //      $age= 12 - $i; 
   //  $LastYearMonth[$i] = DB::table('users')
   //              ->select('created_at','id')
   //              ->whereMonth('created_at', '=', date('n') -$age)
   //              ->whereBetween('created_at',[$dateS,$dateE])
   //              ->count();
   //          }
   // dd($LastYearMonth);


    // **************
    // ***********
    // Area Chart For Hostel 
    // ***********
    // ************** 
    //         $HostelPerMonth= array();

    // for ($i=1; $i<=12; $i++){
    //     $age= 12 - $i;
    //     $HostelPerMonth[$i] = count(hostel_detail::whereNotIn('id', [0])
    //                         ->whereYear('created_at', date('Y'))
    //                         ->whereMonth('created_at', '=', date('n') -$age)->get());
    // }

    // This Year Record
     $hostel_detail = hostel_detail::select('id', 'created_at')
         ->whereYear('created_at', date('Y'))
        ->get()
        ->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

    $usermcount = [];
    $HostelPerMonth = [];

    foreach ($hostel_detail as $key => $value) {
        $usermcount[(int)$key] = count($value);
    }

    $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    for ($i = 1; $i <= 12; $i++) {
        if (!empty($usermcount[$i])) {
            $HostelPerMonth[$i] = $usermcount[$i];
        } else {
            $HostelPerMonth[$i] = 0;
        }
        // $userPerMonth[$i]['month'] = $month[$i - 1];
    }
    
   // dd($HostelPerMonth);

    // Last Year Record
    //    $LastYearMonthHostel= array();

    //          $dateS = Carbon::now()->startOfMonth()->subMonth(12);
    // $dateE = Carbon::now()->startOfMonth();
    // for ($i=1; $i<=12; $i++){
    //     $age= 12 - $i; 
    // $LastYearMonthHostel[$i] = DB::table('hostel_details')
    //             ->select('created_at','id')
    //             ->whereMonth('created_at', '=', date('n') -$age)
    //             ->whereBetween('created_at',[$dateS,$dateE])
    //             ->count();
    //         }
 // Last Year Record
$hostel_detaillastyear = hostel_detail::select('id', 'created_at')
         ->whereYear('created_at', date('Y', strtotime('-1 year')))
        ->get()
        ->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

    $usermcountlast= [];
    $LastYearMonthHostel = [];

    foreach ($hostel_detaillastyear as $key => $value) {
        $usermcountlast[(int)$key] = count($value);
    }

    $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    for ($i = 1; $i <= 12; $i++) {
        if (!empty($usermcountlast[$i])) {
            $LastYearMonthHostel[$i] = $usermcountlast[$i];
        } else {
            $LastYearMonthHostel[$i] = 0;
        }
        // $userPerMonth[$i]['month'] = $month[$i - 1];
    }





             //dd($LastYearMonthHostel);

    // **************
    // ***********
    // Bar Chart For Hostel owner
    // ***********
    // **************  
    //          $HostelOwnerPerMonth= array();

    // for ($i=1; $i<=12; $i++){
    //     $age= 12 - $i;
    //     $HostelOwnerPerMonth[$i] = count(owner_detail::whereNotIn('id', [0])
    //                         ->whereYear('created_at', date('Y'))
    //                         ->whereMonth('created_at', '=', date('n') -$age)->get());
    // }
     $owner_detail = owner_detail::select('id', 'created_at')
         ->whereYear('created_at', date('Y'))
        ->get()
        ->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

    $usermcount = [];
    $HostelOwnerPerMonth = [];

    foreach ($hostel_detail as $key => $value) {
        $usermcount[(int)$key] = count($value);
    }

    $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    for ($i = 1; $i <= 12; $i++) {
        if (!empty($usermcount[$i])) {
            $HostelOwnerPerMonth[$i] = $usermcount[$i];
        } else {
            $HostelOwnerPerMonth[$i] = 0;
        }
        // $userPerMonth[$i]['month'] = $month[$i - 1];
    }
    
    // dd($HostelOwnerPerMonth);
    // ***********
    // ******
    // Last Year Record
    // *********
    // **************
    //    $LastYearMonthHostelOwner= array();

    //          $dateS = Carbon::now()->startOfMonth()->subMonth(12);
    // $dateE = Carbon::now()->startOfMonth();
    // for ($i=1; $i<=12; $i++){
    //     $age= 12 - $i; 
    // $LastYearMonthHostelOwner[$i] = DB::table('owner_details')
    //             ->select('created_at','id')
    //             ->whereMonth('created_at', '=', date('n') -$age)
    //             ->whereBetween('created_at',[$dateS,$dateE])
    //             ->count();
    //         }





           
        $owner_detaillastyear = owner_detail::select('id', 'created_at')
         ->whereYear('created_at', date('Y', strtotime('-1 year')))
        ->get()
        ->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

    $usermcountlast= [];
    $LastYearMonthHostelOwner = [];

    foreach ($owner_detaillastyear as $key => $value) {
        $usermcountlast[(int)$key] = count($value);
    }

    $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    for ($i = 1; $i <= 12; $i++) {
        if (!empty($usermcountlast[$i])) {
            $LastYearMonthHostelOwner[$i] = $usermcountlast[$i];
        } else {
            $LastYearMonthHostelOwner[$i] = 0;
        }
        // $userPerMonth[$i]['month'] = $month[$i - 1];
    } 
            // dd($LastYearMonthHostel);

    // **************
    // ***********
    // Donut Chart For User Booking 
    // ***********
    // ************** 
            $PendingRecord = booking::whereMonth('created_at', date('n', strtotime('-1 month')))
                ->where('status','Pending')
                ->count();
            $RejectedRecord = booking::whereMonth('created_at', date('n', strtotime('-1 month')))
            ->where('status','Rejected')
            ->count();
            $AcceptedRecord = booking::whereMonth('created_at', date('n', strtotime('-1 month')))
                ->where('status','Accepted')
                ->count();
            $bookingcount = booking::whereMonth('created_at', date('n', strtotime('-1 month')))
                                ->count();
               
            $BookingRecordThisMonth = array();
            $BookingRecordThisMonth[1] = ($RejectedRecord/$bookingcount)*100;
            $BookingRecordThisMonth[2] = ($AcceptedRecord/$bookingcount)*100;
            $BookingRecordThisMonth[3] = ($PendingRecord/$bookingcount)*100;
        // dd($BookingRecordThisMonth);

        // random work for testing
          
            //dd($users);


        return view('dashboard.admin.home', compact('userPerMonth','LastYearMonth','HostelPerMonth','LastYearMonthHostel','HostelOwnerPerMonth','LastYearMonthHostelOwner','BookingRecordThisMonth','alluser','allowner','allhostel','todaymail','todaymaildata'));
    }
    public function sendmail(Request $req)
    {
         $req->validate([
        'subject' => 'required',
        'usermessage' => 'required',           
        ]);
         $data = contactwithus::where('id',$req->userid)->first();
         $email =  $data->email;
         $details=[
                'greeting'=>$data->name,
                'body'=>$req->subject,
                'line'=>$req->usermessage,
                'actiontext'=> 'Lotus Hostel',
                'actionurl'=>'http://localhost:8000/admin/admin_login',
            ];
       // $sendmail =;
 
       if( Notification::route('mail',$email)->notify(new MyFirstNotification($details))){
       
            return back()->with('success','Your mail has been submit to user.');
          }else{
             return back()->with('success','Your mail has been submit to user.');
          }
    }
} 
