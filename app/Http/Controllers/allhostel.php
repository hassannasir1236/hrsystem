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
use App\Models\pagecount;
use App\Models\booking;
use App\Models\transition;
class allhostel extends Controller
{
    public function allhostel($id)
    { 
        if(Auth::id()){
            $check = pagecount::where('uid',Auth::id())->where('hid',$id)->first();
            if(isset($check)){
                // $pagecount = new pagecount;
                // $pagecount->uid = Auth::id();
                // $pagecount->hid = $id;
                // $pagecount->save();
            }else{
                 $pagecount = new pagecount;
                $pagecount->uid = Auth::id();
                $pagecount->hid = $id;
                $pagecount->save();
            }
        }
        $data = hostel_detail::where('id',$id)->first();
        $hid = $data->id; 
        if($data){
        $cnic = $data->o_cnic;
        $h_city = $data->h_city;
        $h_latitude=$data->h_latitude;
        $h_longitude=$data->h_longitude;
        $ownerData = owner_detail::where('manager_cnic',$cnic)->first();
        $ownerEmail = $ownerData->email;
        $ownerid = $ownerData->id;
        $recomand = hostel_detail::where('h_city',$h_city)->latest()->limit('6')->get();
        $pagecount = pagecount::where('hid',$id)->count();
        $paymentStatus = booking::where('hid',$hid)->first();
        $transitionDetails = transition::where('hid',$hid)->get();
        return view('allhostel',compact('data','ownerData','recomand','h_latitude','h_longitude','hid','ownerEmail','ownerid','pagecount','paymentStatus','transitionDetails')); 
        }else{
            return redirect('/hostel');
        }
    }
    public function transition_save(Request $req)
    {
        $req->validate([
            'txno' => 'required',
            'amount' => 'required',
        ]);
        $save = booking::where('hid',$req->hid)->where('uid',Auth::id())->update([
            'txno'=>$req->txno,
            'amount'=>$req->amount
        ]);
        if($save){
            // return url('success','Congrats Your payment details can be share with hostel owner.');
            return redirect()->route('hostel')->with('success','Congrats Your payment details can be share with hostel owner.');
        }else{
             // return back('fail','Something Wrong, Please Try again.');
             return redirect()->route('hostel')->with('fail','Something Wrong, Please Try again.');
        }
        dd($req->all());
    }
}
