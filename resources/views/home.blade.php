@extends('layouts.app')

@section('content')

<div class="container">
<h1 align="center">Hello {{ Auth::user()->name }} </h1>
</div>


 
<table id="table_id" class="display">
  <thead>
    <tr>
      <td>user</td>
      <td>Profile Photo</td>
      <td>Title</td>
      <td>Desciption</td>
      <td>Icon</td>
    </tr>
  </thead>
  <tbody>
@foreach ($post as $data)
  <tr>
    <td>{{$data->user->name}}</td>
    <td> <img src="{{asset('storage/'.$photo)}}" width="50" height="50" style="border-radius: 50%;"></td>
    <td>{{$data->title}}</td>



    <td>{{$data->desc}}</td>
    <td>    <img src="{{asset('storage/'.$data->post_icon)}}" width="50" height="50"></td>
    
  </tr>
  
  @endforeach
  </tbody>
</table>

@section('custom-js')
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script> 
@endsection
@endsection