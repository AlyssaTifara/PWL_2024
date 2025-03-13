<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;

class UserController extends Model
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
            'level_id' => 4
        ];

        UserModel::insert($data);
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
    
    // use HasFactory;
    // protected $table = 'm_user';
    // protected $primaryKey = 'user_id';
}
