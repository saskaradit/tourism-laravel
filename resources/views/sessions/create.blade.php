@extends('layouts.app')

@section('content')
    @if(isset(Auth::user()->email))
        <script>window.location="/";</script>
    @endif
    <h1 class="text-white">Login</h1>   
    <form action="/login" method="POST">
        @csrf
        <input type="email" name="email" placeholder="input your email">
        <input type="password" name="password" placeholder="input your password">
        <button type="submit">Register</button>
    </form>
@endsection

