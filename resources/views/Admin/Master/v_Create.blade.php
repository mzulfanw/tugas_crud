@extends('Admin.Temp.Base')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Form Create Master Data
                </div>
                <div class="card-body">
                    {{-- @if (Session::get('error'))
                        <div class="alert alert-secondary" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif --}}
                    <form action="{{ route('admin.master-data.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" name="harga_jual" class="form-control" placeholder="Harga Jual" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" name="stokakhir" class="form-control" placeholder="Stok Akhir" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="log" class="form-control" placeholder="Log" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
