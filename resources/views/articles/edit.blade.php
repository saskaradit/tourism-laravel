@extends('layouts.app')

@section('content')
    <h1 class="text-white">Edit Articles</h1>   
    <form action="/articles/{{$article->id}}" method="POST" enctype="multipart/form-data">

        @method('PUT')
        @csrf
        <div class="mb-3">
            <input type="text" name="title" value="{{$article->title}}" class="form-control">
        </div>
        <select class="form-select mb-3" aria-label="Default select example" name="cat">
            <option value="1" class="text-dark">Beach</option>
            <option value="2" class="text-dark">Mountain</option>
            <option value="3" class="text-dark">Etc</option>
        </select>

        <div class="mb-3">
            <textarea class="form-control" style="height: 100px" name="desc">{{$article->description}}</textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <button type="submit" class="btn btn-light">Edit</button>
    </form>
@endsection

