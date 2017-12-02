<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solong extends Model
{
    protected $fillable = [
        'id_mahasiswa', 'kehadiran', 'tanggal', 'model'
    ];
}
