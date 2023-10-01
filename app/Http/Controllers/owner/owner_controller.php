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
class owner_controller extends Controller
{
    public function create_hostel(Request $req)
    {
        // password Regular Expression
        // 'password' => [
        //     'required',
        //     'string',
        //     'min:10',             // must be at least 10 characters in length
        //     'regex:/[a-z]/',      // must contain at least one lowercase letter
        //     'regex:/[A-Z]/',      // must contain at least one uppercase letter
        //     'regex:/[0-9]/',      // must contain at least one digit
        //     'regex:/[@$!%*#?&]/', // must contain a special character
        // ],
        // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
  $req->validate([ 
        'h_name' => 'required',
        'h_phoneno' => 'required|digits:11',
        'h_state' => 'required',
        'h_address' => 'required',
        'h_details' => 'required|max:200', 
        'h_slug' => 'required',
        'h_country' => 'required',
        'h_city' => 'required',
        'h_latitude' => 'required',
        'h_longitude' => 'required',
        'filenames' => 'required|max:10048',
         // manager details
        'manager_name' => 'required|regex:/^[a-z A-Z]+$/u',
        'manager_cnic' => 'required|digits:13',
        'manager_phoneno' => 'required|digits:11',
        'email' => 'required|regex:/(.*)@gmail\.com/i|email|unique:owner_details,email',
        'password' => 'required|min:3',
        'manager_conf_password' => 'required|min:3|same:password', 
        // step 2 page
        'h_rent' => 'required',
        'rent_period' => 'required',
        'bills_included' => 'required',
        'letting_type' => 'required',
        'hostel_area' => 'required',
        'h_condition' => 'required',
        'h_floor' => 'required',
        'h_schedule' => 'required',
        'h_bathroom' => 'required',
        'h_mess' => 'required',
        'h_lawn' => 'required',
        'h_occopancy' => 'required',
        // step 3 page
               
        ]);
      
        $owner = new owner_detail([
        'manager_name'=>$req->manager_name,
        'manager_cnic'=>$req->manager_cnic,
        'manager_phoneno'=>$req->manager_phoneno,
        'email'=>$req->email,
        'password'=> Hash::make($req->password),
        'remember_token'=>$req->_token,
        ]);
        
         $files = [];
         $orginal_files = [];
        if($req->file('filenames'))
         {
            foreach($req->file('filenames') as $file)
            {
              $orginal_name = $file->getClientOriginalName();
                $name =  date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('../public/hostelimg_upload'), $name);  
                $files[] = $name;
                $orginal_files[] = $orginal_name;  
            }
         }
        // dd($files);
        $hostel_details = new hostel_detail([
         'o_cnic'=>$req->manager_cnic,
        'h_name'=>$req->h_name,
        'h_phoneno'=>$req->h_phoneno,
        'h_state'=>$req->h_state,
        'h_address'=>$req->h_address,
        'h_category'=>$req->h_category,
        'h_details'=>$req->h_details,
        'h_slug'=>$req->h_slug,
        'h_country'=>$req->h_country,
        'h_city'=>$req->h_city,
        'h_latitude'=>$req->h_latitude,
        'h_longitude'=>$req->h_longitude,
        'filenames'=>join(',', $orginal_files),
        'new_filenames'=>join(',', $files),
        'h_rent'=>$req->h_rent,
        'rent_period'=>$req->rent_period,
        'bills_included'=>$req->bills_included,
        'letting_type'=>$req->letting_type,
        'hostel_area'=>$req->hostel_area,
        'h_condition'=>$req->h_condition,
        'h_floor'=>$req->h_floor,
        'h_schedule'=>$req->h_schedule,
        'h_bathroom'=>$req->h_bathroom,
        'h_mess'=>$req->h_mess,
        'h_lawn'=>$req->h_lawn,
        'h_occopancy'=>$req->h_occopancy,
        'facilities'=>implode(',', $req->facilities),
        ]);
        //dd($hostel_details);
        // dd($owner);

        $owner->save();
        
        $hostel_details->save();
         if($hostel_details){
            return back()->with('success','Congrats your product information is store');
        }else{
          return back()->with('fail','Product is not Store');  
        }
    }
     function check(Request $req){
        $req->validate([
        'email' => 'required|email|exists:owner_details,email',
        'password' => 'required|min:3',           
        ],[
            'email.exists' => 'This email is not exist owner-record'
            ]);
        $logindata= $req->only('email','password');
        // dd($logindata);
        if(Auth::guard('owner')->attempt($logindata)){
            return redirect()->route('owner.home');
        }else{
            return redirect()->route('owner.owner_login')->with('fail','incroect email and password and other fields');
        }
    }
    function logout()
    {
     Auth::guard('owner')->logout();
     return redirect('/owner/owner_login');
    }

    // forget passwrod function
    function showforgetpassword()
    {
        return view('dashboard.owner.forgot');
    }
    function sendresetlink(Request $req){
           $req->validate([ 
        'email' => 'required|email|exists:owner_details,email',           
        ]);
           $token = Str::random(64);
           DB::table('password_resets')->insert([
            'email'=>$req->email,   
            'token'=>$token,
            'created_at'=>Carbon::now(),
           ]);
          $actionlink=route('owner.reset.password.form',['token'=>$token,'email'=>$req->email]);
        $body="we are received the request the password".$req->email;
        Mail::send('layouts/email-forgot',['actionlink'=>$actionlink,'body'=>$body],function($message) use ($req)  {
            $message->from('hassannasir6321@gmail.com','your app');
              $message->to($req->email,'your app')->subject('reset password ');

        });
           return back()->with('success','Email password reset link send');
    }
     public function showresetform(Request $req  , $token=null)
    {
        // code...
        return view('dashboard.owner.reset')->with(['token'=>$token , 'email'=>$req->email]);
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
            return redirect('owner.owner_login')->With('fail','invalid token');
        }else{
            owner_detail::where('email',$req->email)->update([
                'password'=>Hash::make($req->password),
            ]);
            DB::table('password_resets')->where([
                'email'=>$req->email
            ])->delete();
            return redirect('owner/owner_login')->with('success','your password has been change');
        }
    }
}
