<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\owner_detail;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Mail;
 use Storage;
 use Validator;

class admin_controller extends Controller
{
     function check(Request $req){
        $req->validate([
        'email' => 'required|email|exists:admins,email',
        'password' => 'required|min:3',           
        ],[
            'email.exists' => 'This email is not exist Admin-record'
            ]);
        $logindata= $req->only('email','password');
        //s dd($logindata);
        if(Auth::guard('admin')->attempt($logindata)){
            return redirect('admin/home');
        }else{
            return redirect()->route('admin.admin_login')->with('fail','incroect email and password and other fields');
        }
    }
    function logout()
    {
     Auth::guard('admin')->logout();
     return redirect('/admin/admin_login');
    }

    // forget passwrod function
    function showforgetpassword()
    {
        return view('dashboard.user.forgot');
    }
    function sendresetlink(Request $req){
           $req->validate([ 
        'email' => 'required|email|exists:userdetails,email',           
        ]);
           $token = Str::random(64);
           DB::table('password_resets')->insert([
            'email'=>$req->email,   
            'token'=>$token,
            'created_at'=>Carbon::now(),
           ]);
          $actionlink=route('user.reset.password.form',['token'=>$token,'email'=>$req->email]);
        $body="we are received the request the password".$req->email;
        Mail::send('layouts/email-forgot',['actionlink'=>$actionlink,'body'=>$body],function($message) use ($req)  {
            $message->from('info@cuisahiwal.com','your app');
              $message->to($req->email,'your app')->subject('reset password ');

        });
           return back()->with('success','Email password reset link send');
    }
     public function showresetform(Request $req  , $token=null)
    {
        // code...
        return view('dashboard.user.reset')->with(['token'=>$token , 'email'=>$req->email]);
    }
    public function resetpassword(Request $req)
    {
        $req->validate([
        'email' => 'required|email',
        'password' => 'required|min:3',
        'cpassword' => 'required|min:3|same:password',           
        ]);
        $check=DB::table('password_resets')->where([
            'email'=>$req->email,
            'token'=>$req->token,
        ]);
        if(!$check){
            return redirect('user.login')->With('fail','invalid token');
        }else{
            userdetails::where('email',$req->email)->update([
                'password'=>Hash::make($req->password),
            ]);
            DB::table('password_resets')->where([
                'email'=>$req->email
            ])->delete();
            return redirect('user/login')->with('success','your password has been change');
        }
    }
}
