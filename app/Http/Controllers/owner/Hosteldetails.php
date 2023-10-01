<?php

namespace App\Http\Controllers\owner;

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
use App\Models\hostel_detail;
use App\Models\pagecount;
class Hosteldetails extends Controller
{
    public function hosteldetails()
    {
        $cnic = Auth::guard('owner')->user()->manager_cnic;
       $data = hostel_detail::where('o_cnic',$cnic)->first();
        $pagecount = pagecount::where('hid',Auth::id())->count();
       return view('dashboard.owner.hostel_details',compact('data','pagecount')); 
    }
}
