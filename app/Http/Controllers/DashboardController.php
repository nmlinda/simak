<?php
 
namespace App\Http\Controllers;
 
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Sodung;
use App\Solong;
use App\Ngadung;
use App\Ngalong;
use App\Apel;
use App\hariBersihAsrama;
use Illuminate\Support\Facades\DB;


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
        $id = Auth::user()->id;
        $posts = Post::All();
        $postSaya = Post::all()->where('id_mahasiswa', $id);
        $role = Auth::user()->role;
        if(($role !== 'Administrator' and $role !== 'Senior Resident')){
            return redirect('/');
        }
        return view('pages.post-saya', compact('active', 'role', 'absen','posts','postSaya'));
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
        $sum_sodung = 0;
        $sum_solong = 0;
        $sum_ngadung = 0;
        $sum_ngalong = 0;
        $sum_apel = 0;
        $sum_hariBersihAsrama = 0;
        $nomor2 = 0;
        $absen = 'lihat';
        $sodungs = Sodung::all()->groupBy('tanggal');
        foreach($sodungs as $sodung){
            $sum_sodung +=1;
        }
        $sodungs = DB::table('sodungs')->orderBy('tanggal', 'asc')->get();
        $solongs = Solong::all()->groupBy('tanggal');
        foreach($solongs as $solong){
            $sum_solong +=1;
        }
        $solongs = DB::table('solongs')->orderBy('tanggal', 'asc')->get();
        $ngadungs = Ngadung::all()->groupBy('tanggal');
        foreach($ngadungs as $ngadung){
            $sum_ngadung +=1;
        }
        $ngadungs = DB::table('ngadungs')->orderBy('tanggal', 'asc')->get();
        $ngalongs = Ngalong::all()->groupBy('tanggal');
        foreach($ngalongs as $ngalong){
            $sum_ngalong +=1;
        }
        $ngalongs = DB::table('ngalongs')->orderBy('tanggal', 'asc')->get();
        $apels = Apel::all()->groupBy('tanggal');
        foreach($apels as $apel){
            $sum_apel +=1;
        }
        $apels = DB::table('apels')->orderBy('tanggal', 'asc')->get();
        $hariBersihAsramas = hariBersihAsrama::all()->groupBy('tanggal');
        foreach($hariBersihAsramas as $hariBersihAsrama){
            $sum_hariBersihAsrama +=1;
        }
        $hariBersihAsramas = DB::table('hari_bersih_asramas')->orderBy('tanggal', 'asc')->get();
        // dd($sodungs);
        return view(
            'pages.absen-lihat', 
            compact(
                'active', 
                'role', 
                'users', 
                'nomor', 
                'nomor2',
                'absen', 
                'sum_sodung', 
                'sodungs',
                'sum_solong', 
                'solongs',
                'sum_ngadung',
                'ngadungs',
                'sum_ngalong',
                'ngalongs',
                'sum_apel',
                'apels',
                'sum_hariBersihAsrama',
                'hariBersihAsramas'
            ));
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