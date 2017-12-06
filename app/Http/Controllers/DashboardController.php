<?php
 
namespace App\Http\Controllers;
 
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
 
class DashboardController extends Controller
{
    public function post(){
        $active = 'post';
        $absen = 'false';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        return view('pages.post', compact('active', 'role', 'absen'));
    }
 
    public function beranda(){
        $active = 'beranda';
        $absen = 'false';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        return view('pages.beranda', compact('active', 'role', 'absen'));
    }
 
    public function nilai(){
        $active = 'nilai';
        $absen = 'false';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        return view('pages.nilai', compact('active', 'role', 'absen'));
    }
 
    public function absen(){
        $active = 'absen';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        $users = User::all()->where('supervisor', $id);
        $nomor = 0;
        $absen = 'tambah';
        // dd($users);
        return view('pages.absen', compact('active', 'role', 'users', 'nomor', 'absen'));
    }
 
    public function absen_lihat(){
        $active = 'absen';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        $users = User::all()->where('supervisor', $id);
        $nomor = 0;
        $absen = 'lihat';
        // dd($users);
        return view('pages.absen-lihat', compact('active', 'role', 'users', 'nomor', 'absen'));
    }
 
    public function absen_edit(){
        $active = 'absen';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        $users = User::all()->where('supervisor', $id);
        $nomor = 0;
        $absen = 'edit';
        // dd($users);
        return view('pages.absen-edit', compact('active', 'role', 'users', 'nomor', 'absen'));
    }
 
    public function timeline(){
        $active = 'timeline';
        $absen = 'false';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        return view('pages.timeline', compact('active', 'role', 'absen'));
    }
 
    public function tambahadmin(){
        $active = 1;
        $absen = 'false';
        $supervisor = Auth::user()->id;
        $role = Auth::user()->role;
        if(($role !== 'Administrator')){
            return redirect('/');
        }
        return view('pages.tambah-administrator', compact('active', 'supervisor', 'role', 'absen'));
    }
 
    public function tambahsr(){
        $active = 2;
        $absen = 'false';
        $supervisor = Auth::user()->id;
        $role = Auth::user()->role;
        if(($role !== 'Administrator')){
            return redirect('/');
        }
        return view('pages.tambah-sr', compact('active', 'supervisor', 'role', 'absen'));
    }
 
    public function tambahmahasiswa(){
        $active = 3;
        $absen = 'false';
        $supervisor = Auth::user()->id;
        $role = Auth::user()->role;
        if(($role !== 'Administrator') and ($role !== 'Senior Resident')){
            return redirect('/');
        }
        return view('pages.tambah-mahasiswa', compact('active', 'supervisor', 'role', 'absen'));
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