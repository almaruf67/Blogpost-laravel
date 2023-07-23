<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->user()->id;
        $User = User::where('id', $id)->first();
        // @dd($User);
        return view('user.index',compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // dd($request);
        $User=User::find($id);
        $file = $request['image'];
        if ($file) {
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . rand(1, 999999) . '.' . $extention;
            $file->move('images/user/', $fileName);
            $path = '/images/user/' . $fileName;
        } else {
            $path = $User->image ;
        }
        $User->name=$request->name;
        $User->image=$path;
        $User->phone=$request->phone;
        $User->save();
        
        return redirect()->route('profile.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $User=User::find($id);
        $User->delete();
        return redirect()->route('home')->flash('success', 'The user has been deleted successfully.');
        
    }

    public function changePassword(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string',
            'new_password_confirmation' => 'required|string'
        ]);
        $auth = Auth::user();
 
 // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password)) 
        {
            return redirect()->back()->with('error', "Current Password is Invalid");
        }
 
// Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0) 
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }
 
        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "Password Changed Successfully");
    }
}
