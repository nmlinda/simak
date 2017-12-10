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
        $this->validate(request(), [
            'judul' => 'required|max:144',
            'isi' => 'required|max:1000',
            'kategori' => 'required',
        ]);
        Post::create([
            'judul' => request('judul'),
            'isi' => request('isi'),
            'kategori' => request('kategori'),
            'id_mahasiswa' => Auth::user()->id
        ]);

        return redirect()->route('pages.post-saya')->withSuccess('Post anda berhasil dibuat.');
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
        $role = Auth::user()->role;
        $absen= 'false';
        $post->update([
            'judul' => request('judul'),
            'isi' => request('isi'),
            'kategori' => request('kategori'),
        ]);

        return redirect()->route('pages.post-saya')->withSuccess('Post anda berhasil diubah.');
    }

    public function hapus(Post $post)
    {
        $post->delete();
        $active = 12;
        $absen= 'false';
        return redirect()->route('pages.post-saya')->withSuccess('Post anda telah dihapus.');
    }

    public function detail(Post $post){
        $active = 12;
        $role = Auth::user()->role;
        $absen= 'false';
        return view('pages.post-detail', compact('post','active','role','absen'));
    }
}
