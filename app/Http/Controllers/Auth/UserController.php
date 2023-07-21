<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
        dd($request);
        $User=User::find($id);
        $file = $request['image'];
        if ($file) {
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . rand(1, 999999) . '.' . $extention;
            $file->move('images/user', $fileName);
            $path = '/images/user' . $fileName;
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
}
