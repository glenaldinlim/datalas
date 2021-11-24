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
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="type" class="form-label label-font">Tipe Publikasi</label>
                            <select class="form-control @error('type') is-invalid @enderror selectric" id="type" name="type" required>
                                <option value="News">Berita</option>
                                <option value="Article">Artikel</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </div>
                            @enderror
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
                            <textarea class="form-control summernote-simple @error('title') is-invalid @enderror" name="content" id="content" rows="3" required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cover" class="form-label label-font">Cover</label>
                            <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" id="cover" required>
                            <small class="form-text text-muted">Maks. 2 MB</small>
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

@push('css-lib')
    <link rel="stylesheet" href="{{ asset('modules/summernote/summernote-bs4.css') }}">
@endpush

@push('js-lib')
    <script src="{{ asset('modules/summernote/summernote-bs4.js') }}"></script>
@endpush