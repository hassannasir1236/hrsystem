<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Storage;
use App\Models\owner_detail;
use App\Models\User;
use App\Models\hostel_detail;
use App\Models\booking;
class user_hosteldetails extends Controller
{
    public function index()
    {
        $checkstatus = booking::where('uid',Auth::id())->first();
        
        if($checkstatus->status=='Accepted'){
            $record = hostel_detail::where('id',$checkstatus->hid)->first();
            return view('dashboard.user.details_status',compact('record','checkstatus'));
        }else{
            return view('dashboard.user.details_status');
            }
        }
}
