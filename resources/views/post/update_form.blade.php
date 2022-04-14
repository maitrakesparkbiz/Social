
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
      <br>
 
        
      <table>
        <tr>
          <td>
            <input type="hidden" name="user_id" value="{{$id}}" id="user_id">
            <label>Gender</label>
          </td>
          <td> 
            Male <input type="radio" name="gender" value="male" id="gender" >
            Female<input type="radio" name="gender" value="female" id="gender"
          >
          </td>
        </tr>
        <tr>
          <td>
            <label>Adddress</label>
          </td>
          <td>
            <input type="text" name="address" id="address" >
          </td>
        </tr>
        <tr>
          <td>
            <label>Profile Photo</label>
          </td>
          <td>
            <input type="file" name="profile_photo" id="profile_photo" >
          </td>
        </tr>
        <tr>
          <td>
            <label>Date Of Birth</label>
          </td>
          <td>
            <input type="date" name="birth_date" id="birth_date" >
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