@extends('frontend.include.app')

@section('content')

    <div class="page-content page-auth">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center row-login">
                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('frontend/images/Wavy_Tech-28_Single-10.jpg') }}" alt=""
                            class="w-50 mb-4 mb-lg-none" />
                    </div>
                    <div class="col-lg-5">
                        <h2 style="font-size: 24px;font-weight: 600;color: #28a745">
                            Membeli makanan di HelloKitchen, <br />
                            Semakin menyenangkan
                        </h2>
                        <form class="mt-3" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success btn-block w-100 mt-5"> Sign In to My Account
                            </button>

                        </form>
                        <a class="btn btn-signup w-100 mt-2" href="{{ route('register') }}">
                            Sign Up
                        </a>
                        <a class="btn btn-signup w-100 mt-2" href="{{ route('user.login.google') }}">
                            <i class="fa fa-google"></i>
                            Login with Google
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
