<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = [
        'judul', 'isi', 'kategori', 'id_mahasiswa', 'foto'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'id_mahasiswa');
    }

}
