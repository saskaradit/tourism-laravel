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
@endsection

