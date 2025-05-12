@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #f8f9fa;
    }

    .brand-logo {
        font-size: 2rem;
        font-weight: bold;
        color: #444;
    }

    .card-register {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .register-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: #333;
    }

    .register-subtitle {
        font-size: 0.95rem;
        color: #777;
        margin-bottom: 1.5rem;
    }

    .form-label {
        color: #555;
    }

    .form-control {
        background-color: #fff;
        color: #333;
        border: 1px solid #ccc;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.1rem rgba(0, 123, 255, .25);
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #0069d9;
    }

    .invalid-feedback {
        color: #e3342f;
    }
</style>
<div class="container py-5">
    <div class="text-center mb-4">
        <div class="brand-logo">TemanBuku</div>
        <div class="text-muted">Tempat terbaik untuk berbagi cerita dan inspirasi</div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-register">
                <div class="text-center">
                    <h2 class="register-title">Login Akun</h2>
                    <p class="register-subtitle">Login ke akun yang telah anda daftarkan Sebelumnya.</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
