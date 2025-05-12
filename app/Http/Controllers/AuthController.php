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

        public function profile()
        {
            $user = Auth::user();
            $activeMenu = 'profile';
    
            $breadcrumb = (object) [
                'title' => 'Profil Pengguna',
                'list'  => ['Home', 'Profil']
            ];
    
            return view('profile.index', compact('user', 'activeMenu', 'breadcrumb'))->with([
                'status' => true,
                'data' => $user
            ]);
        }
    
        public function update(Request $request)
        {
            $user = Auth::user();
    
            $rules = [
                'username' => 'required|string|min:3|unique:m_user,username,' . $user->user_id . ',user_id',
                'nama' => 'required|string|max:100',
                'password' => 'nullable|min:6|confirmed',
                'profile_picture' => 'nullable|mimes:jpeg,png,jpg|max:2048',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
    
            $user->username = $request->username;
            $user->nama = $request->nama;
    
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
    
            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/profile'), $filename);
                $user->profile_picture = $filename;
            }
    
            /** @var \App\Models\User $user **/
            $user->save();
    
            return redirect()->route('profile')
                ->with('success', 'Profil berhasil diperbarui');
        }
}