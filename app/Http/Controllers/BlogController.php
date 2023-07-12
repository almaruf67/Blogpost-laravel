<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogpost;
use App\Models\Comment;
use Auth;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index');
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
        $user = auth()->user()->name;
        $file = $request->poster;
        if ($file) {
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . rand(1, 999999) . '.' . $extention;
            $file->move('images', $fileName);
            $path = '/images/' . $fileName;
        } else {
            $path = null;
        }


        $blog = new blogpost();
        $blog->Author = $user;
        $blog->Title = $request->title;
        $blog->Poster = $path;
        $blog->Description = $request->des;
        $blog->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show($data)
    {
        $bd = blogpost::where('id',$data)->first();
        $comments = Comment::where('Post_id', $data)->get();
        // dd($comments);
        return view('blog/post', compact('bd','comments'));
        
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
