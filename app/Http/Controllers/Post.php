<?php

namespace App\Http\Controllers;

use App\Models\Post as ModelsPost;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use LDAP\Result;

class Post extends Controller
{
    public function post_form()
    {
     
    
        return view('post.make_post');
    }
    public function insert_post(Request $request)
    {
        $id=0;
        $validated = $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required|max:255',
            'post_icon' => 'required',
        ]);
        $user_profile=[
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'desc'=>$request->desc
        ];
        
       
        if($request->hasFile('post_icon'))
        {
            $path=file_upload($request->file('post_icon'),'post_icon');
            $user_profile['post_icon']=$path;
        }

        if($request->id==null)
        {
            $id=0;
        }
        else
        {
            $id=$request->id;
        }
        ModelsPost::updateOrCreate(
           ['id' => $id],$user_profile
        );
        return redirect()->back()->with('success','profile updated');
    }

    public function view_post(Request $request)
    {
        $data = ModelsPost::paginate(2);

        return view("post.view_post",compact('data'));
    }
    public function view_user_post($id)
    {
        $data = ModelsPost::find($id);

        return view("post.make_post",compact('data'));
    }
    public function del_user_post($id)
    {
       
        $data=ModelsPost::find($id)->post_icon;
        if($data!='')
        {
         Storage::delete('public/'.$data);
        }
        ModelsPost::find($id)->delete();
        return redirect('view/post');
    }
    public function view_all_post()
    {
        $data = Auth::user();
        $id=$data->id;

        $page = ModelsPost::where('user_id', $id)->paginate(2);

        //$page=DB::table('posts')->where('user_id', $id)->paginate(2);


        return view('post.view_post',['data'=>$page,'id'=>$id]);
    }
}
