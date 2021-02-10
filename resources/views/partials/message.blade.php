@if(count($errors)>0)
    {{-- @foreach ($errors->fires() as $item) --}}
        {{-- <p>{{$item}}</p> --}}
        <div class="alert alert-danger alert-dismissible fade show " role="alert">
            <strong class="text-danger">Sorry :(</strong> {{$errors->first()}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    {{-- @endforeach --}}
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        <strong class="text-success">Yay!</strong> {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show " role="alert">
        <strong class="text-danger">Sorry :(</strong> {{session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif