@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Aktivitas Akses</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="card col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card-header">
                        <h4>List Aktivitas Akses</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="accesses-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pengguna</th>
                                        <th>Deskripsi</th>
                                        <th>IP Address</th>
                                        <th>Browser</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accesses as $log)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $log->user_id }}</td>
                                            <td>{{ $log->description }}</td>
                                            <td>{{ $log->ip_address }}</td>
                                            <td>{{ $log->browser }}</td>
                                            <td>{{ $log->time }}</td>
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
        $("#accesses-table").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [3]
            }]
        });
    </script>
@endpush
