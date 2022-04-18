<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\User_profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $post = Post::with('user')->orderBy('created_at', 'desc')->get();
        $id=$post[0]->user_id;
         $user_profile=User_profile::where('user_id',$id)->get();
        $photo= $user_profile[0]->profile_photo;
        return view('home',compact('post','photo'));

    }
}

