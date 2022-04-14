<?php

namespace App\Http\Controllers;

use App\Mail\ResetMail;
use App\Models\User;
use App\Models\User_profile;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function profile_form()
    {
        $data = Auth::user();
        $id=$data->id;
        $check = Auth::user()->user_profile;
         $user_data=$data->user_profile;
        

       if($user_data->count()==1)
      {
        
        return view('profile_form',['id'=> $id,'user_data'=>$user_data]);
      }
      else
      {
        return view('update_form',['id'=> $id]);
      }
    }
    public function profile_register(Request $request)
    {
        $data = Auth::user();
      $user_data=$data->user_profile;
  
      foreach ($user_data as $data) {
        Storage::delete('public/'.$data->profile_photo);
        break;
        }


        $user_profile['user_id']=$request->user_id;
        $user_profile['gender']=$request->gender;
        $user_profile['address']=$request->address;
        $name = time().'_'.$request->file('profile_photo')->getClientOriginalName();
        $request->file('profile_photo')->storeAs('public/profile_photo',$name);
        $path = 'profile_photo/'.$name;
        $user_profile['profile_photo']=$path;
        $user_profile['birth_date']=$request->birth_date;


        $data = User_profile::updateOrCreate(
            ['user_id' => $request->user_id],$user_profile
        );
        return redirect('view/profile');

    }
    public function Reset_mail(Request $request)
    {
      $current = Carbon::now();
      $current->addMinute(5);
      $time=strtotime('+5 Minutes');
      $token=Hash::make($time);
      $email=$request->email;
      $user = User::where('email',$email)->update(['remember_token' => $token,'email_verified_at' => $current]);
      Mail::to($request->email)->send(new ResetMail($token));
  
     
    }
    public function update_password($id)
    {
      
      $user=User::where('remember_token',$id)->get();

      if($user->count()==0)
      {
        return redirect('/home');
      }

      $date = date('Y-m-d H:i:s', strtotime($user[0]->email_verified_at));
      $current = Carbon::now();

      if($date>=$current)
      {

        foreach ($user as $data) {
          return view('auth.passwords.change',['id'=>$data->id]);
          break;
        }
      }
      else
      {
        abort(403);
      }
      
    }
    public function change_password(Request $request)
    {

      $password=Hash::make($request->password);
      $user_profile['password']=$password;
   

      $data = User::updateOrCreate(
          ['id' => $request->id],$user_profile
      );
      return redirect('/login');
    }
}
