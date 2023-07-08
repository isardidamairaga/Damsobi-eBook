<div class="content">
    <aside>
        <div class="top">
            <div class="logo">
                <img src="{{ asset('images/Group 19.svg') }}" alt="">
                <h2>Dam<span class="danger">Sobi</span></h2>
            </div>
            <div class="close" id="close-btn">
                <span class="material-symbols-sharp">
                    close
                </span>
            </div>
        </div>

        <div class="sidebar">
            <a href="/admin/dashboard" class=" {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <span class=" material-symbols-sharp">
                    grid_view
                </span>
                <h3>Dashboard</h3>
            </a>
            <a href="{{ route('admin.dashboard.books.index') }}"
                class=" {{ Request::is('dashboard/posts') ? 'active' : '' }}">
                <span class="material-symbols-sharp">
                    add
                </span>
                <h3>Add Book</h3>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout">
                    <a>
                        <span class="material-symbols-sharp">
                            logout
                        </span>
                        <h3>Logout</h3>
                    </a>
                </button>
            </form>
        </div>
    </aside>
    @yield('container')
</div>
