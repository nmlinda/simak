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

    public function edit(Post $post)
    {
        $active =12;
        $role = Auth::user()->role;
        $absen= 'false';
        return view('pages.post-edit', compact('post','active','role','absen'));
    }
    
    public function update(Post $post)
    {
        $active = 12;
        $post->update([
            'judul' => request('judul'),
            'isi' => request('isi'),
            'kategori' => request('kategori'),
        ]);

        return redirect()->route('pages.post-saya');
    }

}
