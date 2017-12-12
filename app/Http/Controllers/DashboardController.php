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
use Carbon\Carbon;

use App\Post;
 
class DashboardController extends Controller
{
    public function beranda(){
        if(!(Auth::user())){
            return redirect('/');
        }
        $active = 'beranda';
        $absen = 'false';
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        if($role == 'Mahasiswa'){
            $sodungs = Sodung::all()->where('id_mahasiswa', $id);
            $solongs = Solong::all()->where('id_mahasiswa', $id);
            $ngadungs = Ngadung::all()->where('id_mahasiswa', $id);
            $ngalongs = Ngalong::all()->where('id_mahasiswa', $id);
            $apels = Apel::all()->where('id_mahasiswa', $id);
            $hariBersihAsramas = hariBersihAsrama::all()->where('id_mahasiswa', $id);
            //inisiasi x-axis
            $i =-1;
            $temp = 0;
            $jumlah_kegiatan=0;
            $jumlah_kehadiran=0;
            foreach ($sodungs as $sodung){
                if($temp != date('Y-m', strtotime($sodung->tanggal))){
                    $temp = date('Y-m', strtotime($sodung->tanggal));
                    $i++;
                }
                $dt_sodungs[$temp] = 0;
                $dt_sodungs[date('Y-m', strtotime("+1 month", strtotime($temp)))] = 0;
                // $dt_sodungs[date('Y-m', strtotime("+2 month", strtotime($temp)))] = 0;
                $dt_sodungs_hadir[$i] = 0;
                // $dt_sodungs_hadir[$i+1] = 0;
            }
            $i = -1;
            $temp = 0;
            foreach ($sodungs as $sodung){
                if($temp != date('Y-m', strtotime($sodung->tanggal))){
                    $temp = date('Y-m', strtotime($sodung->tanggal));
                    $i++;
                }
                $dt_sodungs[$temp] += 1;
                $dt_sodungs_hadir[$i] += $sodung->kehadiran;
            }
            $i=0;
            foreach ($dt_sodungs as $dt){
                $jumlah_kegiatan += $dt;
                $jumlah_kehadiran += $dt_sodungs_hadir[$i];
                if ($dt != 0)
                    $dt_sodungs_hadir[$i] /= $dt;
                else
                    $dt_sodungs_hadir[$i] = 0;
                $i++;
            }
            //data solong
            $i =-1;
            $temp = 0;
            foreach ($solongs as $solong){
                if($temp != date('Y-m', strtotime($solong->tanggal))){
                    $temp = date('Y-m', strtotime($solong->tanggal));
                    $i++;
                }
                $dt_solongs[$temp] = 0;
                $dt_solongs_hadir[$i] = 0;
            }
            $i = -1;
            $temp = 0;
            foreach ($solongs as $solong){
                if($temp != date('Y-m', strtotime($solong->tanggal))){
                    $temp = date('Y-m', strtotime($solong->tanggal));
                    $i++;
                }
                $dt_solongs[$temp] += 1;
                $dt_solongs_hadir[$i] += $solong->kehadiran;
            }
            $i=0;
            foreach ($dt_solongs as $dt){
                $jumlah_kegiatan += $dt;
                $jumlah_kehadiran += $dt_solongs_hadir[$i];
                if ($dt != 0)
                    $dt_solongs_hadir[$i] /= $dt;
                else
                    $dt_solongs_hadir[$i] = 0;
                $i++;
            }
            //data ngadung
            $i =-1;
            $temp = 0;
            foreach ($ngadungs as $ngadung){
                if($temp != date('Y-m', strtotime($ngadung->tanggal))){
                    $temp = date('Y-m', strtotime($ngadung->tanggal));
                    $i++;
                }
                $dt_ngadungs[$temp] = 0;
                $dt_ngadungs_hadir[$i] = 0;
            }
            $i = -1;
            $temp = 0;
            foreach ($ngadungs as $ngadung){
                if($temp != date('Y-m', strtotime($ngadung->tanggal))){
                    $temp = date('Y-m', strtotime($ngadung->tanggal));
                    $i++;
                }
                $dt_ngadungs[$temp] += 1;
                $dt_ngadungs_hadir[$i] += $ngadung->kehadiran;
            }
            $i=0;
            foreach ($dt_ngadungs as $dt){
                $jumlah_kegiatan += $dt;
                $jumlah_kehadiran += $dt_ngadungs_hadir[$i];
                if ($dt != 0)
                    $dt_ngadungs_hadir[$i] /= $dt;
                else
                    $dt_ngadungs_hadir[$i] = 0;
                $i++;
            }
            //data ngalong
            $i =-1;
            $temp = 0;
            foreach ($ngalongs as $ngalong){
                if($temp != date('Y-m', strtotime($ngalong->tanggal))){
                    $temp = date('Y-m', strtotime($ngalong->tanggal));
                    $i++;
                }
                $dt_ngalongs[$temp] = 0;
                $dt_ngalongs_hadir[$i] = 0;
            }
            $i = -1;
            $temp = 0;
            foreach ($ngalongs as $ngalong){
                if($temp != date('Y-m', strtotime($ngalong->tanggal))){
                    $temp = date('Y-m', strtotime($ngalong->tanggal));
                    $i++;
                }
                $dt_ngalongs[$temp] += 1;
                $dt_ngalongs_hadir[$i] += $ngalong->kehadiran;
            }
            $i=0;
            foreach ($dt_ngalongs as $dt){
                $jumlah_kegiatan += $dt;
                $jumlah_kehadiran += $dt_ngalongs_hadir[$i];
                if ($dt != 0)
                    $dt_ngalongs_hadir[$i] /= $dt;
                else
                    $dt_ngalongs_hadir[$i] = 0;
                $i++;
            }
            //data apel
            $i =-1;
            $temp = 0;
            foreach ($apels as $apel){
                if($temp != date('Y-m', strtotime($apel->tanggal))){
                    $temp = date('Y-m', strtotime($apel->tanggal));
                    $i++;
                }
                $dt_apels[$temp] = 0;
                $dt_apels_hadir[$i] = 0;
            }
            $i = -1;
            $temp = 0;
            foreach ($apels as $apel){
                if($temp != date('Y-m', strtotime($apel->tanggal))){
                    $temp = date('Y-m', strtotime($apel->tanggal));
                    $i++;
                }
                $dt_apels[$temp] += 1;
                $dt_apels_hadir[$i] += $apel->kehadiran;
            }
            $i=0;
            foreach ($dt_apels as $dt){
                $jumlah_kegiatan += $dt;
                $jumlah_kehadiran += $dt_apels_hadir[$i];
                if ($dt != 0)
                    $dt_apels_hadir[$i] /= $dt;
                else
                    $dt_apels_hadir[$i] = 0;
                $i++;
            }
            //data hariBersihAsrama
            $i =-1;
            $temp = 0;
            foreach ($hariBersihAsramas as $hariBersihAsrama){
                if($temp != date('Y-m', strtotime($hariBersihAsrama->tanggal))){
                    $temp = date('Y-m', strtotime($hariBersihAsrama->tanggal));
                    $i++;
                }
                $dt_hariBersihAsramas[$temp] = 0;
                $dt_hariBersihAsramas_hadir[$i] = 0;
            }
            $i = -1;
            $temp = 0;
            foreach ($hariBersihAsramas as $hariBersihAsrama){
                if($temp != date('Y-m', strtotime($hariBersihAsrama->tanggal))){
                    $temp = date('Y-m', strtotime($hariBersihAsrama->tanggal));
                    $i++;
                }
                $dt_hariBersihAsramas[$temp] += 1;
                $dt_hariBersihAsramas_hadir[$i] += $hariBersihAsrama->kehadiran;
            }
            $i=0;
            foreach ($dt_hariBersihAsramas as $dt){
                $jumlah_kegiatan += $dt;
                $jumlah_kehadiran += $dt_hariBersihAsramas_hadir[$i];
                if ($dt != 0)
                    $dt_hariBersihAsramas_hadir[$i] /= $dt;
                else
                    $dt_hariBersihAsramas_hadir[$i] = 0;
                $i++;
            }
            // dd($jumlah_kegiatan, $jumlah_kehadiran);
            return view(
                'pages.beranda', 
                compact(
                    'active', 
                    'role', 
                    'absen', 
                    'dt_sodungs',
                    'dt_sodungs_hadir',
                    'dt_solongs_hadir',
                    'dt_ngadungs_hadir',
                    'dt_ngalongs_hadir',
                    'dt_apels_hadir',
                    'dt_hariBersihAsramas_hadir',
                    'jumlah_kegiatan', 
                    'jumlah_kehadiran'
            ));
        }
        return view(
            'pages.beranda', 
            compact(
                'active', 
                'role', 
                'absen'
        ));
    }
    
