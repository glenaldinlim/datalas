@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Komoditas</h1>
        </div>
        <form action="{{ route('backend.commodities.update', ['id' => $commodity->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body m3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="category-select" class="form-label label-font">Kategori</label>
                                <select class="form-control" name="category" id="category-select">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $commodity->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label label-font">Nama</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')  ?? $commodity->name }}" placeholder="Nama" required>
                                @error('name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="is_active" class="d-block">Active</label>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="is_active" id="is_active" {{ $commodity->is_active == '1' ? 'checked' : ''}} value="1">
                                  <label class="form-check-label" for="is_active">
                                    Aktif
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="is_active" id="is_active" {{ $commodity->is_active == '0' ? 'checked' : ''}} value="0">
                                  <label class="form-check-label" for="is_active">
                                    Tidak Aktif
                                  </label>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" value="Update" class="btn btn-success btn-text-size">
                </div>
            </div>
        </form>
    </section>
@endsection
