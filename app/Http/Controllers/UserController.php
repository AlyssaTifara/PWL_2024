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
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345'),
        // ];
        // UserModel::create($data);
        
        // $user = UserModel::findOr(20, ['username','nama'], function(){
        //     abort(404);
        // });
        $user = UserModel::where('level_id', 2)->count();
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
