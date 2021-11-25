@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Komoditas</h1>
        </div>
        <div class="section-body">
            <x-alert />
            <div class="row">
                <div class="card col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card-header">
                        <h4>List Komoditas</h4>
                        <div class="card-header-action">
                            <a href="{{ route('backend.commodities.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="commodities-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Nama Komoditas</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commodities as $commodity)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $commodity->category->name}}</td>
                                            <td>{{ $commodity->name }}</td>
                                            <td><span class="badge {{ $commodity->is_active == 1 ? "badge-success" : "badge-danger"}}">{{ $commodity->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</span></td>
                                            <td>
                                                <a href="{{ route('backend.commodities.edit', ['id' => $commodity->id]) }}" class="btn btn-info text-white btn-sm"> <i class="fas fa-edit"></i></a>
                                                <form action="{{ route('backend.commodities.destroy', ['id' => $commodity->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete This commodity?')">
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
        $("#commodities-table").dataTable({
            "columnDefs": [
                { "sortable": false, "targets": [4] }
            ]
        });
    </script>
@endpush
