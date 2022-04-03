<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $data = User::all();
        return view('Admin.User.v_Index', [
            'users' => $data
        ]);
    }


    public function create() {
        return view('Admin.User.v_Create');
    }

    public function store(Request $request) {

        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('assets/users/'), $imageName);

        $data = [
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'foto' => $imageName,
            'level' => $request->level
        ];

        $create = User::create($data);
        if ($create) {
            return redirect()->route('admin.users')->with('success', 'Data berhasil ditambahkan');
        }else {
            return redirect()->back()->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id) {
        $data = User::find($id);
        return view('Admin.User.v_Edit', [
            'user' => $data
        ]);
    }

    public function update($id, Request $request) {
        $user_id = User::findOrFail($id);
        // do update
        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('assets/users/'), $imageName);
        $doUpdate = $user_id->update([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'foto' => $imageName,
            'level' => $request->level
        ]);
        if ($doUpdate) {
            return redirect()->route('admin.users')->with('success', 'Data berhasil diubah');
        }else {
            return redirect()->back()->with('error', 'Data gagal diubah');
        }


    }

    public function view($id) {
        $data = User::findOrFail($id);
        return view('Admin.User.v_View', [
            'user' => $data
        ]);
    }


    public function destroy($id) {
        $delete = User::destroy($id);
        if ($delete) {
            return redirect()->route('admin.users')->with('success', 'Data berhasil dihapus');
        }
    }
}
