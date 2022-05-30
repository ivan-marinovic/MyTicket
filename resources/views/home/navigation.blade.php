<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{('/')}}">MyTicket</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{('/')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/about')}}">About</a></li>
                @if(Route::has('login'))
                    @auth
                        <x-app-layout>
                        </x-app-layout>                    @else

                <li style="padding: 1px" class="nav-item"><a class="btn btn-primary" id="login-css" href="{{route('login')}}">Login</a></li>
                <li style="padding: 1px" class="nav-item"><a class="btn btn-primary" href="{{route('register')}}">Register</a></li>
                    @endauth
                    @endif
            </ul>
                    <a href="{{url('show_cart')}}" style="color: black;text-decoration: none;font-size: 25px;border: solid 1px black;padding: 1px"><i class="bi-cart-fill me-1">Cart</i></a>
        </div>
    </div>
</nav>
