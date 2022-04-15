
@extends('layouts.app')

@section('content')

<div>
  @if ($message=Session::get('success'))
    {{$message}}
  @endif
</div>


 
  <form action="{{ route('register_pofile') }}" method="post" enctype="multipart/form-data">
    @csrf
    <center>
      <h1>Profile Update</h1>
      <br>
      
        @if (isset($user_data))
        <img src="{{asset('storage/'.$user_data->profile_photo)}}" width="250" height="250" style="border-radius: 50%;">
        @endif
      <table>
        <tr>
          <td>
            <input type="hidden" name="user_id" value="{{isset($id) ? $id:''}}" id="user_id">
            <label>Gender</label>
          </td>
          <td> 
            Male <input type="radio" name="gender" value="male" id="gender" {{isset($user_data) ? ($user_data->gender == 'male' ? 'checked' : '') : ''}} >
            Female<input type="radio" name="gender" value="female" id="gender" {{isset($user_data) ? ($user_data->gender == 'female' ? 'checked' : '') : ''}}>
          </td>
        </tr>
        <tr>
          <td>
            <label>Adddress</label>
          </td>
          <td>
            <input type="text" name="address" id="address" value="{{isset($user_data) ? $user_data->address : ''}}">


          </td>
        </tr>
        <tr>
          <td>
            <label>Profile Photo</label>
          </td>
          <td>
            <input type="file" name="profile_photo" id="profile_photo" value="{{isset($user_data->profile_photo) ? $user_data->profile_photo:''}}">
          </td>
        </tr>
        <tr>
          <td>
            <label>Date Of Birth</label>
          </td>
          <td>
            <input type="date" name="birth_date" id="birth_date" value="{{isset($user_data) ? $user_data->birth_date : ''}}">
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" value="Submit">
          </td>
        </tr>
      </table>

    </center>

  </form>
  

  @endsection