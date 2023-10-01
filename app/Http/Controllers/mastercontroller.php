<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
class mastercontroller extends Controller
{
    public function index()
    {
        // $lang = null
        // App::setlocale($lang); Islamabad Karachi Peshawar Faisalabad Multan Sahiwal
       $Lahore = hostel_detail::where('h_city','Lahore')->count();
       $Islamabad = hostel_detail::where('h_city','Islamabad')->count();
       $Karachi = hostel_detail::where('h_city','Karachi')->count();
       $Peshawar = hostel_detail::where('h_city','Peshawar')->count();
       $Faisalabad = hostel_detail::where('h_city','Faisalabad')->count();
       $Multan = hostel_detail::where('h_city','Multan')->count();
       $Sahiwal = hostel_detail::where('h_city','Sahiwal')->count();
       
        return view('welcome',compact('Lahore','Islamabad','Karachi','Peshawar','Faisalabad','Multan','Sahiwal'));
    }
    public function search(Request $req)
    { 
         $req->validate([
            'city' => 'required',
            'category' => 'required',
            'range_km' => 'required',
            'h_latitude'    => 'required',
        ]);
        //  if($validator->fails()) {
        //     $errors = $validator->errors();
        //     return redirect()->back()->withErrors($errors);
        // }
        $city = $req->city;
        $range = $req->range_km;
        $category = $req->category;
        $current_latitude = $req->h_latitude;
         // print_r($current_latitude);
         // echo '<br/>';
        $current_longtitude = $req->h_longitude;
         // print_r($current_longtitude);
         // echo '<br/>';
        $update_latitude = $current_latitude + $range; 
         // print_r($update_latitude); 
         // echo '<br/>';
        $update_longtitude = $current_longtitude + $range;
        // print_r($update_longtitude); 
        // echo '<br/>';   
       $total_latitude = $update_latitude - $current_latitude;
       $total_longtitude = $update_longtitude - $current_longtitude;
       $total = $total_latitude + $total_longtitude;
         $hosteldata = hostel_detail::where('h_city',$city)
                        ->where('h_category',$category)
                        ->orwhereBetween('h_latitude', [$current_latitude, $update_latitude])
                        ->whereBetween('h_longitude', [$current_longtitude, $update_longtitude])  
                        ->get();



  // dd( distance(30.6572129, 73.1172243, 30.6416265, 73.1489345, "K") . " Kilometers<br>");
       // $hosteldata = DB::select("select * from hostel_details where h_city = '$city' AND h_category = '$category' AND h_latitude >=  $current_latitude AND  
       //  h_latitude =< $update_latitude AND  h_longitude >= $current_longtitude AND  h_longitude =< $update_longtitude");
      
        if($hosteldata){
        return view('search_hostel',compact('hosteldata','total_latitude','total_longtitude','total','current_latitude','current_longtitude')); 
        }
        // else{
        //     return redirect('/');
        // }
    }
    public static  function distance($lat1, $lon1, $lat2, $lon2, $unit) {

      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
       $dist = acos($dist);
       $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);

 if ($unit == "K") {
   return ($miles * 1.609344);
     } else if ($unit == "N") {
     return ($miles * 0.8684);
      } else {
      return $miles;
     }
  }
     public function about()
    {
        return view('about');
    }
      public function hostel(){
       $hosteldata = hostel_detail::latest()->limit(10)->get();
        return view('hostel',compact('hosteldata'));
    }
     public function contact()
    {
        return view('contact');
    }
    //  public function post_property()
    // {
    //     return view('post_property');
    // }
    public function help()
    {
        return view('help');
    }
    public function user_login()
    {
        return view('user_login');
    }
    public function owner_login()
    {
        return view('owner_login');
    }
    public function user_register()
    {
        return view('user_register');
    }
}
