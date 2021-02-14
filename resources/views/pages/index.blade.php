@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        @if(isset(Auth::user()->email))
            <h1 class="display-4">Hello, {{auth()->user()->name}}!</h1>
            <p class="lead">Welcome to your Wonderful Journey dashboard where all travel related are here</p>
            <hr class="my-4">
            <p>Grow the community</p>
            <a href="/articles/create" class="btn btn-warning mt-3">Create Article</a>
            @if(Auth::user()->role == 'Admin')
              <a href="/admin" class="btn btn-teal mt-3">Admin Page</a>
            @endif
        @else
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">Welcome to Wonderful Journey where all travel related are here</p>
            <hr class="my-4">
            <p>Join the community now, lets make travel easier</p>
            <a class="btn btn-warning btn-lg" href="/login" role="button">Login</a>
        @endif
        </p>
  </div>
  <div class="row text-center d-flex">
    @if(count($articles)> 0)
      @foreach ($articles as $article)
      <div class="col d-flex justify-content-center">
        <div class="card m-3" style="width: 18rem;">
          <div class="card-body">
            <span class="badge bg-warning text-dark mt-3 mx-3" style="width: fit-content"><a href="/articles/category/{{$article->category->name}}" class="text-dark">{{$article->category->name}}</a></span>
            <h4 class="card-header "><a href="/articles/{{$article->id}}"  class="article-header"> {{$article->title}} </a></h4>
            {{-- <p class="card-text text-dark">{{$article->description}}</p> --}}
            <p class="card-text text-dark">{{ strlen($article->description) > 50 ? substr($article->description,0,70).' ...' : $article->description }}</p>
          </div>
        </div>
      </div>
      @endforeach
    @endif
  </div>
@endsection

