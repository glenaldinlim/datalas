@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Komunitas Baru</h1>
        </div>
        <form action="{{ route('backend.communities.edit', ['id' => $idCommunity]) }}" method="post">
            @method('PUT')
            @csrf
            <input type="hidden" id="district" value="{{ $communityData->origin_id }}" />
            <div class="card">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="user-select" class="form-label label-font">Pengguna</label>
                                <select class="form-control" name="user" id="user-select">

                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $user->id === $communityData->user_id ? 'selected' : '' }}>
                                            {{ $user->first_name }}
                                            {{ $user->last_name }}</option>

                                    @endforeach

                                </select>

                                @error('user')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user') }}</strong>
                                    </div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="community_name" class="form-label label-font">Nama Komunitas</label>
                                <input type="text" name="community_name" id="community_name"
                                    class="form-control @error('community_name') is-invalid @enderror"
                                    value="{{ $communityData->name }}" placeholder="Nama Komunitas" required>
                                @error('community_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('community_name') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug" class="form-label label-font">Slug</label>
                                <input type="text" name="slug" id="slug"
                                    class="form-control @error('slug') is-invalid @enderror"
                                    value="{{ $communityData->slug }}" placeholder="Slug" required>
                                @error('slug')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="contact" class="form-label label-font">Nama Kontak</label>
                                <input type="text" name="contact" id="contact"
                                    class="form-control @error('contact') is-invalid @enderror"
                                    value="{{ $communityData->contact_name }}" placeholder="Nama Kontak" required>
                                @error('contact')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="contact_phone" class="form-label label-font">Nomor Kontak</label>
                                <input type="text" name="contact_phone" id="contact_phone"
                                    class="form-control @error('contact_phone') is-invalid @enderror"
                                    value="{{ $communityData->contact_phone }}" placeholder="Nomor Kontak" required>
                                @error('contact_phone')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_phone') }}</strong>
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="province" class="form-label label-font">Provinsi</label>
                                <select class="form-control" name="province" id="province">
                                    <option selected value="" disabled>-- Pilih Provinsi --</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province['id'] }}"
                                            {{ $province['id'] === $communityData->province_id ? 'selected' : '' }}>
                                            {{ $province['nama'] }}</option>
                                    @endforeach

                                </select>

                                @error('province')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="origin" class="form-label label-font">Kota / Kabupaten</label>
                                <select class="form-control" name="origin" id="origin">
                                    @foreach ($districts as $district)
                                        <option value="{{ $district['id'] }}"
                                            {{ $district['id'] === $communityData->origin_id ? 'selected' : '' }}>
                                            {{ $district['nama'] }}</option>
                                    @endforeach
                                </select>

                                @error('origin')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('origin') }}</strong>
                                    </div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea class="form-control" name="address" id="address" rows="3" required>{{ $communityData->address }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="is_active" class="form-label label-font">Status</label>
                                <select class="form-control" name="is_active" id="is_active">
                                    <option value="1" {{ $communityData->is_active == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $communityData->is_active == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>

                                @error('is_active')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_active') }}</strong>
                                    </div>
                                @enderror

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
    @include('components.district')
    {{-- <script src="{{ asset('js/district.js') }}"></script> --}}

@endsection
