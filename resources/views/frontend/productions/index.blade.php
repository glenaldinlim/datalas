@extends('layouts.frontend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Data Produksi</h1>
        </div>
        <div class="section-body">
            <x-alert />
            <div class="row">
                <div class="card col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card-header">
                        <h4>List Data Produksi</h4>
                        <div class="card-header-action">
                            <a href="{{ route('front.community.productions.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="productions-list">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Komoditas</th>
                                        <th>Tahun Produksi</th>
                                        <th>Stok</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productions as $production)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $production->commodity->name}}</td>
                                            <td>{{ $production->year_production }} ({{ $production->quartal }})</td>
                                            <td>{{ $production->stock }}</td>
                                            <td>
                                                <a href="{{ route('front.community.productions.edit', ['id' => $production->id]) }}" class="btn btn-info text-white btn-sm"> <i class="fas fa-edit"></i></a>
                                                <form action="{{ route('front.community.productions.destroy', ['id' => $production->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin menghapus data produksi ini?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js-additional')
    <script>
        $("#productions-list").dataTable({
            "columnDefs": [
                { "sortable": false, "targets": [4] }
            ]
        });
    </script>
@endpush
