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
                            @hasrole('webmaster')
                                <a href="{{ route('backend.publications.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            @endhasrole
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="userslist">
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
                                            <td>{{ $publication->published_status }}</td>
                                            <td>
                                                <a href="{{ route('backend.publications.edit', ['id' => $publication->id]) }}" class="btn btn-info text-white btn-sm"> <i class="fas fa-edit"></i></a>
                                                <form action="{{ route('backend.publications.destroy', ['id' => $publication->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete This Publication?')">
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
        $("#userslist").dataTable({
            "columnDefs": [
                { "sortable": false, "targets": [3,5] }
            ]
        });
    </script>
@endpush
