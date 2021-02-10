@extends('layouts.app')

@section('content')
    <h1 class="text-white">{{$article->title}}</h1>   
    <div>
        <p>{{$articles->description}}</p>
    </div>
    <p>Written on {{$articles->created_at}}</p>
@endsection

