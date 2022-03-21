@extends('Admin.Temp.Base')
@push('custom-css')
    <link rel="stylesheet" href="{{ asset('/assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/fontawesome/all.min.css') }}">
@endpush
@section('content')
    <div class="page-heading">
        <h3>Data Users</h3>
    </div>
    <div class="page-content">
        <div class="container">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Table User
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm float-end">Tambah</a>
                    </div>
                    <div class="card-body">
                        @if (Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <table class="table" id="table_user">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Foto</th>
                                    <th>Level</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $idx => $value)
                                    <tr>
                                        <td>{{ $idx + 1 }}</td>
                                        <td>{{ $value->username }}</td>
                                        <td>{{ $value->password }}</td>
                                        <td>
                                            @if ($value->foto == null)
                                                <img src="{{ asset('assets/users/notfound.png') }}" alt=""
                                                    class="img-thumbnail" style="height: 50px">
                                            @else
                                                <img src="{{ asset('assets/users/' . $value->foto) }}"
                                                    class="img-thumbnail" style="height: 50px" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $value->level }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="" class="btn btn-warning btn-sm">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="" class="btn btn-secondary btn-sm">
                                                        View
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <form action="{{ route('admin.users.destroy', $value->id) }}"
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
            $('#table_user').DataTable();
        })
    </script>
@endpush
