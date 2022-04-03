@extends('Admin.Temp.Base')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>View Data {{ $master_data->nama_barang }}</h3>
                </div>
                <div class="card-body">
                    <h4>Detail Data</h4>
                    <div class="container">
                        <p>Nama Barang : {{ $master_data->nama_barang }}</p>
                        <p>Harga Jual : {{ number_format($master_data->harga_jual, 2) }}</p>
                        <p>Stok Akhir : {{ $master_data->stokakhir }}</p>
                        <p>Log : {{ $master_data->log }}</p>
                    </div>
                    <a href="{{ route('admin.master-data.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
