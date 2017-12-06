<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('pages.post-buat');
    }

    public function store()
    {
        Post::create([
            'judul' => request('judul'),
            'isi' => request('isi'),
            'kategori' => request('kategori')
            
        ]);

        return redirect('pages.beranda');
    }
}
