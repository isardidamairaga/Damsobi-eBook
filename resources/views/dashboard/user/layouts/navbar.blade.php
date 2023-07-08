<nav class="navbar navbar-expand-lg">
    <div class="container align-items-center">
        <img src="{{ asset('images/Group 19.svg') }}" alt="">
        <a class="navbar-brand" href="#">DamSobi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach ($navbar as $name => $url)
                    <li class="nav-item ">
                        <a class="nav-link me-5 {{ Request::is($url) ? 'active' : '' }}" aria-current="page"
                            href="{{ $url }}">{{ $name }} </a>
                    </li>
                @endforeach
            </ul>
            <div class="d-flex align-items-center gap-5 ">
                {{-- <input type="text" id="search-input" placeholder="Cari buku...">
    <div id="search-results"></div> --}}
                {{-- <form class="d-flex" role="search"> --}}
                <input class="form-control " id="search-input" type="search"
                    placeholder="Search book, author, category" aria-label="Search">
                <div id="search-results" class="search-results"></div>
                {{-- </form> --}}
                @guest
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link me-5" aria-current="page" href="{{ route('login') }}">SignIn</a>
                        </li>
                    </ul>
                @else
                    <div class="dropdown">
                        <a class="d-flex btn  " href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <p class="username m-auto">{{ auth()->user()->username }}</p>
                            @if (auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-10 h-10 rounded-circle"
                                    alt="Profile Picture">
                            @else
                                <img src="https://ui-avatars.com/api/?background=random&name={{ auth()->user()->name }}"
                                    class="rounded-circle" alt="Profile Picture">
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
