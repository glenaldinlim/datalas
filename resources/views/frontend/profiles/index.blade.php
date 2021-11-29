@extends('layouts.frontend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profil</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ $user->name }}</h2>
            <x-alert />
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ asset('storage/'.$user->avatar) }}" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Komunitas</div>
                                    <div class="profile-widget-item-value">{{ $user->community->name }}</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Bergabung Sejak</div>
                                    <div class="profile-widget-item-value">{{ $user->join_year }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name"> 
                                {{ $user->name }} <div class="text-muted d-inline font-weight-normal"> <div class="slash"> </div> {{ $user->email }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Email</h4>
                        </div>
                        <form method="POST" action="{{ route('front.community.profiles.update.email') }}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label for="email" class="form-label label-font">Email</label>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $user->email }}" required>
                                        @error('email')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" value="Ubah" class="btn btn-primary btn-text-size">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Profil</h4>
                        </div>
                        <form method="post" action="{{ route('front.community.profiles.update.profile') }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="first_name" class="form-label label-font">Nama Depan</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') ?? $user->first_name }}" placeholder="Nama Depan" required>
                                        @error('first_name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="last_name" class="form-label label-font">Nama Belakang</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') ?? $user->last_name }}" placeholder="Nama Belakang" required>
                                        @error('last_name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="phone" class="form-label label-font">No Handphone</label>
                                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $user->phone }}" required>
                                        <small class="form-text text-muted">Ex: 6281200112233</small>  
                                        @error('phone')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label class="form-label label-font d-block">Jenis Kelamin</label>
                                        <div class="form-check form-check-inline">
                                            <input name="gender" class="form-check-input @error('gender') is-invalid @enderror" type="radio" id="male" value="M" {{ $user->gender == "M" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="male">Laki-laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="gender" class="form-check-input @error('gender') is-invalid @enderror" type="radio" id="female" value="F" {{ $user->gender == "F" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="female">Perempuan</label>
                                        </div>
                                        @error('status_option')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('status_option') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-0 col-md-6 col-12">
                                        <label for="avatar" class="form-label label-font">Avatar</label>
                                        <input type="file" name="avatar" id="avatar" class="form-control-file @error('avatar') is-invalid @enderror">
                                        <small class="form-text text-muted">Kosongkan Jika Tidak Ingin Mengubah Avatar | Max Size 3 MB</small>
                                        @error('avatar')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" value="Ubah" class="btn btn-primary btn-text-size">
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Kata Sandi</h4>
                        </div>
                        <form method="post" action="{{ route('front.community.profiles.update.password') }}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="password" class="form-label label-font">Kata Sandi</label>
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Kata Sandi" required>
                                        <small class="form-text text-muted">Min. 8 karakter</small>
                                        @error('password')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="password_confirmation" class="form-label label-font">Konfirmasi Kata Sandi</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Kata Sandi" required>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" value="Ubah" class="btn btn-primary btn-text-size">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection