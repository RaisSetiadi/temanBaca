@extends('layouts.navUsers')

@section('edit')
<div class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('posts.update', $posts->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>

                            @if($posts->image)
                            <div class="mb-3">
                                <img id="preview" src="{{ asset('storage/post/' . $posts->image) }}" alt="Gambar Saat Ini" class="img-fluid mb-2" style="max-height: 200px;">
                            </div>
                            @else
                            <img id="preview" class="img-fluid mb-2" style="display: none; max-height: 200px;">
                            @endif

                            <input type="file" class="form-control" name="image" onchange="previewImage(event)">
                        </div>



                        <div class="form-group">
                            <label class="font-weight-bold">JUDUL</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title', $posts->title) }}"
                                placeholder="Masukkan Judul Post">

                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">DESKRIPSI</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                                placeholder="Masukkan Deskripsi Post">{{ old('deskripsi', $posts->deskripsi) }}</textarea>

                            <!-- error message untuk content -->
                            @error('deskripsi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">KONTEN</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" id="editor"
                                placeholder="Masukkan Konten Post">{{ old('content', $posts->content) }}</textarea>

                            <!-- error message untuk content -->
                            @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function previewImage(event) {
        const image = document.getElementById('preview');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.style.display = 'block';
    }
</script>
