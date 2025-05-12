@extends('layouts.navUsers')

@section('show')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- ALERT UNTUK PESAN SUKSES DAN ERROR --}}
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            {{-- END ALERT --}}

            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h1 class="judul-postingan" style="font-family:'Times New Roman', Times, serif; font-weight:bold; margin: bottom 1500px;">
                        {{ $post->title }}
                    </h1>
                    <small class="text-muted d-block mb-1">
                        <strong>{{ $post->user->name ?? 'User Tidak Dikenal' }}</strong>
                    </small>
                    <hr>
                    <img src="{{ asset('storage/post/' . $post->image) }}" alt="" class="w-100 rounded">
                    <hr>
                    <p class="tmt-3">{!! $post->content !!}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Komentar dan Balasan -->
    <div class="comments mt-5">
        <h4 class="mb-4">Komentar</h4>

        @foreach($post->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <strong>{{ $comment->user->name }}</strong>
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                </div>
                <p class="mt-2 mb-2">{{ $comment->body }}</p>

                <!-- Balasan -->
                @foreach ($comment->replies as $reply)
                <div class="card mt-3 ml-4 bg-light border-0">
                    <div class="card-body py-2 px-3">
                        <div class="d-flex justify-content-between">
                            <strong>{{ $reply->user->name }} <small class="text-muted">(balasan)</small></strong>
                            <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mt-2 mb-1">{{ $reply->body }}</p>
                    </div>
                </div>
                @endforeach

                <!-- Form Balasan -->
                <form action="{{ route('comments.reply', $comment) }}" method="POST" class="mt-3">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" class="form-control form-control-sm" rows="2" placeholder="Balas komentar..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary btn-sm mt-3">Kirim Balasan</button>
                </form>
            </div>
        </div>
        @endforeach

        <!-- Form Komentar Baru -->
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Tulis Komentar Baru
            </div>
            <div class="card-body">
                <form action="{{ route('comments.store', $post) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Kirim Komentar</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection