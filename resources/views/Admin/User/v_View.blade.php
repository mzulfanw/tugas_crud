@extends('Admin.Temp.Base')
@section('content')
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h3>Detail User </h3>
            </div>
            <div class="card-body">
                <h4>Detail User</h4>
                <div class="container">
                    <p>Username : {{ $user->username }}</p>
                    <p>Password : {{ $user->password }}</p>
                    <p>Level : {{ $user->level }}</p>
                    @if ($user->foto == null)
                        <img src="{{ asset('assets/users/notfound.png') }}" alt="" class="img-thumbnail"
                            style="height: 50px">
                        <p>Not Found</p>
                    @else
                        <img src="{{ asset('assets/users/' . $user->foto) }}" class="img-thumbnail d-block mb-3"
                            style="height: 300px" alt="">
                    @endif
                    <a href="{{ route('admin.users') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
