<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogpost;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogp = blogpost::orderBy('id', 'desc')->paginate(3);
        return view('home', compact('blogp'));
    }
}
