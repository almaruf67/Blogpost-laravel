<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
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

        $emailContent = "Welcome to laravel app. Thank you for your participation. We are happy to make you a part of our journey.\n\nHere is your Current Password=$password \n\nPlease change it from your profile as soon as possible";

        // Send the email
        $address = $provideruser->email;
        Mail::raw($emailContent, function ($message) use($address) {
            $message->to($address);
            $message->subject('Welcome to laravel');

            
            // $message->from('sender@example.com', 'Sender Name');
        });
        
        Auth::login($user);
        
     
        return redirect('/home');
    }
}
