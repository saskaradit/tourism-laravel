@extends('layouts.app')

@section('content')
    @if(isset(Auth::user()->email))
        <script>window.location="/";</script>
    @endif
    <h1 class="text-white">Login</h1>  
    <div class="row">
        <form action="/login" method="POST">
            @csrf
            
            <input type="email" name="email" placeholder="input your email" class="form-control mb-3">
            <input type="password" name="password" placeholder="input your password" class="form-control mb-3">
            <button type="submit" class="btn btn-dark">Login</button>
            <a class="btn btn-warning" href="/register">Register</a>
        </form>
    </div> 
@endsection

