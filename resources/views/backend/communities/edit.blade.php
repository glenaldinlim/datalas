@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Data Komunitas</h1>
        </div>
        <form action="{{ route('backend.communities.update', ['id' => $community->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="province_id" value="{{ $community->province_id }}" readonly>
            <input type="hidden" id="origin_id" value="{{ $community->origin_id }}" readonly>

            <div class="card">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="community_name" class="form-label label-font">Nama Komunitas</label>
                                <input type="text" name="community_name" id="community_name"
                                    class="form-control @error('community_name') is-invalid @enderror"
                                    value="{{ $community->name }}" placeholder="Nama Komunitas" required>
                                @error('community_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('community_name') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contact_name" class="form-label label-font">Nama Narahubung</label>
                                <input type="text" name="contact_name" id="contact_name" class="form-control @error('contact_name') is-invalid @enderror" value="{{ old('contact_name') ?? $community->contact_name }}" placeholder="Nama Narahubung" required>
                                @error('contact_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_name') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contact_phone" class="form-label label-font">Nomor Telpon Narahubung</label>
                                <input type="text" name="contact_phone" id="contact_phone" class="form-control @error('contact_phone') is-invalid @enderror" value="{{ old('contact_phone') ?? $community->contact_phone }}" placeholder="Nomor Telepon Narahubung" required>
                                <small class="form-text text-muted">Ex: 6281200112233</small>
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
                                <select class="form-control @error('origin') is-invalid @enderror selectric" id="origin" name="origin">
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
                                <textarea class="form-control" name="address" id="address" rows="3" required>{{ $community->address }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label label-font d-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input name="status_option" class="form-check-input @error('status_option') is-invalid @enderror" type="radio" id="status_active" value="1" {{ $community->is_active == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_active">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="status_option" class="form-check-input @error('status_option') is-invalid @enderror" type="radio" id="status_inactive" value="0" {{ $community->is_active == 0 ? 'checked' : '' }}>
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

@push('js-additional')
<script>
    $(document).ready(() => {
        const province_id =$('#province_id').val()
        const origin_id = $('#origin_id').val()
        $.ajax({
            url: `http://datalas.test:8080/api/v1/provinces`,
            type: 'GET',
            dataType: 'JSON',
            success: (res) => {
                if(res.data != null) {
                    $.each(res.data, (i, val) => {
                        if (val.id == province_id) {
                            $('#province').append(`<option value="${val.id}" selected>${val.name}</option>`)
                        } else {
                            $('#province').append(`<option value="${val.id}">${val.name}</option>`)
                        }
                    })
                    $('#province').selectric('refresh');  
                }
            }
        });

        $.ajax({
            url: `http://datalas.test:8080/api/v1/provinces/${province_id}`,
            type: 'GET',
            dataType: 'JSON',
            success: (res) => {
                if(res.data.origins != null) {
                    $.each(res.data.origins, (i, val) => {
                        if (val.id == origin_id) {
                            $('#origin').append(`<option value="${val.id}" selected>${val.name}</option>`)
                        }
                        $('#origin').append(`<option value="${val.id}">${val.name}</option>`)
                    })
                    $('#origin').selectric('refresh');  
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