    public function post(){
        if(!(Auth::user())){
            return redirect('/');
        }
        $active = 11;
        $absen = 'false';
        $role = Auth::user()->role;
        if(($role !== 'Administrator' and $role !== 'Senior Resident')){
            return redirect('/');
        }
        return view('pages.post-buat', compact('active', 'role', 'absen'));
    }

    public function post_saya(){
        if(!(Auth::user())){
            return redirect('/');
        }
        $active = 12;
        $absen = 'false';
        $id = Auth::user()->id;
        $posts = Post::latest()->paginate(5);
        $postSaya = Post::All()->where('id_mahasiswa', $id);
        $role = Auth::user()->role;
        if(($role !== 'Administrator' and $role !== 'Senior Resident')){
            return redirect('/');
        }
        return view('pages.post-saya', compact('active', 'role', 'absen','posts','postSaya'));
    }

    public function post_semua(){
        if(!(Auth::user())){
            return redirect('/');
        }
        $active = 13;
        $absen = 'false';
        
        $posts = Post::latest()->paginate(5);
        $role = Auth::user()->role;
        if(($role !== 'Administrator' and $role !== 'Senior Resident')){
            return redirect('/');   
        }
        return view('pages.post-semua', compact('active', 'role', 'absen','posts','pengirim'));
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
        $users = User::all()->where('supervisor', $id)->where('role', 'Mahasiswa');
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
        $users = User::all()->where('supervisor', $id)->where('role', 'Mahasiswa');
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
        if(!(Auth::user())){
            return redirect('/');
        }
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
        if(!(Auth::user())){
            return redirect('/');
        }
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
        if(!(Auth::user())){
            return redirect('/');
        }
        $active = 3;
        $absen = 'false';
        $supervisor = Auth::user()->id;
        $role = Auth::user()->role;
        if(($role !== 'Administrator') and ($role !== 'Senior Resident')){
            return redirect('/');
        }
        return view('pages.tambah-mahasiswa', compact('active', 'supervisor', 'role', 'absen'));
    }
}