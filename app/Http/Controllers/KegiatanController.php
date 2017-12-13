<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sodung;
use App\Solong;
use App\Ngadung;
use App\Ngalong;
use App\Apel;
use App\hariBersihAsrama;
use App\Http\Controllers\Controller;

class KegiatanController extends Controller
{
    public function tambah_kegiatan(Request $request){
        
        $this->validate($request, [
            'date' => 'required',
            // 'kehadiran' => 'required',
        ]);
        
        $id_mahasiswa = request('id_mahasiswa');
        $tanggal = request('date');
        $kehadiran = request('kehadiran');
        $i = 0;
        $model = request('model');
        if ($model == 'Sodung'){
            foreach ($id_mahasiswa as $id_mhs) {
                Sodung::create([
                    'id_mahasiswa' => $id_mhs, 
                    'kehadiran' => $kehadiran[$i++], 
                    'tanggal' => $tanggal,
                ]);
            }
        }
        if ($model == 'Solong'){
            foreach ($id_mahasiswa as $id_mhs) {
                Solong::create([
                    'id_mahasiswa' => $id_mhs, 
                    'kehadiran' => $kehadiran[$i++], 
                    'tanggal' => $tanggal,
                ]);
            }
        }
        if ($model == 'Ngadung'){
            foreach ($id_mahasiswa as $id_mhs) {
                Ngadung::create([
                    'id_mahasiswa' => $id_mhs, 
                    'kehadiran' => $kehadiran[$i++], 
                    'tanggal' => $tanggal,
                ]);
            }
        }
        if ($model == 'Ngalong'){
            foreach ($id_mahasiswa as $id_mhs) {
                Ngalong::create([
                    'id_mahasiswa' => $id_mhs, 
                    'kehadiran' => $kehadiran[$i++], 
                    'tanggal' => $tanggal,
                ]);
            }
        }
        if ($model == 'Apel'){
            foreach ($id_mahasiswa as $id_mhs) {
                Apel::create([
                    'id_mahasiswa' => $id_mhs, 
                    'kehadiran' => $kehadiran[$i++], 
                    'tanggal' => $tanggal,
                ]);
            }
        }
        if ($model == 'HBA'){
            foreach ($id_mahasiswa as $id_mhs) {
                hariBersihAsrama::create([
                    'id_mahasiswa' => $id_mhs, 
                    'kehadiran' => $kehadiran[$i++], 
                    'tanggal' => $tanggal,
                ]);
            }
        }
        return redirect('/absen/tambah')->with('success' , 'Absensi berhasil dimasukan');
    }

    public function lihat_kegiatan(){
        $sodung = Sodung::all();
        $solong = Solong::all();
        $ngadung = Ngadung::all();
        $ngalong = Ngalong::all();
        $apel = Apel::all();
        $hba = hariBersihAsrama::all();
    }

    public function editAbsen(){
        $ids = request('ids');
        $model = request('model');
        $kehadirans = request('kehadirans');
        if($model == 'sodung'){
            foreach (array_combine($ids, $kehadirans) as $id => $kehadiran) {
                $sodung = Sodung::find($id);
                // dd($kehadiran);
                $sodung->update([
                    'kehadiran'=>$kehadiran
                ]);
            }
        }
        if($model == 'solong'){
            foreach (array_combine($ids, $kehadirans) as $id => $kehadiran) {
                $sodung = Solong::find($id);
                // dd($kehadiran);
                $sodung->update([
                    'kehadiran'=>$kehadiran
                ]);
            }
        }
        if($model == 'ngadung'){
            foreach (array_combine($ids, $kehadirans) as $id => $kehadiran) {
                $sodung = Ngadung::find($id);
                // dd($kehadiran);
                $sodung->update([
                    'kehadiran'=>$kehadiran
                ]);
            }
        }
        if($model == 'ngalong'){
            foreach (array_combine($ids, $kehadirans) as $id => $kehadiran) {
                $sodung = Ngalong::find($id);
                // dd($kehadiran);
                $sodung->update([
                    'kehadiran'=>$kehadiran
                ]);
            }
        }
        if($model == 'apel'){
            foreach (array_combine($ids, $kehadirans) as $id => $kehadiran) {
                $sodung = Apel::find($id);
                // dd($kehadiran);
                $sodung->update([
                    'kehadiran'=>$kehadiran
                ]);
            }
        }
        if($model == 'hariBersihAsrama'){
            foreach (array_combine($ids, $kehadirans) as $id => $kehadiran) {
                $sodung = hariBersihAsrama::find($id);
                // dd($kehadiran);
                $sodung->update([
                    'kehadiran'=>$kehadiran
                ]);
            }
        }
        return redirect()->route('pages.absen/lihat')->with('success' , 'Data berhasil diperbarui');
    }
}
