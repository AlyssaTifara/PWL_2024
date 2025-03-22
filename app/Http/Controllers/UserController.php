<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;

class UserController extends Controller
{
//     public function index()
//     {
//         $breadcrumb = (object) [
//             'title' => 'Daftar User',
//             'list'  => ['Home', 'User']
//         ];

//         $page = (object) [
//             'title' => 'Daftar user yang terdaftar dalam sistem'
//         ];

//         $activeMenu = 'user'; // set menu yang sedang aktif

//         return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
//     }
    
//     // Ambil data user dalam bentuk json untuk datatables
// public function list(Request $request)
// {
//     $user = UserModel::select('user_id', 'username', 'nama', 'level_id')
//                         ->with('level');

//     return DataTables::of($user)
//         // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
//         ->addIndexColumn()
//         ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
//             $btn = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a> ';
//             $btn .= '<a href="'.url('/user/' . $user->user_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
//             $btn .= '<form class="d-inline-block" method="POST" action="'.url('/user/' . $user->user_id).'">'
//                     . csrf_field() . method_field('DELETE') .
//                     '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\')">Hapus</button></form>';
//             return $btn;
//         })
//         ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
//         ->make(true);
// }


    public function tambah(){
        return view('user_tambah');
    }
    
    public function user()
    {
        return view('POS.user');
    }
    
    public function showUser()
    {
        return view('user');
    }
    
    public function tambah_simpan(Request $request){
        $request->validate([
            'username' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'level_id' => 'required|integer|exists:levels,id',
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ]);
        return redirect('/user');
    }

    public function ubah($id){
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan(Request $request, $id){
        $request->validate([
            'username' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'level_id' => 'required|integer|exists:levels,id',
        ]);

        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;

        $user->save();
        return redirect('/user');
    }

    public function hapus($id){
        $user = UserModel::find($id);
        $user->delete();
        return redirect('/user');
    }
}
