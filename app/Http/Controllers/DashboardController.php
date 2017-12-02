<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function post(){
        $active = 'post';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        return view('pages.post', compact('active', 'role'));
    }

    public function beranda(){
        $active = 'beranda';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        return view('pages.beranda', compact('active', 'role'));
    }

    public function nilai(){
        $active = 'nilai';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        return view('pages.nilai', compact('active', 'role'));
    }

    public function absen(){
        $active = 'absen';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        return view('pages.absen', compact('active', 'role'));
    }

    public function timeline(){
        $active = 'timeline';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        return view('pages.timeline', compact('active', 'role'));
    }

    public function tambahadmin(){
        $active = 1;
        $supervisor = Auth::user()->id;
        $role = Auth::user()->role;
        if(($role !== 'Administrator')){
            return redirect('/');
        }
        return view('pages.tambah-administrator', compact('active', 'supervisor', 'role'));
    }

    public function tambahsr(){
        $active = 2;
        $supervisor = Auth::user()->id;
        $role = Auth::user()->role;
        if(($role !== 'Administrator')){
            return redirect('/');
        }
        return view('pages.tambah-sr', compact('active', 'supervisor', 'role'));
    }

    public function tambahmahasiswa(){
        $active = 3;
        $supervisor = Auth::user()->id;
        $role = Auth::user()->role;
        if(($role !== 'Administrator') and ($role !== 'Senior Resident')){
            return redirect('/');
        }
        return view('pages.tambah-mahasiswa', compact('active', 'supervisor', 'role'));
    }

    // public function test(){
    //     $supervisor = Auth::user()->id;
    //     $role = Auth::user()->role;
    //     $admin = 'Administrator';
    //     $sr = 'Senior Resident';
    //     if ( ($role !== $admin) or ($role !== $sr)) $test = 'true';
    //     else $test = 'false';
    //     return view('test', compact('supervisor', 'role', 'admin', 'sr', 'test'));
    // }
}
