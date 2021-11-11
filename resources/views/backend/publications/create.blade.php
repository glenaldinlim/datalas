@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Publikasi Baru</h1>
        </div>
        <form action="{{ route('backend.publications.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                            <div class="form-group">
                                <label for="user-select" class="form-label label-font">Pengguna</label>
                                <select class="form-control" name="user" id="user-select">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="type" class="form-label label-font">Tipe</label>
                                <select class="form-control @error('type') is-invalid @enderror selectric" id="type" name="type" required>
                                  <option value="News">News</option>
                                  <option value="Article">Article</option>
                                </select>
                              </div>
                            <div class="form-group">
                                <label for="title" class="form-label label-font">Judul</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Judul" required>
                                @error('title')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content" class="form-label label-font">Konten</label>
                                <textarea class="form-control" name="content" id="content" rows="3" required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cover" class="form-label label-font">Cover</label>
                                <a>(Max ukuran file 2 MB)</a>
                                <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" id="cover" required>
                                @error('cover')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cover') }}</strong>
                                    </div>
                                @enderror
                              </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" value="Tambah" class="btn btn-success btn-text-size">
                    <input type="reset" value="Reset" class="btn btn-danger btn-text-size">
                </div>
            </div>
        </form>
    </section>
@endsection
