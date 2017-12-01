<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private function cek(){
        if(!(Auth::user())){
            return redirect('/');
        }
    }
    public function post(){
        $active = 'post';
        if(!(Auth::user())){
            return redirect('/');
        }    
        return view('pages.post', compact('active'));
    }

    public function beranda(){
        $active = 'beranda';
        if(!(Auth::user())){
            return redirect('/');
        }
        return view('pages.beranda', compact('active'));
    }

    public function nilai(){
        $active = 'nilai';
        if(!(Auth::user())){
            return redirect('/');
        }
        return view('pages.nilai', compact('active'));
    }

    public function absen(){
        $active = 'absen';
        if(!(Auth::user())){
            return redirect('/');
        }
        return view('pages.absen', compact('active'));
    }

    public function timeline(){
        $active = 'timeline';
        if(!(Auth::user())){
            return redirect('/');
        }
        return view('pages.timeline', compact('active'));
    }

    public function tambahadmin(){
        $active = 1;
        if(!(Auth::user())){
            return redirect('/');
        }
        return view('pages.tambah-administrator', compact('active'));
    }

    public function tambahsr(){
        $active = 2;
        if(!(Auth::user())){
            return redirect('/');
        }
        return view('pages.tambah-sr', compact('active'));
    }

    public function tambahmahasiswa(){
        $active = 3;
        if(!(Auth::user())){
            return redirect('/');
        }
        return view('pages.tambah-mahasiswa', compact('active'));
    }
}
