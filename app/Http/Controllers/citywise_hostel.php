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

class citywise_hostel extends Controller
{
    public function citywise($id)
    {
     $hosteldata = hostel_detail::where('h_city',$id)->get();
     return view('citywise',compact('hosteldata'));   
    }
}
