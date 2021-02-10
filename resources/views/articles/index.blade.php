@extends('layouts.app')

@section('content')
    <h1 class="text-white">Articles</h1>   
    @if(count($articles)> 0)
        @foreach ($articles as $article)
            <div class="card p-3 mt-3 mb-3">
                <h4><a href="/articles/{{$article->id}}"> {{$article->title}} </a></h4>
            </div>
        @endforeach
        {{$articles->links()}}
    @else
        <h3 class="text-white">No posts :(</h3>
    @endif
@endsection

