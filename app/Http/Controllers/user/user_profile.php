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
 use Illuminate\Support\Facades\File;
class user_profile extends Controller
{
    public function user_UpdateProfile(Request $req)
    {
         // dd($req->all());
        $req->validate([  
        'user_profile' => 'required|max:2048|mimes:jpeg,png,jpg,gif,svg',         
        ]);
       
       
        $data = Auth::user()->my_new_photo;
         $fullImgPath = public_path("profile/".$data);
            if(File::exists($fullImgPath)) {
               $detele = File::delete($fullImgPath);
            }
        if($req->file('user_profile')){ 
            $file1= $req->file('user_profile');
            $filename1= date('YmdHi').$file1->getClientOriginalName();
                  $file1-> move(public_path('profile'), $filename1);
              // $user['avatar']= $filename1;
          $user = User::where('id',Auth::id())->update(
            ['avatar'=>'','my_new_photo'=>$filename1],
            );
             if ($user) {
                return redirect('user/home')->with('success','your image uploded successfully.');
            }else{
                return redirect('user/home')->with('fail','your image can not uploded.Please Try again');
            }
            }else{
               return redirect('user/home')->with('fail','your image can not uploded.Please Try again');
            }
    }
    public function update(Request $req)
    {
        $req->validate([  
        'fname' => 'required',
        'lname' => 'required',
        'gender' => 'required',         
        'cnic' => 'required',
        'phoneno' => 'required',
        'country' => 'required',
        'state' => 'required',
        'city' => 'required',
        'address' => 'required',
        'email' => 'required',
        ]);
        $id = Auth::id();
        $save = User::where('id',$id)->update([
            'fname'=>$req->fname,
            'lname'=>$req->lname,
            'gender'=>$req->gender,
            'cnic'=>$req->cnic,
            'phoneno'=>$req->phoneno,
            'country'=>$req->country,
            'state'=>$req->state,
            'city'=>$req->city,
            'address' => $req->address, 
            'email'=>$req->email,
        ]);

        if (isset($save)) {
            return back()->with('success','Your Information is update successfully.');
        }else{
            return back()->with('fail','Your Information is update successfully.');
        }
    }
}
