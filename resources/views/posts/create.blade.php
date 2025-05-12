@extends('layouts.appLayoutsUser')

@section('create')
    <div class="mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group mb-4">
                                <label style="font-weight: bold;">GAMBAR</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image">

                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label style="font-weight: bold;">JUDUL</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Post">
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label style="font-weight: bold;">Deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                    name="deskripsi" placeholder="Masukkan Deskripsi Post">{{ old('deskripsi') }}
                                <!-- error message untuk content -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-bottom: 50px;">
                                <label style="font-weight: bold;">KONTEN</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="editor" name="content" rows="5"
                                    id="editor" placeholder="Masukkan Konten Post">{{ old('content') }}</textarea>
                                <!-- error message untuk content -->
                                @error('content')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="button" style="text-align: end; margin: top 150px;">
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
