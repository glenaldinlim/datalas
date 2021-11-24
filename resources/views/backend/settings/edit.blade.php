@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Pengaturan Website</h1>
        </div>
        <form action="{{ route('backend.misc.settings.update', ['id' => $setting->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="about" class="form-label label-font">Tentang</label>
                                <div class="col-12">
                                    <textarea class="summernote-simple form-control @error('about') is-invalid @enderror" name="about" id="about">{{ old('about') ?? $setting->about }}</textarea>
                                </div>
                                @error('about')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-label label-font">Alamat</label>
                                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?? $setting->address }}" placeholder="Alamat" required>
                                @error('address')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-sm-6">
                                    <label for="telphone" class="form-label label-font">No. Telepon</label>
                                    <input type="text" name="telphone" id="telphone" class="form-control @error('telphone') is-invalid @enderror" value="{{ old('telphone') ?? $setting->telphone }}" placeholder="Telepon" required>
                                    @error('telphone')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('telphone') }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-sm-6">
                                    <label for="phone" class="form-label label-font">No. Ponsel</label>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $setting->phone }}" placeholder="No. Ponsel" required>
                                    @error('phone')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="maps_url" class="form-label label-font">URL Maps</label>
                                <input type="text" name="maps_url" id="maps_url" class="form-control @error('maps_url') is-invalid @enderror" value="{{ old('maps_url') ?? $setting->maps_url }}" placeholder="URL Maps" required>
                                @error('maps_url')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('maps_url') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="facebook_url" class="form-label label-font">URL Facebook</label>
                                <input type="text" name="facebook_url" id="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror" value="{{ old('facebook_url') ?? $setting->facebook_url }}" placeholder="URL Facebook" required>
                                @error('facebook_url')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('facebook_url') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="instagram_url" class="form-label label-font">URL Instagram</label>
                                <input type="text" name="instagram_url" id="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" value="{{ old('instagram_url') ?? $setting->instagram_url }}" placeholder="URL Instagram" required>
                                @error('instagram_url')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('instagram_url') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="twitter_url" class="form-label label-font">URL Twitter</label>
                                <input type="text" name="twitter_url" id="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror" value="{{ old('twitter_url') ?? $setting->twitter_url }}" placeholder="URL Twitter" required>
                                @error('twitter_url')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('twitter_url') }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" value="Update" class="btn btn-success btn-14">
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