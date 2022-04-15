<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body> -->
@extends('layouts.app')

@section('content')

<center>
<table >
  <tr>
    <th>Tttle</th>
    <th>Desciption</th>
    <th>Post Icon</th>
    @if (isset($id))
    <th colspan="3" style="text-align: center;">action</th>
    @endif
  </tr>

  @foreach ($data as $info)
    <tr>
      
      <td style="width: 120px;">{{$info->title}}</td>
      <td style="width: 450px;">{{$info->desc}}</td>
      <td style="width: 100px;"><img src="{{ asset('storage/'.$info->post_icon)}}" width="100" height="100"> </td>
      @if (isset($id))
      <td>&nbsp&nbsp&nbsp&nbsp <a href="/view/user/post/{{$info->id}}"><button style="background-color: blue;color:azure">Edit</button></a> &nbsp&nbsp</td>
      <td> <a href="/del/post/{{$info->id}}"><button style="background-color: red;color:azure">Delete</button></a>&nbsp&nbsp</td>      
      <td><a href="{{ asset('storage/'.$info->post_icon)}}" download><img src="{{ asset('image/download-symbol-svgrepo-com.svg') }}" width="30px" height="30px"/></td>  
      @endif
    </tr>

  @endforeach
</table>
</center>

{{$data->links("pagination::bootstrap-4")}}




<br>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 


<br>

@endsection