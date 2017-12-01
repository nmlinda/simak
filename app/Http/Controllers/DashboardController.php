<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function post(){
        $active = 'post';
        return view('pages.post', compact('active'));
    }

    public function beranda(){
        $active = 'beranda';
        return view('pages.beranda', compact('active'));
    }

    public function nilai(){
        $active = 'nilai';
        return view('pages.nilai', compact('active'));
    }

    public function absen(){
        $active = 'absen';
        return view('pages.absen', compact('active'));
    }

    public function timeline(){
        $active = 'timeline';
        return view('pages.timeline', compact('active'));
    }

    public function tambahuser(){
        $active = 'tambah-user';
        return view('pages.tambah-user', compact('active'));
    }
}
