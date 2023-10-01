<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\verifyuser;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Mail;
 use Storage; 
class usercontroller extends Controller
{
    // password Regular Expression

    // profile register 
    // 'myphoto' => 'required|mimes:jpeg,png,jpg,gif|max:2048', 
    //     'front_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
    //     'back_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
    // 'password' => [
        //     'required',
        //     'string',
        //     'min:10',             // must be at least 10 characters in length
        //     'regex:/[a-z]/',      // must contain at least one lowercase letter
        //     'regex:/[A-Z]/',      // must contain at least one uppercase letter
        //     'regex:/[0-9]/',      // must contain at least one digit
        //     'regex:/[@$!%*#?&]/', // must contain a special character
        // ], 
    function create(Request $req){
       $req->validate([ 
        'fname' => 'required|regex:/^[a-z A-Z]+$/u',
        'lname' => 'required|regex:/^[a-z A-Z]+$/u',
        'gender'=>'required',
        'cnic' => 'required|digits:13',
        'phoneno' => 'required|regex:/^((\+92)?(0092)?(92)?(0)?)(3)([0-9]{9})$/|digits:11',
        'country' => 'required',
        'state' => 'required',
        'city' => 'required',
        'address' => 'required',
        'email' => 'required|regex:/(.*)@gmail\.com/i|email|unique:users,email',
        'password' => 'required|min:3',
        'con_password' => 'required|min:3|same:password', 
                 
        ]);
        $user = new User();
        //dd($req->file('myphoto'));
        if($req->file('myphoto')){
            echo "string";
            $file1= $req->file('myphoto');
            $filename1= date('YmdHi').$file1->getClientOriginalName();
                  $file1-> move(public_path('../public/user_upload'), $filename1);
              
            }
            if ($req->file('front_photo')) {
                $file2= $req->file('front_photo');
                $filename2= date('YmdHi').$file2->getClientOriginalName();
                $file2-> move(public_path('../public/user_upload'), $filename2);
            }
            if ($req->file('back_photo')) {
                $file3= $req->file('back_photo');
                $filename3= date('YmdHi').$file3->getClientOriginalName();
                $file3-> move(public_path('../public/user_upload'), $filename3);
            }
            
            
             $user->fname=$req->fname;
            $user->lname=$req->lname;
            $user->gender=$req->gender;
            $user->cnic=$req->cnic;
            $user->cnic_digit=$req->cnic_digit;
            $user->phoneno=$req->phoneno;
            $user->country=$req->country;
            $user->state=$req->state;
            $user->city=$req->city;   
            $user->address=$req->address;
            $user->email=$req->email;
            // $user->myphoto=$file1->getClientOriginalName();
            // $user->front_photo=$file2->getClientOriginalName();
            // $user->back_photo=$file3->getClientOriginalName();
            // $user['avatar']= $filename1;
            // $user['front_new_photo']= $filename2;
            // $user['back_new_photo']= $filename3;
            $user->remember_token=$req->_token;
            $user->password= Hash::make($req->password);
            
            $user->save();

            $last_id = $user->id;
            $token = $last_id.hash('sha256',\Str::random(120));
            $verifyurl = route('user.verify',['token'=>$token,'service'=>'Email_verification']);
            verifyuser::create([
                'user_id'=>$last_id,
                'token'=>$token,
            ]);
            $message = 'Dear <b>'.$req->name.'</b>';
            $message.= 'Thanks for signing up,we just need you to verify email address to complete setting up your account.';
            $mail_data = [
                'recipient'=>$req->email,
                'fromEmail'=>$req->email,
                'fromName'=>$req->name,
                'subject'=>'Email Verification',
                'body'=>$message,
                'actionlink'=>$verifyurl,
            ];
            \Mail::send('email_template',$mail_data,function($message) use ($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'],$mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });
           if($user){
            /*return back()->with('success','Congrats your information is store,Then you need to verify your account.we have sent you an activition link, please check your Email inbox/spam');*/
            return redirect('user/resendverification')->with('success','Congrats your information is store,Then you need to verify your account.we have sent you an activition link, please check your Email inbox/spam');
        }else{
          return back()->with('fail','Information is not Store for some missing details.');  
        }
    } 
    public function resendverification(Request $req)
    {
        $req->validate([ 
        'email' => 'required|regex:/(.*)@gmail\.com/i|email|exists:users,email',        
        ]);
        $user = User::where('email',$req->email)->first();
      
         $last_id = $user->id;
            $token = $last_id.hash('sha256',\Str::random(120));
            $verifyurl = route('user.verify',['token'=>$token,'service'=>'Email_verification']);
            if (isset($user->email)) {
                // code...
            
            verifyuser::where('user_id',$last_id)->update([
                
                'token'=>$token,
            ]);
            $message = 'Dear <b>'.$req->name.'</b>';
            $message.= 'Thanks for signing up,we just need you to verify email address to complete setting up your account.';
            $mail_data = [
                'recipient'=>$req->email,
                'fromEmail'=>$req->email,
                'fromName'=>$req->name,
                'subject'=>'Email Verification',
                'body'=>$message,
                'actionlink'=>$verifyurl,
            ];
            \Mail::send('email_template',$mail_data,function($message) use ($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'],$mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });
           if($user){
            return back()->with('success','Congrats your information is store,Then you need to verify your account.we have sent you an activition link, please check your Email inbox/spam');
        }else{
          return back()->with('fail','Information is not Store for some missing details.');  
        }
    }else{
         return back()->with('fail','This email is not register please Register first.');  
    }

       // return view('dashboard.user.resendverification');
    }
    public function verify(Request $req)
    {
        $token = $req->token;
        $verifyuser = verifyuser::where('token',$token)->first();
        
        if (!is_null($verifyuser)) {
           
           $user = $verifyuser->user;
           
           if(!$user->email_verified){
            $verifyuser->user->email_verified =1;
            $verifyuser->user->save();
            return redirect()->route('user.user_login')->with('info','Your email is verified successfully.You can now login.')->with('verifyemail',$user->email);
            }else{
                return redirect()->route('user.user_login')->with('info','Your email is already verified.You can now login.')->with('verifyemail',$user->email);
            }
        }else{
             return redirect()->route('user.user_login')->with('fail','Your email is not Register,Please register first then login')->with('verifyemail',$user->email);
        }
    }
     function check(Request $req){
        $req->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:3',           
        ],[
            'email.exists' => 'This email is not exist user-record'
            ]);
        $logindata= $req->only('email','password');
        if(Auth::guard('web')->attempt( $logindata)){
            return redirect()->route('/');
        }else{
            return redirect()->route('user.user_login')->with('fail','incroect email and password and other fields');
        }
    }
    function logout()
    {
     Auth::guard('web')->logout();
     return redirect('/user/user_login');
    }

    // forget passwrod function
    function showforgetpassword()
    {
        return view('dashboard.user.forgot');
    }
    function sendresetlink(Request $req){
           $req->validate([ 
        'email' => 'required|email|exists:users,email',           
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
            $message->from('hassannasir6321@gmail.com','Hostel Booking');
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
            user::where('email',$req->email)->update([
                'password'=>Hash::make($req->password),
            ]);
            DB::table('password_resets')->where([
                'email'=>$req->email
            ])->delete();
            return redirect('user/user_login')->with('success','your password has been change');
        }
    }
}
