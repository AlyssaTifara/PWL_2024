<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response; 


class PageController extends Controller
{
    public function index(){
        return('Hello World');
    }

    public function about(){
        return('Alyssa Tifara Yuwono (2341760164)');
    }

    public function articles($id = null)
    {
        return 'Halaman Artikel dengan Id ' . $id;
    }
}