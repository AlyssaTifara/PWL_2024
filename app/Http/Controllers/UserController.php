<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data);
        $data = [
            'username' => 'customer-1',
            'nama' => 'Pelanggan',
            'password' => Hash::make('12345'),
            'level_id' => 5
        ];

        UserModel::insert($data);
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
    public function user()
    {
        return view('POS.user');
    }
    public function showUser()
    {
        return view('user');
    }
}
