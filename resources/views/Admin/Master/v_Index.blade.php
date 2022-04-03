@extends('Admin.Temp.Base')
@push('custom-css')
    <link rel="stylesheet" href="{{ asset('/assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/fontawesome/all.min.css') }}">
@endpush
@section('content')
    <div class="page-heading">
        <h3>Master Data</h3>
    </div>
    <div class="page-content">
        <div class="container">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Table Master Data
                        <a href="{{ route('admin.master-data.create') }}" class="btn btn-primary btn-sm float-end">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        @if (Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <table class="table" id="table_master">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Jual</th>
                                    <th>Stok Akhir</th>
                                    <th>Log</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($master_data as $idx => $value)
                                    <tr>
                                        <td>{{ $idx + 1 }}</td>
                                        <td>{{ $value->kd_barang }}</td>
                                        <td>{{ $value->nama_barang }}</td>
                                        <td>{{ number_format($value->harga_jual, 2) }}</td>
                                        <td>{{ $value->stokakhir }}</td>
                                        <td>{{ $value->log }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ route('admin.master-data.edit', $value->kd_barang) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ route('admin.master-data.view', $value->kd_barang) }}"
                                                        class="btn btn-secondary btn-sm">View</a>
                                                </div>
                                                <div class="col">
                                                    <form
                                                        action="{{ route('admin.master-data.destroy', $value->kd_barang) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@push('custom-js')
    <script src="{{ asset('/assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/jquery-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js') }}">
    </script>
    <script src="{{ asset('/assets/vendors/fontawesome/all.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table_master').DataTable();
        })
    </script>
@endpush
