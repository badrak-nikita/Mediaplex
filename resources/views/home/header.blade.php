<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{url('/')}}" class="navbar-brand"><h1 class="text-primary display-6">Mediaplex</h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{url('/')}}" class="nav-item nav-link active">Головна</a>
                    <a href="{{url('products')}}" class="nav-item nav-link">Товари</a>
                    <a href="{{url('pass')}}" class="nav-item nav-link">Пiдписки</a>
                    <a href="{{url('contacts')}}" class="nav-item nav-link">Контакти</a>
                    @auth
                        @if(Auth::user()->usertype == '1')
                            <a href="{{url('redirect')}}" class="nav-item nav-link">Панель керування</a>
                        @endif
                    @endauth
                </div>
                <div class="d-flex m-3 me-0">
                    <a href="{{url('cart')}}" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">{{$cartItemCount}}</span>
                    </a>
                    @if (Route::has('login'))
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{url('profile', Auth::user()->id)}}">Профiль</a></li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Вийти</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Вхiд</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Реєстрація</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->