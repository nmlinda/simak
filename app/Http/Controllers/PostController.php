<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\User;

class PostController extends Controller
{
    public function store()
    {
        Post::create([
            'judul' => request('judul'),
            'isi' => request('isi'),
            'kategori' => request('kategori'),
            'id_mahasiswa' => Auth::user()->id
        ]);

        return redirect('/beranda');
    }

   

}
