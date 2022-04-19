@extends('layouts.app')

@section('content')

<center>

<table id='table_id' class="display">
  @if ($data->count()!=0)
  <thead>
    <tr>
      <th>Tttle</th>
      <th>Desciption</th>
      <th>Post Icon</th>

      @if (isset($id))
      <th >Action</th>
      @endif
    </tr>
  </thead>
    
    @else
      <td><h3>NO DATA</h3></td>
    @endif
    <tbody>
    @foreach ($data as $info)

      <tr>
        
        <td style="width: 120px;">{{$info->title}}</td>
        <td style="width: 450px;">{{$info->desc}}</td>
        <td style="width: 100px;"><img src="{{ asset('storage/'.$info->post_icon)}}" width="100" height="100"> </td>
        @if (isset($id))
        <td>&nbsp&nbsp&nbsp&nbsp <a href="/view/user/post/{{$info->id}}"><button style="background-color: blue;color:azure">Edit</button> <a href="/del/post/{{$info->id}}"><button style="background-color: red;color:azure">Delete</button></a>&nbsp&nbsp<a href="{{ asset('storage/'.$info->post_icon)}}" download><img src="{{ asset('image/download-symbol-svgrepo-com.svg') }}" width="30px" height="30px"/></td>  
        @endif
      </tr>

    @endforeach
    </tbody>
</table>
</center>

@endsection
