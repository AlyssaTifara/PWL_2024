<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::create([
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2,
        ]);

        $user->username = 'manager12';

        $user->save();

        $user->wasChanged(); // true
        $user->wasChanged('username'); // true
        $user->wasChanged('nama'); // false
        $user->wasChanged(['nama', 'username']); // true
        dd($user->wasChanged(['nama', 'username']));
        // $user->isClean(); // false
        // $user->isClean('username'); // false
        // $user->isClean('nama'); // true
        // $user->isClean(['nama', 'username']); // false

        // $user->isDirty(); // false
        // $user->isClean(); // true
        // dd($user->isDirty());
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
