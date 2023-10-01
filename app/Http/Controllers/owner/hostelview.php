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
use App\Models\user;
use App\Models\hostel_detail;
use App\Models\pagecount;
class hostelview extends Controller
{
    public function index()
    {
        $idarray = [];
        $record = pagecount::where('hid',Auth::id())->count();
        $data = pagecount::where('hid',Auth::id())->get();
        foreach ($data as $key => $value) {
            $idarray[$key]= $value->id;
        }
        $result = user::whereIn('id', $idarray)->select('*')->get();
       return view('dashboard.owner.hostelview',compact('idarray','record','result'));
    }
}
