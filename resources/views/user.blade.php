@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div style="height: 50px">  
    <a class="btn btn-success" style="float: right;" href="{{ route('users.create') }}">Buat Baru</a>
  </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>UserName</td>
          <td>Email</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
            @if(Auth::user()->id !== $user->id )
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            @endif
            </td>

        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection