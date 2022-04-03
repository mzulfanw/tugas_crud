@extends('Admin.Temp.Base')
@section('content')
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                Form Update User
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required
                            value="{{ $user->username }}">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="">Level</label>
                        <select name="level" class="form-control">
                            <option value="{{ $user->level }}" selected>{{ $user->level }}</option>
                            <option value="admin">Admin</option>
                            <option value="operator">Operator</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Preview Image</label>
                        @if ($user->foto == null)
                            <img src="{{ asset('assets/users/notfound.png') }}" alt="Preview Image" class="img-thumbnail"
                                width="300">
                        @else
                            <img src="{{ asset('assets/users/' . $user->foto) }}" class="img-thumbnail"
                                style="height: 300px" alt="">
                        @endif

                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <div class=" row w-25">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <div class="col">
                            <a href="{{ route('admin.users') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
