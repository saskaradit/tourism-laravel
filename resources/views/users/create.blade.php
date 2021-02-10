@extends('layouts.app')

@section('content')
    <h1 class="text-white">Sign Up</h1>   
    <form action="" method="POST">
        @csrf
        <input class="form-control mb-3" type="text" name="name" placeholder="input your name">
        <input class="form-control mb-3" type="email" name="email" placeholder="input your email">
        <input class="form-control mb-3" type="number" name="phone" placeholder="input your phone number">
        <input class="form-control mb-3" type="password" name="password" placeholder="input your password">
        <button type="submit">Register</button>
    </form>
@endsection

