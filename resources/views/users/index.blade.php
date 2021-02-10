@extends('layouts.app')

@section('content')
    <h1 class="text-white">{{$user->name}}'s Profile</h1>   
    <div>
        <p>email: {{$user->email}}</p>
        <p>phone: {{$user->phone}}</p>
        <a href="/users/edit/{{$user->id}}" class="btn btn-light">Edit</a>
    </div>
@endsection