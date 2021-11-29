@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Komunitas</h1>
        </div>
        <div class="section-body">
            <x-alert />
            <div class="row">
                <div class="card col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card-header">
                        <h4>List Komunitas</h4>
                        <div class="card-header-action">
                            <a href="{{ route('backend.communities.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="communities-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Komunitas</th>
                                        <th>Region</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($communities as $community)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $community->name }}</td>
                                            <td>{{ $community->origin->name }}, {{ $community->province->name }}</td>
                                            <td><span class="badge {{ $community->is_active == 1 ? "badge-success" : "badge-danger"}}">{{ $community->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</span></td>
                                            <td>
                                                <a href="{{ route('backend.communities.show', ['id' => $community->id]) }}" class="btn btn-warning text-white btn-sm"> <i class="fas fa-eye"></i></a>
                                                <a href="{{ route('backend.communities.edit', ['id' => $community->id]) }}" class="btn btn-info text-white btn-sm"> <i class="fas fa-edit"></i></a>
                                                <form action="{{ route('backend.communities.destroy', ['id' => $community->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin menghapus komunitas ini?')">
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
        $("#communities-table").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [4]
            }]
        });

    </script>
@endpush
