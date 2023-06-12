<x-index-layout title="Login">
    @section('container')
        <div class="container d-flex  flex-column m-auto">
            <div class="navbar d-flex justify-content-end mt-5 gap-5 ">
                <a class="{{ Request::is('login') ? 'active' : 'register-1' }}"href="/login">Sign In</a>
                <a class=" {{ Request::is('register') ? 'active' : 'register-1' }}" href="/register">Register</a>
            </div>
            <div class="d-flex flex-wrap align-items-center hero">
                <div class="text-signin d-flex flex-column gap-5">
                    <h1 class="signin ">Sign In to <br> Recharge Direct</h1>
                    <p>if you don't an account <br> you can <a class="register" href="/register">Register here!</a></p>
                </div>
                <div class="overlay"></div>
                <img src="images/Picture.svg" alt="">
                <div class="form-signin ">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" id="email" placeholder="Enter your email" name="email"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Enter your password" id="password" name="password"
                                class="form-control" required>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="/register"> don't have an account?</a>
                            <button type="submit" class="btn ">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</x-index-layout>
