@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Komunitas Baru</h1>
        </div>
        <form action="{{ route('backend.communities.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <h6 class="text-center">Informasi Login</h6>
                            <div class="form-group">
                                <label for="first_name" class="form-label label-font">Nama Depan</label>
                                <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="Nama Depan" required>
                                @error('first_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="form-label label-font">Nama Belakang</label>
                                <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="Nama Belakang" required>
                                @error('last_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label label-font">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required>
                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label label-font">No Handphone</label>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Nomor Telepon" required>
                                <small class="form-text text-muted">Ex: 6281200112233</small>
                                @error('phone')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label label-font">Kata Sandi</label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Kata Sandi" required>
                                <small class="form-text text-muted">Minimal 8 Karakter</small>
                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <h6 class="text-center">Informasi Komunitas</h6>
                            <div class="form-group">
                                <label for="community_name" class="form-label label-font">Nama Komunitas</label>
                                <input type="text" name="community_name" id="community_name"
                                    class="form-control @error('community_name') is-invalid @enderror" value="{{ old('community_name') }}"
                                    placeholder="Nama Komunitas" required>
                                @error('community_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('community_name') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contact_name" class="form-label label-font">Nama Narahubung</label>
                                <input type="text" name="contact_name" id="contact_name" class="form-control @error('contact_name') is-invalid @enderror" value="{{ old('contact_name') }}" placeholder="Nama Narahubung" required>
                                @error('contact_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_name') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contact_phone" class="form-label label-font">Nomor Telpon Narahubung</label>
                                <input type="text" name="contact_phone" id="contact_phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('contact_phone') }}" placeholder="Nomor Telepon Narahubung" required>
                                <small class="form-text text-muted">Ex: 6281200112233</small>
                                @error('contact_phone')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_phone') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="province" class="form-label label-font">Provinsi</label>
                                <select class="form-control @error('province') is-invalid @enderror selectric" id="province" name="province">
                                    <option> -- Pilih Provinsi --</option>
                                </select>
                                @error('province')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="origin" class="form-label label-font">Kota / Kabupaten</label>
                                <select class="form-control @error('origin') is-invalid @enderror selectric" id="origin" name="origin" disabled>
                                    <option> -- Pilih Kota / Kabupaten --</option>
                                </select>
                                @error('origin')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('origin') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                                @error('address')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
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

@push('js-additional')
    <script>
        $(document).ready(() => {
            $.ajax({
                url: `http://datalas.test:8080/api/v1/provinces`,
                type: 'GET',
                dataType: 'JSON',
                success: (res) => {
                    if(res.data != null) {
                        $.each(res.data, (i, val) => {
                            $('#province').append(`<option value="${val.id}">${val.name}</option>`)
                        })
                        $('#province').selectric('refresh');  
                    }
                }
            });
        });

        $('#province').on('change', function(){
            let id = $('#province').val()
            $("#origin option").each(function() {
                $(this).remove();
            });
            $.ajax({
                url: `http://datalas.test:8080/api/v1/provinces/${id}`,
                type: 'GET',
                dataType: 'JSON',
                success: (res) => {
                    $('#origin').prop('disabled', false)
                    if(res.data.origins != null) {
                        $.each(res.data.origins, (i, val) => {
                            $('#origin').append(`<option value="${val.id}">${val.name}</option>`)
                        })
                        $('#origin').selectric('refresh');  
                    }
                }
            });
        });
    </script>
@endpush