<?php

namespace App\Http\Controllers\admin;

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
class allowner extends Controller
{
    public function index()
    {
        $record = owner_detail::all();
        return view('dashboard.admin.allowner',compact('record'));
    }
}
