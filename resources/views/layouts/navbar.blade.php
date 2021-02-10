<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container">
      <a class="navbar-brand" href="/">Rad</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Articles
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li class="nav-item"><a class="nav-link" href="/articles">All Articles</a></li>
              @if(isset(Auth::user()->email))
                  <li class="nav-item"><a href="/articles/create" class="nav-link">Create Article</a></li>
                  <li class="nav-item"><a href="/users/{{Auth::user()->id}}/articles" class="nav-link">My Articles</a></li>
              @endif
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Beach</a></li>
              <li><a class="dropdown-item" href="#">Mountain</a></li>
              <li><a class="dropdown-item" href="#">Etc</a></li>
            </ul>
          </li>
        </ul>
      </div>
      @if(isset(Auth::user()->email))
        <ul class="navbar-nav">
          <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>
        </ul>
      @else
        <ul class="navbar-nav">
          <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
        </ul>
      @endif
    </div>
  </nav>