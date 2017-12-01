<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TambahUser extends Model
{
    protected $fillabel = ['name', 'nim', 'email', 'gedung', 'lorong', 'kamar', 'password', 'role'];
}