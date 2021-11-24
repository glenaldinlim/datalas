@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Publikasi</h1>
        </div>
        <div class="section-body">
            <x-alert />
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $publication->title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3 d-flex justify-content-center">
                                    <img src="{{ asset('storage/'.$publication->cover) }}" alt="{{ $publication->slug }}" width="50%" class="img-fluid">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="information">
                                        <b>Pembuat Publikasi</b>
                                        <p>{{ $publication->user_id }}</p>
                                    </div>
                                    <div class="information">
                                        <b>Jenis Publikasi</b>
                                        <p>{{ $publication->type }}</p>
                                    </div>
                                    <div class="information">
                                        <b>Status Publikasi</b>
                                        <p><span class="badge {{ $publication->published_status == 'Publish' ? "badge-success" : "badge-secondary"}}">{{ $publication->published_status }} {{ $publication->published_status == 'Publish' ? 'by '.$publication->published_by.' at '.$publication->publish_time : '' }}</span></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="information">
                                        <b>Konten</b>
                                        <p>{!! $publication->content !!}</p>
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