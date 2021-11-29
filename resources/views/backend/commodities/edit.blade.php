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
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="category" class="form-label label-font">Kategori</label>
                                <select class="form-control @error('category') is-invalid @enderror selectric" id="category" name="category">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $commodity->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="commodity_name" class="form-label label-font">Nama Komoditas</label>
                                <input type="text" name="commodity_name" id="commodity_name" class="form-control @error('commodity_name') is-invalid @enderror" value="{{ old('commodity_name') ?? $commodity->name }}" placeholder="Nama Komoditas" required>
                                @error('commodity_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('commodity_name') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label label-font d-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input name="status_option" class="form-check-input @error('status_option') is-invalid @enderror" type="radio" id="status_active" value="1" {{ $category->is_active == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_active">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="status_option" class="form-check-input @error('status_option') is-invalid @enderror" type="radio" id="status_inactive" value="0" {{ $category->is_active == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_inactive">Tidak Aktif</label>
                                </div>
                                @error('status_option')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status_option') }}</strong>
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
