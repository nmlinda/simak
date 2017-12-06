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
    public function tambah_kegiatan(){
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
        return redirect('/absen-tambah')->with('status' , 'your message has been saved');
    }
}
