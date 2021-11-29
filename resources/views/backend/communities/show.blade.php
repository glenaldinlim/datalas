@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Informasi Komunitas {{ $community->name }}</h1>
        </div>
        <div class="section-body">
            <x-alert />
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Informasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="information">
                                        <b>Akun Login</b>
                                        <p>{{ $community->user->name }}</p>
                                    </div>
                                    <div class="information">
                                        <b>Narahubung</b>
                                        <p>{{ $community->contact_name }} (+{{ $community->contact_phone }})</p>
                                    </div>
                                    <div class="information">
                                        <b>Alamat</b>
                                        <p>{{ $community->address }}</p>
                                    </div>
                                    <div class="information">
                                        <b>Region</b>
                                        <p>{{ $community->origin->name }}, {{ $community->province->name }}</p>
                                    </div>
                                    <div class="information">
                                        <b>Status</b>
                                        <p><span class="badge {{ $community->is_active == 1 ? "badge-success" : "badge-danger"}}">{{ $community->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Data Produksi</h4>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h4>Log Aktifitas</h4>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection