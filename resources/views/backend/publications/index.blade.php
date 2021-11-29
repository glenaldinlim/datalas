@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Publikasi</h1>
        </div>
        <div class="section-body">
            <x-alert />
            <div class="row">
                <div class="card col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card-header">
                        <h4>List Publikasi</h4>
                        <div class="card-header-action">
                            <a href="{{ route('backend.publications.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="publication-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe</th>
                                        <th>Judul</th>
                                        <th>Status Publikasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($publications as $publication)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $publication->type }}</td>
                                            <td>{{ $publication->title }}</td>
                                            <td><span class="badge {{ $publication->published_status == 'Publish' ? "badge-success" : "badge-secondary"}}">{{ $publication->published_status }}</span></td>
                                            <td>
                                                <a href="{{ route('backend.publications.show', ['id' => $publication->id]) }}" class="btn btn-warning text-white btn-sm"> <i class="fas fa-eye"></i></a>
                                                <a href="{{ route('backend.publications.edit', ['id' => $publication->id]) }}" class="btn btn-info text-white btn-sm"> <i class="fas fa-edit"></i></a>
                                                <form action="{{ route('backend.publications.destroy', ['id' => $publication->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin menghapus publikasi ini?')">
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
        $("#publication-table").dataTable({
            "columnDefs": [
                { "sortable": false, "targets": [4] }
            ]
        });
    </script>
@endpush
