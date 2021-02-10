<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="/admin">Tourism</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/users">Users</a>
        </li>
      </ul>
    </div>
    @if(isset(Auth::user()->email))
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a href="/profile" class="dropdown-item">Profile</a></li>
            <li><a href="/logout" class="dropdown-item">Logout</a></li>
            @if(Auth::user()->role == 'Admin')
              <li><a href="/" class="dropdown-item">User Page</a></li>
            @endif
          </ul>
        </li>
      </ul>
      @else
        <ul class="navbar-nav">
          <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
        </ul>
      @endif
  </div>
</nav>
