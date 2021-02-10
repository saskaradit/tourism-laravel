@extends('layouts.app')

@section('content')
    <h1 class="text-white">{{$article->title}}</h1>   
    <span class="badge bg-warning text-dark my-3"><a href="/articles/category/{{$article->category->name}}" class="text-dark m-3">{{$article->category->name}}</a></span>
    @if($article->image != 'null')
        <div class="row">
            <img style="width: 300px" src="/storage/images/{{$article->image}}" alt="">
        </div>

    @else
        <h3>This Article has no image</h3>
    @endif
    <div>
        <p class="mt-3 fs-3">{{$article->description}}</p>
    </div>
    <p class="text-white fs-6">Written on {{$article->created_at}} by {{$article->user->name}}</p>

    @if(!Auth::guest())
        @if(Auth::user()->id == $article->user_id || Auth::user()->role == "Admin")
            <a href="/articles/{{$article->id}}/edit" class="btn btn-warning">Edit</a>
            <form method="POST" action="/articles/{{$article->id}}" style="display: inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger delete-user" value="Delete">
            </form>
        @endif
    @endif
@endsection

