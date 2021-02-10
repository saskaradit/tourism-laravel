@extends('layouts.app')

@section('content')
    <h1 class="text-white">Create Articles</h1>   
    <form action="/articles/{{$article->id}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="text" name="title" value="{{$article->title}}" class="form-control">
        </div>
        <select class="form-select mb-3" aria-label="Default select example" name="cat">
            <option selected>Open this select menu</option>
            <option value="1">Beach</option>
            <option value="2">Mountain</option>
            <option value="3">Etc</option>
        </select>

        <div class="mb-3">
            <textarea class="form-control" value="{{$article->description}}" style="height: 100px" name="desc"></textarea>
        </div>
        {{-- <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div> --}}
        {{Form::hidden('_method','PUT')}}
        <button type="submit">Register</button>
    </form>
@endsection

