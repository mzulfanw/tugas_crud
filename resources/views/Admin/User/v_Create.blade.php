@extends('Admin.Temp.Base')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Form Create User
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="">Level</label>
                            <select name="level" class="form-control">
                                <option value="" disabled selected>-- Pilih --</option>
                                <option value="admin">Admin</option>
                                <option value="operator">Operator</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="foto">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
