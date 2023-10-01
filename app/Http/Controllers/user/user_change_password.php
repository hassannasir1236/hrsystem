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
class user_change_password extends Controller
{
    public function index()
    {
        return view('dashboard.user.password');
    }
    public function password(Request $req)
    {
        $req->validate([
            'old_password' => 'required|min:3',
            'new_password' => 'required|min:3',
            'confirm_password' => 'required|min:3|same:new_password',
        ]);
        $auth = Auth::guard('web')->user();
        if (!Hash::check($req->get('old_password'), $auth->password))
        {
            return back()->with('fail', "Old Password is Invalid");
        }else{
            $user =  user::find($auth->id);
            $user->password =  Hash::make($req->new_password);
            $user->save();
            return back()->with('success', "Password Changed Successfully");
        }
    }
}
