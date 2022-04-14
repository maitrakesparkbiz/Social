@extends('layouts.app')

@section('content')

  <center>
    <form action="{{ route('insert_post') }}" method="post" enctype="multipart/form-data">
    @csrf
    <table>
      <tr>
        <td>
          <label> Title</label>
       
        </td>
        <td>
          <input type="text" name="title" id="title">
        </td>
      </tr>
      <tr>
        <td>
          <label>Desciption</label>
        </td>
        <td>
          <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label for="icon">Icon</label>
        </td>
        <td>
          <input type="file" name="post_icon" id="post_icon">
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" value="Submit">
        </td>
      </tr>
    </table>
    </form>
  </center>

  @endsection