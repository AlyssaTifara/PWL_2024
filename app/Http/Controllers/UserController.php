<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index'); 
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
