@extends('layouts.app')

@section('content')
    <h1 class="text-white">Articles</h1>   
    @if(!Auth::guest())
        <a class="btn btn-warning my-3" href="/articles/create">Create Article</a>
    @endif
    @if(count($articles)> 0)
        @foreach ($articles as $article)
            <div class="card py-3 mt-3">
                <h4 class="card-header "><a href="/articles/{{$article->id}}"  class="article-header"> {{$article->title}} </a></h4>
                <div class="card-body">
                    <p class="card-text text-dark">{{$article->description}}</p>
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
                </div>
            </div>
        @endforeach
        {{$articles->links()}}
    @else
        <h3 class="text-white">There are no articles :(</h3>
    @endif
@endsection

