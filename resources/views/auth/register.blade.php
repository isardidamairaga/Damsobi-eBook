<x-index-layout title="Login">
    @section('container')
        <div class="container d-flex  flex-column m-auto">
            <div class="navbar d-flex justify-content-end mt-5 gap-5 ">
                <a href="/login" class="{{ Request::is('login') ? 'active' : 'register-1' }}">Sign In</a>
                <a class=" {{ Request::is('register') ? 'active' : 'register-1' }}" href="/register">Register</a>
            </div>
            <div class="d-flex flex-wrap align-items-center hero">
                <div class="text-signin d-flex flex-column gap-5 ">
                    <h1 class="signin ">Welcome to <br> Damsobi</h1>
                    <p>Unleash Your Imagination and Ignite Your Passion<br> for Reading with Our Vast Collection of Books
                    </p>
                </div>
                <div class="overlay"></div>
                <img src="images/Picture.svg" alt="">
                <div class="form-signin mt-3 ">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="name" id="name" placeholder="Enter your name" name="name"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" placeholder="Enter your email" name="email"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Enter your password" id="password" name="password"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Confirm your password" id="password" name="password"
                                class="form-control" required>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="/login">Already have an account?</a>
                            <button type="submit" class="btn ">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</x-index-layout>
