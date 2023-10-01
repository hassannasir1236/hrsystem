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
use App\Models\owner_detail;
use App\Models\hostel_detail;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;
class hostel_Setting extends Controller
{
    function hostel_images(){

    $data = hostel_detail::where('o_cnic',Auth::user()->manager_cnic)->first();
       // dd($data);
    foreach(explode(',', $data->new_filenames)  as  $key => $project){
        $myString = $data->new_filenames;
    }
          $myArray = explode(',', $myString);
          foreach($myArray as $i =>$key) {
                $countimage = count($myArray);
            }
    return view('dashboard.owner.hostel_setting',compact('data','countimage'));
    }
    public function DeleteHostelImage($id)
    {

    $data = hostel_detail::where('o_cnic',Auth::user()->manager_cnic)->first();
    
    foreach(explode(',', $data->new_filenames)  as  $key => $project){
        $myString = $data->new_filenames;
    }
          $myArray = explode(',', $myString);
           $myArray = Arr::except($myArray,[$id]);
          // dd(join(',',$myArray));
       $save =   hostel_detail::where('o_cnic',Auth::user()->manager_cnic)
          ->update(['new_filenames'=>join(',',$myArray)]);
          // dd($save);
          if ($save) {
              return redirect('owner/HostelSetting')->with('success','your image deleted Successfully.');
          }else{
             return redirect('owner/HostelSetting')->with('fail','your image is not deleted Please Try again.');
          }
    }
    public function upload(Request $req)
    {
        $req->validate([
            'filenames' => 'required',
        ]);
        foreach(explode(',', $data->new_filenames)  as  $key => $project){
        $myString = $data->new_filenames;
    }
          $myArray = explode(',', $myString);
          foreach($myArray as $i =>$key) {
                $countimage = count($myArray);
            }
            if($countimage>=6){
                 return redirect('owner/HostelSetting')->with('fail','Sorry Your Images can not uploaded Because You can not uploaded more than 6 images.');
            }else{
                    $files = [];
         $orginal_files = [];
        if($req->file('filenames'))
         {
             $data = hostel_detail::where('o_cnic',Auth::user()->manager_cnic)->first();
    
    foreach(explode(',', $data->new_filenames)  as  $key => $project){
        $myString = [$data->new_filenames,];
    }
          $myArray = implode(',', $myString);
           // $myArray = Arr::except($myArray,[$id]);
            $files[]=$myArray;
            foreach($req->file('filenames') as $file)
            {
              $orginal_name = $file->getClientOriginalName();
                $name =  date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('../public/hostelimg_upload'), $name);  
                $files[] = $name;
                $orginal_files[] = $orginal_name;  
            }
         }
         $save =   hostel_detail::where('o_cnic',Auth::user()->manager_cnic)
          ->update(['new_filenames'=>implode(',',$files)]);
          // dd($save);
          if ($save) {
              return redirect('owner/HostelSetting')->with('success','Congrats Your Images has been uploaded Successfully.');
          }else{
             return redirect('owner/HostelSetting')->with('fail','Sorry Your Images can not uploaded Please Try again.');
          }
            }
    }
    public function EditHostelDetails(Request $req)
    {
        $req->validate([ 
        'h_name' => 'required',
        'h_phoneno' => 'required|digits:11',
        'h_state' => 'required',
        'h_address' => 'required',
        'h_details' => 'required|max:200', 
        'h_slug' => 'required',
        'h_category' => 'required',
        'h_country' => 'required',
        'h_city' => 'required',
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
        ]);
        // dd($req->all());
        $save = hostel_detail::where('o_cnic',Auth::user()->manager_cnic)
                ->update([
                    'h_name' => $req->h_name,
                    'h_phoneno' => $req->h_phoneno,
                    'h_state' => $req->h_state ,
                    'h_address' => $req->h_address ,
                    'h_details' => $req->h_details ,
                    'h_slug' => $req->h_slug ,
                    'h_category' => $req->h_category ,
                    'h_country' => $req->h_country ,
                    'h_city' => $req->h_city ,
                    'h_rent' => $req->h_rent ,
                    'rent_period' => $req->rent_period ,
                    'bills_included' => $req->bills_included ,
                    'letting_type' => $req->letting_type ,
                    'hostel_area' => $req->hostel_area ,
                    'h_condition' => $req->h_condition ,
                    'h_floor' => $req->h_floor ,
                    'h_schedule' => $req->h_schedule ,
                    'h_bathroom' => $req->h_bathroom ,
                    'h_mess' => $req->h_mess ,
                    'h_lawn' => $req->h_lawn ,
                    'h_occopancy' => $req->h_occopancy ,
                ]);
             if ($save) {
              return redirect('owner/HostelSetting')->with('success','Congrats Your Hostel details has been update Successfully.');
          }else{
             return redirect('owner/HostelSetting')->with('fail','Sorry Your Hostel details can not update Please Try again.');
          }    
    }
    public function facilities(Request $req)
    {

        $req->validate([
            'facilities' => 'required',
        ],[
             'facilities.required' => 'Please Select Atleast 1 Item'
        ]);
        $save = hostel_detail::where('o_cnic',Auth::user()->manager_cnic)
                ->update([
                    'facilities'=>implode(',', $req->facilities)
                ]);
             if ($save) {
              return redirect('owner/HostelSetting')->with('success','Congrats Your Hostel details has been update Successfully.');
          }else{
             return redirect('owner/HostelSetting')->with('fail','Sorry Your Hostel details can not update Please Try again.');
          }
    }
    public function LocationChanges(Request $req)
    {
        $req->validate([
            'h_latitude' => 'required',
        ],[
             'h_latitude.required' => 'Please Click this button first then your location changes Successfully.'
        ]);
        $save = hostel_detail::where('o_cnic',Auth::user()->manager_cnic)
                ->update([
                    'h_latitude'=>$req->h_latitude,
                    'h_longitude'=>$req->h_longitude,
                ]);
             if ($save) {
              return redirect('owner/HostelSetting')->with('success','Congrats Your Hostel Location has been update Successfully.');
          }else{
             return redirect('owner/HostelSetting')->with('fail','Sorry Your Hostel Location can not update Please Try again.');
          }
    }
}
