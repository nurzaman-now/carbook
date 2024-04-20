@php
    $route = Route::currentRouteName();
    $route = explode('.', $route);
    $path = $route[0];
    $sub = $route[1] ?? null;
@endphp
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Car<span>Book</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ $path == '/' ? 'active' : '' }}"><a href="/" class="nav-link">Home</a>
                </li>
                @auth
                    @if (auth()->user()->is_admin)
                        <li class="nav-item {{ $path == 'brands' ? 'active' : '' }}">
                            <a href="{{ route('brands.index') }}" class="nav-link">Brands</a>
                        </li>
                        <li class="nav-item {{ $path == 'cars' ? 'active' : '' }}">
                            <a href="{{ route('cars.index') }}" class="nav-link">Cars</a>
                        </li>
                    @endif


                    @if (!auth()->user()->is_admin)
                        <li class="nav-item {{ $path == 'cars' ? 'active' : '' }}">
                            <a href="{{ route('cars') }}" class="nav-link">Cars</a>
                        </li>
                        <li class="nav-item {{ $path == 'booking' ? 'active' : '' }}">
                            <a href="{{ route('booking.index') }}" class="nav-link">Booking</a>
                        </li>
                    @endif

                    <li class="nav-item {{ $path == 'profile' ? 'active' : '' }}">
                        <a href="{{ route('profile') }}" class="nav-link">Profile</a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="nav-link">
                            @csrf
                            <button type="submit" class="text-danger" style="background: none; border: none;">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item {{ $path == 'cars' ? 'active' : '' }}">
                        <a href="{{ route('cars') }}" class="nav-link">Cars</a>
                    </li>
                    <li class="nav-item {{ $path == 'register' ? 'active' : '' }}">
                        <a href="{{ route('register') }}" class="nav-link btn btn-success btn-sm text-white">Daftar</a>
                    </li>
                    <li class="nav-item {{ $path == 'login' ? 'active' : '' }}">
                        <a href="{{ route('login') }}" class="nav-link btn btn-outline-info btn-sm text-white">Masuk</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
