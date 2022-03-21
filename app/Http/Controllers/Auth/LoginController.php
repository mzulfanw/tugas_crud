<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{


    public function index() {
        return view('welcome');
    }

    public function login(Request $request) {
        $username = $request->username;
        $password = $request->password;

        $user = Auth::attempt(['username' => $username, 'password' => $password]);
        if ($user) {
           return view('Admin.v_Dashboard');
        }else {
            return redirect()->back()->with('error', 'Username atau Password Salah');
        }
    }

}
