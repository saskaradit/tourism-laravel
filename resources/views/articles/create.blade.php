@extends('layouts.app')

@section('content')
    <h1 class="text-white mb-3">Create Articles</h1>   
    <form action="/articles" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="title" placeholder="Input title"  class="form-control">
        </div>
        <select class="form-select mb-3" aria-label="Default select example" name="cat">
            @foreach ($categories as $key=>$cat)
                <option value="{{$key}}" class="text-dark">{{$cat}}</option>
            @endforeach
        </select>

        <div class="mb-3">
            <textarea class="form-control" placeholder="Write your story" style="height: 100px" name="desc"></textarea>
        </div>
        {{-- <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div> --}}
        <button type="submit" class="btn btn-dark">Register</button>
    </form>
@endsection

