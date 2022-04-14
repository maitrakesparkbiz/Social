<?php

namespace App\Http\Controllers;

use App\Models\Post as ModelsPost;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Post extends Controller
{
    public function post_form()
    {
        $data = Auth::user();
        $id=$data->id;
        return view('post.make_post',['id'=>$id]);
    }
    public function insert_post(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required|max:255',
            'post_icon' => 'required',
        ]);

         $user_profile['user_id']=$request->user_id;
        $user_profile['title']=$request->title;
        $user_profile['desc']=$request->desc;
        $name = time().'_'.$request->file('post_icon')->getClientOriginalName();
        $request->file('post_icon')->storeAs('public/post_icon',$name);
        $path = 'post_icon/'.$name;
        $user_profile['post_icon']=$path;
        $data = ModelsPost::Create(
            $user_profile
        );
        return redirect()->back()->with('success','profile updated');
    }

    public function view_post(Request $request)
    {
        $data = ModelsPost::paginate(2);
///////////////////////////////////

        return view("post.view_post",compact('data'));
    }
    public function view_all_post()
    {
        $data = Auth::user();
        $id=$data->id;

        $page = ModelsPost::where('user_id', $id)->paginate(2);

        return view('post.view_post',['data'=>$page]);
    }
}
