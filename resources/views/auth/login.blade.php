@php
    $pageTitle = 'Halaman Login';
@endphp
@extends('layouts.app')

@section('content')
    @if (session('timeout'))
        <div class="alert alert-warning">
            {{ session('timeout') }}
        </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                        <img src="{{ Vite::asset('resources/images/logokejaksaan.png') }}" alt=""
                            style="height: 100px;">
                        <h3><b>Login Admin</b></h3>
                        <p>Hai 🖐, silahkan masukan kredensial yang valid untuk login sebagai admin!</p>
                        <form method="POST" action="{{ route('login') }}" style="width: 90%">
                            @csrf

                            {{-- email section --}}
                            <label for="email" class="mb-2"><b>{{ __('Alamat Email') }}</b></label>
                            <input id="email" type="email"
                                class="form-control mb-2 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            {{-- password section --}}
                            <label for="password" class="mb-2"><b>{{ __('Password') }}</b></label>
                            <input id="password" type="password"
                                class="form-control mb-2 @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror


                            {{-- remember me section --}}
                            <div class="form-check d-flex justify-content-center align-items-center mb-3">
                                <input class="form-check-input me-2" style="font-size:15px; margin:0;" type="checkbox"
                                    name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Ingat Kredensial') }}
                                </label>
                            </div>

                            {{-- login button section --}}
                            <button type="submit" class="btn btn-primary form-control mb-3">
                                {{ __('Login') }}
                            </button>
                            <a href="{{ route('home') }}" class="btn btn-outline-primary form-control"><i
                                    class="bi bi-map me-2"></i><b>Kembali Ke
                                    Peta</b></a>
                            {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
