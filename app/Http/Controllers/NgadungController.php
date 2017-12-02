<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ngadung;

class NgadungController extends Controller
{
    public function tambah_ngadung(){
        $id_mahasiswa = request('id_mahasiswa');
        $tanggal = request('date');
        $kehadiran = request('kehadiran');
        $i = 0;
        // dd($id_mahasiswa, $kehadiran);
        foreach ($id_mahasiswa as $id_mhs) {
            Ngadung::create([
                'id_mahasiswa' => $id_mhs, 
                'kehadiran' => $kehadiran[$i++], 
                'tanggal' => $tanggal,
            ]);
        }
        return redirect('/absen');
    }
}
