<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Mail;
 use Storage; 
 use Laravel\Socialite\Facades\Socialite;
class social_controller extends Controller
{
     public function googleredirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googlecallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
       $this->createorupdate($user,'google');
       return redirect('user/home');
    }

    // facebook controller
      public function facebookredirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function facebookcallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
       $this->createorupdate($user,'facebook');
       return redirect('user/home');
    }

    // github controller
      public function githubredirect()
    {
        return Socialite::driver('github')->redirect();
    }
    public function githubcallback()
    {
        $user = Socialite::driver('github')->stateless()->user();
       $this->createorupdate($user,'github');
        return redirect('user/home');
    }
    // linkedin controller
      public function linkedinredirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }
    public function linkedincallback()
    {
        $user = Socialite::driver('linkedin')->stateless()->user();
       $this->createorupdate($user,'linkedin');
        return redirect('user/home');
    }
    private function createorupdate($data,$provider){
        $user = User::where('email',$data->email)->first();
        if ($user) {
            $user->update([
                 'provider' => $provider,
                'provider_id' => $data->id,
                'avatar' =>$data->avatar,
                'email_verified'=>'1',
            ]);
            Auth::login($user);
        }else{

            $user=User::create([
                'name' => $data->name,
                'email' => $data->email,
                'provider' => $provider,
                'provider_id' => $data->id,
                'avatar' => $data->avatar,
                'email_verified'=>'1',
            ]);
            Auth::login($user);
        }
    }
}
