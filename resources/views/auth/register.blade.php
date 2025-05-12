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
                    <h2 class="register-title">Daftar Akun Baru</h2>
                    <p class="register-subtitle">Gabung bersama komunitas TemanBuku hari ini.</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autofocus>

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required>

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password" required>

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="form-label">Konfirmasi Kata Sandi</label>
                        <input id="password-confirm" type="password"
                            class="form-control"
                            name="password_confirmation" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
