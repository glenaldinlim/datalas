@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Publikasi</h1>
        </div>
        <form action="{{ route('backend.publications.update', ['id' => $publication->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="type" class="form-label label-font">Tipe</label>
                                <select class="form-control @error('type') is-invalid @enderror selectric" id="type" name="type" required>
                                    <option value="News" {{ $publication->type == 'News' ? 'selected' : '' }}>Berita</option>
                                    <option value="Article" {{ $publication->type == 'Article' ? 'selected' : '' }}>Artikel</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title" class="form-label label-font">Judul</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $publication->title }}" placeholder="Judul" required>
                                @error('title')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content" class="form-label label-font">Konten</label>
                                <textarea class="form-control summernote-simple @error('content') is-invalid @enderror" name="content" id="content" rows="3" required>{{ old('content') ?? $publication->content }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label class="form-label label-font d-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input name="status_option" class="form-check-input @error('status_option') is-invalid @enderror" type="radio" id="status_active" value="Draft" {{ $publication->published_status == 'Draft' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_active">Draft</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="status_option" class="form-check-input @error('status_option') is-invalid @enderror" type="radio" id="status_inactive" value="Publish" {{ $publication->published_status == 'Publish' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_inactive">Publish {{ $publication->published_status == 'Publish' ? 'by '.$publication->published_by.' at '.$publication->publish_time : '' }}</label>
                                </div>
                                @error('status_option')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status_option') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="d-block">Cover Saat Ini</label>
                                <img src="{{ asset('storage/'.$publication->cover) }}" alt="{{ $publication->slug }}" width="90%" class="img-fluid">
                            </div>
                            <div class="form-group">
                                <label for="cover" class="form-label label-font">Cover</label>
                                <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" id="cover">
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
                    <input type="submit" value="Ubah" class="btn btn-success btn-text-size">
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