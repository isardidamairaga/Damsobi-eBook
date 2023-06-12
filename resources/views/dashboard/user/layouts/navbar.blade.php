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
            <div class="d-flex gap-5 ">
                <form class="d-flex" role="search">
                    <input class="form-control " type="search" placeholder="Search book, author, category"
                        aria-label="Search">
                </form>
                <img src="https://ui-avatars.com/api/?background=random&name=isardi" class="rounded-circle"
                    alt="Profile Picture">
            </div>
        </div>
    </div>
</nav>
