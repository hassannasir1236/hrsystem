<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mastercontroller;
use App\Http\Controllers\admin\admin_controller;
use App\Http\Controllers\user\social_controller;
use App\Http\Controllers\allhostel;
use App\Http\Controllers\citywise_hostel;
use App\Http\Controllers\contactform;
// Owner Controller
use App\Http\Controllers\owner\owner_controller;
use App\Http\Controllers\owner\Change_Password;
use App\Http\Controllers\owner\update_profile;
use App\Http\Controllers\owner\Hosteldetails;
use App\Http\Controllers\owner\ownerhome;
use App\Http\Controllers\owner\hostel_setting;
use App\Http\Controllers\owner\user_details;
use App\Http\Controllers\owner\roomassign;
use App\Http\Controllers\owner\hostelview;
use App\Http\Controllers\owner\transitionDetails;
// User Controller
use App\Http\Controllers\user\usercontroller;
use App\Http\Controllers\user\user_profile;
use App\Http\Controllers\user\user_change_password;
use App\Http\Controllers\Booking_controller;
use App\Http\Controllers\user\user_hosteldetails;
// Admin Controller
use App\Http\Controllers\admin\adminhome;
use App\Http\Controllers\admin\Changepassword;
use App\Http\Controllers\admin\alluser;
use App\Http\Controllers\admin\allowner;
use App\Http\Controllers\admin\allhosteldetails;
use App\Http\Controllers\admin\profile;
/*
|--------------------------------------------------------------------------
| Web Routes
|---------------------------------- ----------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// {lang?}
Auth::routes();

Route::get('/', [mastercontroller::class, 'index'])->name('/');
Route::post('/search',[mastercontroller::class, 'search'])->name('search');
Route::get('/about', [mastercontroller::class, 'about'])->name('about');
Route::get('/hostel', [mastercontroller::class, 'hostel'])->name('hostel');
Route::get('/contact', [mastercontroller::class, 'contact'])->name('contact');
Route::get('/help', [mastercontroller::class, 'help'])->name('help');
Route::get('/allhostel/{id}',[allhostel::class,'allhostel'])->name('allhostel');
// Hostel trnasition save
Route::post('transition_save',[allhostel::class,'transition_save'])->name('transition_save');
Route::get('citywise/{id}',[citywise_hostel::class,'citywise'])->name('citywise');
Route::post('booking',[Booking_controller::class,'index'])->name('booking');
Route::post('contactform',[contactform::class,'index'])->name('contactform');
// Route::get('/user_login', [mastercontroller::class, 'user_login'])->name('user_login');
//Route::get('/owner_login', [mastercontroller::class, 'owner_login'])->name('owner_login');
// Route::get('/user_register', [mastercontroller::class, 'user_register'])->name('user_register');
//Route::View('/user_register','user_register')->name('user_register');
//Route::View('/post_property','post_property')->name('post_property');
 // Route::view('/test','test')->name('test');
// user register 

//Route::post('/create_hostel', [owner_controller::class, 'create_hostel'])->name('create_hostel');

// google with socailte
Route::get('user/home', function () {
    return view('dashboard.user.home');
})->name('home')->middleware('web');
Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('user.user_login');
})->name('logout')->middleware('custom_auth');
Route::get('/google/redirect', [social_controller::class,'googleredirect'])->name('googleredirect');
Route::get('/google/callback', [social_controller::class,'googlecallback'])->name('googlecallback');

// facebook controller
Route::get('/facebook/redirect', [social_controller::class,'facebookredirect'])->name('facebookredirect');
Route::get('/facebook/callback', [social_controller::class,'facebookcallback'])->name('facebookcallback');
// GitHub controller
Route::get('/github/redirect', [social_controller::class,'githubredirect'])->name('githubredirect');
Route::get('/github/callback', [social_controller::class,'githubcallback'])->name('githubcallback');
// linkedin controller
Route::get('/linkedin/redirect', [social_controller::class,'linkedinredirect'])->name('linkedinredirect');
Route::get('/linkedin/callback', [social_controller::class,'linkedincallback'])->name('linkedincallback');

// user details 
Route::prefix('user')->name('user.')->group(function(){
// ,'PreventBackHistory'
    Route::middleware(['guest:web','prevent-back-history'])->group(function(){
        Route::view('/user_login','dashboard.user.user_login')->name('user_login');
        Route::View('/user_register','dashboard.user.user_register')->name('user_register');
        Route::view('resendverification','dashboard.user.resendverification')->name('resendverification');
        Route::post('/create', [usercontroller::class, 'create'])->name('create');
        Route::post('check',[usercontroller::class,'check'])->name('check');
        Route::get('password/forgot',[usercontroller::class,'showforgetpassword'])->name('forgot.password.form');
        Route::post('password/forgot/link',[usercontroller::class,'sendresetlink'])->name('forgot.password.link');
        Route::get('password/forgot/{token}',[usercontroller::class,'showresetform'])->name('reset.password.form');
        Route::post('password/forgot',[usercontroller::class,'resetpassword'])->name('reset.password');
          Route::get('/verify',[usercontroller::class,'verify'])->name('verify');
          Route::post('/Resendverification',[usercontroller::class,'Resendverification'])->name('Resendverification');

        });
        Route::middleware(['auth:web','is_user_verify_email','prevent-back-history'])->group(function(){
        Route::view('home','dashboard.user.home')->name('home');
        Route::post('user_UpdateProfile',[user_profile::class,'user_UpdateProfile'])->name('user_UpdateProfile');
        // change Password
        Route::get('user_changepassword',[user_change_password::class,'index'])->name('user_changepassword');
        Route::post('user_changepassword',[user_change_password::class,'password'])->name('userpassword');
        Route::post('UserUpdateProfile',[user_profile::class,'update'])->name('UserUpdateProfile');
        // hostel/Room details
        // route::view('details_status','dashboard.user.details_status')->name('details_status');
        Route::get('details_status',[user_hosteldetails::class,'index'])->name('details_status');
        Route::post('logout',[usercontroller::class,'logout'])->name('logout');
            
        });
    }); 


// owner details 
Route::prefix('owner')->name('owner.')->group(function(){
// ,'PreventBackHistory'
    Route::middleware(['guest:owner','prevent-back-history'])->group(function(){
        Route::view('/owner_login','dashboard.owner.owner_login')->name('owner_login');
        Route::View('/post_property','dashboard.owner.post_property')->name('post_property');
        Route::post('check',[owner_controller::class,'check'])->name('check');
     Route::get('password/forgot',[owner_controller::class,'showforgetpassword'])->name('forgot.password.form');
     Route::post('password/forgot/link',[owner_controller::class,'sendresetlink'])->name('forgot.password.link');
      Route::get('password/forgot/{token}',[owner_controller::class,'showresetform'])->name('reset.password.form');
      Route::post('password/forgot',[owner_controller::class,'resetpassword'])->name('reset.password');
        Route::post('/create_hostel', [owner_controller::class, 'create_hostel'])->name('create_hostel');
    });
    Route::middleware(['auth:owner','prevent-back-history'])->group(function(){
        Route::view('home','dashboard.owner.home')->name('home');
        // Hostel Details
        // Route::view('details','dashboard.owner.hostel_details')->name('details');
        Route::get('details',[Hosteldetails::class,'hosteldetails'])->name('details');
        // User Details
        Route::get('user_details',[user_details::class,'details'])->name('user_details');
        // Room assign details
        Route::get('roomassign',[roomassign::class,'index'])->name('roomassign');
        Route::get('roomNoassign',[roomassign::class,'roomno'])->name('roomNoassign');
        // Owner Profile
        Route::View('profile','dashboard.owner.profile')->name('profile');
        Route::post('UpdateProfile',[update_profile::class,'UpdateProfile'])->name('UpdateProfile');
        Route::post('OwnerImage',[update_profile::class,'OwnerImage'])->name('OwnerImage');
        // Owner Home page
        Route::get('home',[ownerhome::class,'home'])->name('home');
        Route::get('edit/{uid}/{hid}/{status}',[ownerhome::class,'edit'])->name('edit');
        // hostel Setting
        Route::view('HostelSetting','dashboard.owner.hostel_setting')->name('HostelSetting');
        Route::get('HostelSetting',[hostel_setting::class,'hostel_images'])->name('hostel_images');
        Route::delete('delete/{id}',[hostel_setting::class,'DeleteHostelImage']);
        // upload images
        Route::post('upload',[hostel_setting::class,'upload'])->name('upload');
        // Edit Hostel details
        Route::post('EditHostelDetails',[hostel_setting::class,'EditHostelDetails'])->name('EditHostelDetails');
        // Facilities
        Route::post('facilities',[hostel_setting::class,'facilities'])->name('facilities');
        // Location Changes
        Route::post('LocationChanges',[hostel_setting::class,'LocationChanges'])->name('LocationChanges');
        // Change Password Owner
        Route::view('password','dashboard.owner.password')->name('password');
        Route::post('ChangePassword',[Change_Password::class,'ChangePassword'])
        ->name('ChangePassword');
        // Hostel View
        Route::get('hostelview',[hostelview::class,'index'])->name('hostelview');
        // transitionDetails 
        Route::get('transitionDetails',[transitionDetails::class,'index'])->name('transitionDetails');
        Route::post('savetransitionDetails',[transitionDetails::class,'transitionDetails'])->name('savetransitionDetails');
        Route::get('edittransition/{id}',[transitionDetails::class,'edit'])->name('edittransition');
        Route::post('edittransitionvalue',[transitionDetails::class,'editvalue'])->name('edittransitionvalue');
        Route::delete('delete_transition/{id}',[transitionDetails::class,'delete_transition']);

        Route::post('logout',[owner_controller::class,'logout'])->name('logout');
       
    });
});


// admin details 
Route::prefix('admin')->name('admin.')->group(function(){
// ,'PreventBackHistory'
    Route::middleware(['guest:admin','prevent-back-history'])->group(function(){
        Route::view('/admin_login','dashboard.admin.admin_login')->name('admin_login');
        Route::post('check',[admin_controller::class,'check'])->name('check');
     // Route::get('password/forgot',[usercontroller::class,'showforgetpassword'])->name('forgot.password.form');
     // Route::post('password/forgot/link',[usercontroller::class,'sendresetlink'])->name('forgot.password.link');
     //  Route::get('password/forgot/{token}',[usercontroller::class,'showresetform'])->name('reset.password.form');
     //  Route::post('password/forgot',[usercontroller::class,'resetpassword'])->name('reset.password');
    }); 
    Route::middleware(['auth:admin','prevent-back-history'])->group(function(){
        Route::view('home','dashboard.admin.home')->name('home');
        Route::post('logout',[admin_controller::class,'logout'])->name('logout');
        // dashboard and home controller
        Route::get('home', [adminhome::class, 'index'])->name('chart');
        Route::post('sendmail', [adminhome::class, 'sendmail'])->name('sendmail');
        // All users record
        Route::get('alluser', [alluser::class, 'index'])->name('alluser'); 
        // All owner record
        Route::get('allowner', [allowner::class, 'index'])->name('allowner');
        // All hostel record
        Route::get('allhosteldetails', [allhosteldetails::class, 'index'])->name('allhosteldetails');
        // Change password
         Route::view('password','dashboard.admin.changepassword')->name('password');
        Route::post('ChangePassword',[Changepassword::class,'ChangePassword'])
        ->name('ChangePassword');
        // Profile create
         Route::View('profile','dashboard.admin.profile')->name('profile');
        Route::post('UpdateProfile',[profile::class,'OwnerImage'])->name('UpdateProfile');
    });
});