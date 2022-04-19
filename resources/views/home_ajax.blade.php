@extends('layouts.app')

@section('content')

<div class="container">
<h1 align="center">Hello {{ Auth::user()->name }} </h1>
</div>


 
<table id="table" class="display">
  <thead>
    <tr>
      <td>title</td>
      <td>desc</td>
      <td>post_icon</td>
    </tr>
  </thead>
  <tbody>
    <td style="display: none"></td>
    <td style="display: none"></td>
    <td style="display: none"></td>
  </tbody>
  <tfoot>
          <td>title</td>
      <td>desc</td>
      <td>post_icon</td>
  </tfoot>
</table>

@section('post-js')
<script>
  $(function(){
    $('#table').DataTable( {
        "processing": true,
        ajax: {
          url:"{{route('home_ajax')}}"
        },
        "columns": [
            { "data": "title" },
            { "data": "desc" },
            { "data": "post_icon" },
        ]
} );
  })
</script> 
@endsection
@endsection