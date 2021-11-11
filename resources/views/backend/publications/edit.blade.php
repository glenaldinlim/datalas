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
                                  <option value="News">News</option>
                                  <option value="Article">Article</option>
                                </select>
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
                                <textarea class="form-control" name="content" id="content"  rows="3" required>{{ old('content') ?? $publication->content }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cover" class="form-label label-font">Cover</label>
                                <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" id="cover">
                                @error('cover')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cover') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="published_status" class="d-block">Status Publikasi</label>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="published_status" id="published_status" {{ $publication->published_status == 'Draft' ? 'checked' : ''}} value="Draft">
                                  <label class="form-check-label" for="published_status">
                                    Draft
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input for="published_status" class="form-check-input" type="radio" name="published_status" id="published_status" {{ $publication->published_status == 'Publish' ? 'checked' : ''}} value="Publish">
                                  <label class="form-check-label" for="published_status">
                                    Publish
                                  </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label class="d-block">Cover Saat Ini</label>
                                <img src="{{ asset('storage/'.$publication->cover) }}" alt="{{ $publication->slug }}" width="90%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" value="update" class="btn btn-success btn-text-size">
                </div>
            </div>
        </form>
    </section>
@endsection
