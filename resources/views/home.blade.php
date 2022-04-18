@extends('layouts.app')

@section('content')

<div class="container">
<h1 align="center">Hello {{ Auth::user()->name }} </h1>
</div>


 
<table border="2px" style="width: 100%;">
@foreach ($post as $data)
  <tr>
    <td>

    </td>
    <td>{{$data->user->name}} <img src="{{asset('storage/'.$photo)}}" width="50" height="50" style="border-radius: 50%;"></td>
    <td colspan="2">{{$data->title}}</td>
    <td colspan="2"></td>
  </tr>
  <tr>

    <td colspan="4">{{$data->desc}}</td>
    <td>    <img src="{{asset('storage/'.$data->post_icon)}}" width="50" height="50"></td>
    
  </tr>
  
  @endforeach
</table>

@endsection
