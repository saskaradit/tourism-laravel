@extends('layouts.app')

@section('content')
    <h1 class="text-white">My Articles</h1>   
    <a class="btn btn-warning my-3" href="/articles/create">Create Article</a>
    @if(count($articles)> 0)
        @foreach ($articles as $article)
            <div class="card p-3 mt-3 mb-3">
                <h4><a href="/articles/{{$article->id}}"> {{$article->title}} </a></h4>
            </div>
        @endforeach
        {{-- {{$articles->links()}} --}}
    @else
        <h5 class="text-white">You have no posts :(</h5>
    @endif
@endsection

