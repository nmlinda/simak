<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apel extends Model
{
    protected $fillable = [
        'id_mahasiswa', 'kehadiran', 'tanggal', 'model'
    ];
}
