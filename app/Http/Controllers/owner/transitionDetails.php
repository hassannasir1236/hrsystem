<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\hostel_detail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Mail;
 use Storage;
 use Validator;
 use App\Models\owner_detail;
 use RealRashid\SweetAlert\Facades\Alert;
 use App\Models\transition;
class transitionDetails extends Controller
{
    public function index()
    {
        $check = transition::where('oid',Auth::id())->first();
        if (isset($check)) {
            $record = transition::where('oid',Auth::id())->get();
            return view('dashboard.owner.transitionDetails',compact('record'));
        }else{
            return view('dashboard.owner.transitionDetails');
        }
        
    }
    public function transitionDetails(Request $req)
    {
        $req->validate([
            'method' => 'required',
            'account_title' => 'required|max:20',
            'account_no' => 'required|digits:11',
        ]);
        $ocnic =  owner_detail::where('id', Auth::id())->first();
        $hrecord = hostel_detail::where('o_cnic',Auth::guard('owner')->user()->manager_cnic)
                    ->first();
        $transition = new transition;
        $transition->hid  = $hrecord->id;
        $transition->oid  = Auth::id();
        $transition->method  = $req->method;
        $transition->account_title =$req->account_title;
        $transition->account_no  =$req->account_no;
        $transition->save(); 
        $check = transition::where('oid',Auth::id())->first();
        if (isset($check)) {
            $success = 'Your transition details has been saved';
            $record = transition::where('oid',Auth::id())->get();
            return view('dashboard.owner.transitionDetails',compact('record','success'));
        }else{
            return view('dashboard.owner.transitionDetails');
        }
    }
    public function edit($id)
    {
        $record = transition::where('id',$id)->first();
        return view('dashboard.owner.edittransition',compact('record'));
    }
    public function editvalue(Request $req)
    {
        $req->validate([
            'method' => 'required',
            'account_title' => 'required|max:20',
            'account_no' => 'required|digits:11',
        ]);
        $ocnic =  owner_detail::where('id', Auth::id())->first();
        $record = hostel_detail::where('o_cnic',Auth::guard('owner')->user()->manager_cnic)
                    ->first();
        $save = transition::where('id',$req->id)->update(
                ['method' => $req->method],
                ['account_title' => $req->account_title],
                ['account_no' => $req->account_no]
        );
        $check = transition::where('oid',Auth::id())->first();
        if (isset($check)) {
            $success = 'Your transition details has been updated successfully.';
            $record = transition::where('oid',Auth::id())->get();
            // return view('dashboard.owner.transitionDetails',compact('record','success'));
             return redirect()->route('owner.transitionDetails')->with('success','Your transition details has been deleted Successfully.');
        }else{
            // return view('dashboard.owner.transitionDetails');
             return redirect()->route('owner.transitionDetails')->with('success','Your transition details has been deleted Successfully.');
        }

    }
    public function delete_transition($id)
    {
         $ocnic =  owner_detail::where('id', Auth::id())->first();
        $record = hostel_detail::where('id',$id)
                    ->first();
        $check = transition::where('oid',Auth::id())->first();
        $delete = transition::where('id',$id)->delete();
        if (isset($check)) {
            $success = 'Your transition details has been updated successfully.';
            $record = transition::where('oid',Auth::id())->get();
            // return url('dashboard.owner.transitionDetails',compact('record','success'));
            return redirect()->route('owner.transitionDetails')->with('success','Your transition details has been deleted Successfully.');
        }else{
          return redirect()->route('owner.transitionDetails')->with('success','Your transition details has been deleted Successfully.');
        }
        
    }
}
