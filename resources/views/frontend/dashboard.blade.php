@extends('layouts.frontend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-boxes fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Data Produksi</h4>
                        </div>
                        <div class="card-body">
                            {{ $production }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection