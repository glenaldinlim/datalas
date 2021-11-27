@extends('layouts.frontend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Produksi</h1>
        </div>
        <form action="{{ route('front.community.productions.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="commodity" class="form-label label-font">Komoditas</label>
                                <select class="form-control @error('commodity') is-invalid @enderror selectric" id="commodity" name="commodity">
                                    <option> -- Pilih Komoditas --</option>
                                    @foreach ($commodities as $commodity)
                                    <option value="{{ $commodity->id }}" {{ old('commodity') == $commodity->id ? 'selected' : '' }}>{{ $commodity->name }}</option>
                                    @endforeach
                                </select>
                                @error('commodity')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('commodity') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="year_production" class="form-label label-font">Tahun Produksi</label>
                                <input type="text" name="year_production" id="year_production" class="form-control @error('year_production') is-invalid @enderror" value="{{ old('year_production') }}" placeholder="Tahun Produksi" required>
                                @error('year_production')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('year_production') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quartal" class="form-label label-font">Kuarltal</label>
                                <select class="form-control @error('quartal') is-invalid @enderror selectric" id="quartal" name="quartal">
                                    <option value="Q1" {{ old('quartal') == 'Q1' ? 'selected' : '' }}>Kuartal 1</option>
                                    <option value="Q2" {{ old('quartal') == 'Q2' ? 'selected' : '' }}>Kuartal 2</option>
                                    <option value="Q3" {{ old('quartal') == 'Q3' ? 'selected' : '' }}>Kuartal 3</option>
                                    <option value="Q4" {{ old('quartal') == 'Q4' ? 'selected' : '' }}>Kuartal 4</option>
                                </select>
                                @error('quartal')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('quartal') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stock" class="form-label label-font">Stok</label>
                                <input type="text" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" placeholder="Stok" required>
                                @error('stock')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stock') }}</strong>
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
