@extends('layouts.app')

@section('content')
    <h1 class="text-white">{{$article->title}}</h1>   
    <div>
        <p>{{$article->description}}</p>
    </div>
    <p>Written on {{$article->created_at}}</p>
    <br>
    <a href="/articles/{{$article->id}}/edit" class="btn"></a>
    {{-- <form action="/articles/{{$article->id}}" method="DELETE">
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    </form> --}}
@endsection

