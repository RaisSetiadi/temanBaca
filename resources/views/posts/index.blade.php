@extends('layouts.navUsers')

@section('index')

@php
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$hour = now()->format('H');

if ($hour >= 5 && $hour < 12) {
    $greeting='Selamat pagi' ;
    } elseif ($hour>= 12 && $hour < 17) {
        $greeting='Selamat siang' ;
        } elseif ($hour>= 17 && $hour < 20) {
            $greeting='Selamat sore' ;
            } else {
            $greeting='Selamat malam' ;
            }
            @endphp

            <!-- Header -->
            <section class="content-header">
                <div class="container-fluid mb-4">
                    @if(request('search'))
                    <h4 class="text-left" style="color: rgba(0,0,0,0.4); font-weight: 300; font-style: italic;">
                        Hasil pencarian untuk: <strong style="font-weight: bold;">{{ request('search') }}</strong>
                    </h4>
                    @else
                    <h4 class="text-left font-weight-bold">
                        {{ $greeting }} {{ $user->name ?? 'Pembaca' }}, explore dunia lebih dalam dengan baca yuk 📚
                    </h4>
                    @endif
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @foreach($posts as $post)
                    <div class="row mb-4 align-items-center">
                        <div class="col-md-8">
                            <small class="text-muted d-block mb-1">
                                Dibuat oleh: <strong>{{ $post->user->name ?? 'User Tidak Dikenal' }}</strong>
                            </small>
                            <h5 class="font-weight-bold">{{ $post->title }}</h5>
                            <p class="text-muted">{{ Str::limit($post->deskripsi, 200) }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>

                            <!-- Jumlah Komentar -->
                            <span class="text-muted align-middle" style="margin-left: 20px;">
                                <i class="bi bi-chat-left-text"></i> {{ $post->comments->count() }}
                            </span>

                            @if(Auth::id() == $post->id_user)
                            <!-- Tombol titik tiga -->
                            <div class="dropdown d-inline ml-2 text-right">
                                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton{{ $post->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    &#8942; {{-- ini simbol titik tiga vertical --}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $post->id }}">
                                    <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="col-md-4 text-right">
                            <img src="{{ asset('storage/post/' . $post->image) }}" class="img-fluid rounded" style="height:150px; width:200px; object-fit: cover;" alt="Gambar Post">
                        </div>
                    </div>
                    <hr>
                    @endforeach

                </div>
            </section>

            @endsection