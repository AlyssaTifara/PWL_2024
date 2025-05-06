<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) { // jika sudah login, maka redirect ke halaman home
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }

        return redirect('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postregister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:m_users,username',
            'password' => 'required|string|min:6',
            'level_id' => 'required|exists:m_levels,level_id',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            UserModel::create([
                'level_id' => $request->level_id,
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            return redirect('login')->with('success', 'Registrasi Berhasil, silahkan login.');
        } catch (\Exception $e) {
            return redirect('register')->with('error', 'Registrasi Gagal: ' . $e->getMessage())->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}