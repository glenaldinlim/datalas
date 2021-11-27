@extends('layouts.frontend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Data Komunitas</h1>
        </div>
        <div class="section-body">
            <x-alert />
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Komunitas {{ $community->name }}</h4>
                            <div class="card-header-action">
                                <a href="{{ route('front.community.communities.edit', ['id' => $community->user_id]) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="information">
                                        <b>Region</b>
                                        <p>{{ $community->origin_id }}, {{ $community->province_id }}</p>
                                    </div>
                                    <div class="information">
                                        <b>Alamat</b>
                                        <p>{{ $community->address }}</p>
                                    </div>
                                    <div class="information">
                                        <b>Narahubung</b>
                                        <p>{{ $community->contact_name }} (+{{ $community->contact_phone }})</p>
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
            </div>
        </div>
    </section>
@endsection