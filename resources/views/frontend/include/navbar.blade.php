    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down" >
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/frontend/images/Hello Kitchen.png" alt="" style="max-height: 40px"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active mt-2">
                        <a class="nav-link" href="/">Home </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link" href="{{ route('categories') }}">Menu</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link" href="{{ route('aboutme') }}">About Me</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link" href="{{ route('help-center') }}">FaQ</a>
                    </li>
                    @auth
                        <li class="nav-item mt-2">
                            <a class="nav-link" href="{{ route('orderhistory')}}">Order History</a>
                        </li>
                    @endauth
                    @guest
                        {{-- 
                            <li class="nav-item mt-2">
                            <a class="nav-link" href="{{ route('register') }}" >Sign Up</a>
                        </li> --}}
                        <li class="nav-item mt-2">
                            <a class="btn btn-success nav-link px-4 text-white" href="{{ route('login') }}" style="background-color: #fb5f88">LOGIN</a>
                        </li>
                    @endguest
                    @auth
                        <!-- Desktop Menu -->
                        <li class="nav-item">
                            <a href="{{ route('cart.index') }}" class="nav-link d-inline-block mt-2">
                                @php
                                    $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                                @endphp
                                @if ($carts > 0)
                                    <a class="nav-link d-inline-block mt-2" href="{{ route('cart.index')}}">
                                        <img src="{{ asset('frontend/images/icon-cart-filled.svg') }}" alt="" />
                                        <div class="cart-badge">{{ $carts }}</div>
                                    </a>
                                @else
                                    <img src="{{ asset('frontend/images/icon-cart-empty.svg') }}" alt="" />
                                @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                @if (Auth::user()->avatar == null )
                                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name}}" alt=""
                                    class="rounded-circle mr-2 profile-picture" />
                                    @else
                                    <img src="{{ Storage::url(Auth::user()->avatar)}}" alt=""
                                    class="rounded-circle mr-2 profile-picture" />
                                @endif
                                Hi, {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->roles == 'ADMIN')
                                <a class="dropdown-item" href="{{ route('dashboard')}}">Dashboard</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('editProfile',Auth::user()->id)}}">Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{route('logout')}}" method="post">
                                @csrf
                                    <button type="submit" class="dropdown-item""> Logout </button>
                                </form>
                            </div>
                        </li>
                    </ul>

                    <!-- Mobile Menu -->
                    <ul class="navbar-nav d-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Hi, {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-inline-block" href="#">
                                Cart
                            </a>
                        </li>
                    </ul>
                @endauth
                </ul>
            </div>
        </div>
    </nav>
