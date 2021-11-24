@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengaturan Website</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pengaturan Website</h4>
                            <div class="card-header-action">
                                @hasrole('webmaster')
                                    <a href="{{ route('backend.misc.settings.edit', ['id' => $setting->id]) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                @endhasrole
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-4">
                                    {!! $setting->maps_url !!}
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                                    <div class="information">
                                        <b>Alamat</b>
                                        <p>{{ $setting->address }}</p>
                                    </div>
                                    <div class="information">
                                        <b>No. Telepon</b>
                                        <p>{{ $setting->telphone }}</p>
                                    </div>
                                    <div class="information">
                                        <b>No. Ponsel</b>
                                        <p>{{ $setting->phone }} <a href="{{ 'https://api.whatsapp.com/send?phone='.$setting->phone }}"> <i class="fas fa-external-link-alt"></i></a></p>
                                    </div>
                                    <div class="information">
                                        <b>Facebook</b>
                                        <p>{{ $setting->facebook_url }} <a href="{{ $setting->facebook_url }}"> <i class="fas fa-external-link-alt"></i></a></p>
                                    </div>
                                    <div class="information">
                                        <b>Instagram</b>
                                        <p>{{ $setting->instagram_url }} <a href="{{ $setting->instagram_url }}"> <i class="fas fa-external-link-alt"></i></a></p>
                                    </div>
                                    <div class="information">
                                        <b>Twitter</b>
                                        <p>{{ $setting->twitter_url }} <a href="{{ $setting->twitter_url }}"> <i class="fas fa-external-link-alt"></i></a></p>
                                    </div>
                                    <div class="information">
                                        <b>Tentang</b>
                                        {!! $setting->about !!}
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