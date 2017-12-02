<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ngalong extends Model
{
    protected $fillable = [
        'id_mahasiswa', 'kehadiran', 'tanggal', 'model'
    ];
}
