@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Kategori Komoditas</h1>
        </div>
        <form action="{{ route('backend.categories.update', ['id' => $category->id]) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="name" class="form-label label-font">Nama Kategori</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" placeholder="Nama Kategori" required>
                                @error('name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-check">
                                <label for="name" class="form-label label-font d-block">Status</label>
                                <input class="form-check-input" type="radio" value="1" name="status" id="status_active" {{ $category->is_active == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_active">
                                  Aktif
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" value="0" name="status" id="status_inactive" {{ $category->is_active == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_inactive">
                                  Tidak Aktif
                                </label>
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