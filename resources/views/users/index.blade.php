@extends('layouts.app')

@section('content')
    <h1 class="text-white">{{$user->name}}'s Profile</h1>   
    <div>
        <p>Email: {{$user->email}}</p>
        <p>Phone: {{$user->phone}}</p>
        <a href="/users/edit/{{$user->id}}" class="btn btn-warning">Edit Profile</a>
    </div>
@endsection