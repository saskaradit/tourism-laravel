@extends('layouts.app')

@section('content')
    <h1 class="text-white">Edit Profile</h1>   
    <form action="/users/edit/{{$user->id}}" method="POST" >
        @csrf
        <input class="form-control mb-3" type="text" name="name" value="{{$user->name}}">
        <input class="form-control mb-3" type="email" name="email"  value="{{$user->email}}">
        <input class="form-control mb-3" type="number" name="phone"  value="{{$user->phone}}">
        <input class="form-control mb-3" type="password" name="password"  placeholder="Input Password">
        <button type="submit" class="btn btn-dark">Edit</button>
    </form>
@endsection

