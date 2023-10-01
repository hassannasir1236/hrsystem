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
use Illuminate\Support\Facades\File;
use App\Models\admin;
class profile extends Controller
{
    public function UpdateProfile(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'phoneno' => 'required|digits:11',
            'address' => 'required',
        ]);
        $auth = Auth::guard('admin')->user();
        $user =  admin::find($auth->id);
        $user->admin_name = $req->name;
        $user->email = $req->email;
        $user->admin_phoneno = $req->phoneno;
        $user->admin_address = $req->address;
        $user->save();
        return back()->with('success', "Your Profile has been update.");
    }
    public function OwnerImage(Request $req)
    {
         $req->validate([
            'ownerlogo' => 'required|max:2048|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $profile = Auth::guard('admin')->user()->profile;
        $id = Auth::guard('admin')->user()->id;
        $logo =$req->ownerlogo;
//        dd(User::where('id',1));
            $fullImgPath = public_path("profile/".$profile);
            if(File::exists($fullImgPath)) {
                File::delete($fullImgPath);
            }
            if ($image = $req->file('ownerlogo')) {
              
                $imageName = time().uniqid().'.'.$logo->getClientOriginalExtension();

                $logo->move(public_path('profile'), $imageName);
                $update_profile = admin::where('id',$id)->update(
                   [ 'profile'=>$imageName],
                );
                return redirect('admin/profile')->with('success','Business Profile has been upload successfully.');
            }else{
                return redirect('admin/profile')->with('fail','Sorry profile image can not upload Try again please.');
            }

    }
}
