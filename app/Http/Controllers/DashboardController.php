<?php
 
namespace App\Http\Controllers;
 
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;
 
class DashboardController extends Controller
{
    public function beranda(){
        $active = 'beranda';
        $absen = 'false';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        return view('pages.beranda', compact('active', 'role', 'absen'));
    }
    
    public function post(){
        $active = 11;
        $absen = 'false';
        $role = Auth::user()->role;
        if(($role !== 'Administrator' and $role !== 'Senior Resident')){
            return redirect('/');
        }
        return view('pages.post-buat', compact('active', 'role', 'absen'));
    }

    public function post_saya(){
        $active = 12;
        $absen = 'false';
        $role = Auth::user()->role;
        if(($role !== 'Administrator' and $role !== 'Senior Resident')){
            return redirect('/');
        }
        return view('pages.post-saya', compact('active', 'role', 'absen'));
    }

    public function post_semua(){
        $active = 13;
        $absen = 'false';
        $posts = Post::All();
        $role = Auth::user()->role;
        if(($role !== 'Administrator' and $role !== 'Senior Resident')){
            return redirect('/');
        }
        return view('pages.post-semua', compact('active', 'role', 'absen','posts'));
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