@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Komoditas</h1>
        </div>
        <form action="{{ route('backend.commodities.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="category" class="form-label label-font">Kategori</label>
                                <select class="form-control @error('category') is-invalid @enderror selectric" id="category" name="category">
                                    <option> -- Pilih Kategori --</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <input type="text" name="commodity_name" id="commodity_name" class="form-control @error('commodity_name') is-invalid @enderror" value="{{ old('commodity_name') }}" placeholder="Nama Komoditas" required>
                                @error('commodity_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('commodity_name') }}</strong>
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
