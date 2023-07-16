<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $password = Str::password(10);
        // dd($provider);
        $provideruser = Socialite::driver($provider)->user();
        // dd($provideruser->getAvatar());
        
        

        $user = User::updateOrCreate([
            'provider_id'=>$provideruser->id,
            'provider' => $provider,
        ], [
            'name' => $provideruser->name,
            'email' => $provideruser->email,
            'password' => $password,
            'type'=> 'user',
            'image' => $provideruser->getAvatar(),
            
        ]);
     
        Auth::login($user);
     
        return redirect('/home');
    }
}
