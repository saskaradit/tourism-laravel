@extends('admin.adminapp')

@section('content')
    <h1 class="text-white">Users</h1>   
    @if(count($users)> 0)
        @foreach ($users as $user)
            @if($user->id == auth()->user()->id)
            @else
                <div class="card py-3 my-3">
                    <h4 class="card-header text-dark"> {{$user->name}} </h4>
                    <div class="card-body">
                        <p class="card-text text-dark">{{$user->email}}</p>
                        <form method="POST" action="/users/{{$user->id}}" style="display: inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger delete-user" value="Delete">
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
        {{$users->links()}}
    @else
        <h3 class="text-white">There are no articles :(</h3>
    @endif
@endsection

