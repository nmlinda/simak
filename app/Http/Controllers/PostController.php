<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $this->validate(request(), [
            'judul' => 'required|max:144',
            'isi' => 'required',
            'kategori' => 'required',
            'foto' => 'mimes:jpeg,png,jpg|max:15000',
        ]);

        Post::create([
            'judul' => request('judul'),
            'isi' => request('isi'),
            'kategori' => request('kategori'),
            'foto' => request('foto') -> store('foto'),
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
        $this->validate(request(), [
            'judul' => 'required|max:144',
            'isi' => 'required',
            'kategori' => 'required',
            // 'foto' => 'mimes:jpeg,png,jpg|max:15000',
        ]);
        $active = 12;
        $role = Auth::user()->role;
        $absen= 'false';
        $post->update([
            'judul' => request('judul'),
            'isi' => request('isi'),
            'kategori' => request('kategori'),
            //'foto' => request('foto') -> update('foto'),
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
        $active = 'home';
        if(!isset(Auth::user()->role)) {
            return view('pages.post-detail2', compact('post', 'active'));
        }
        $active = 12;
        $role = Auth::user()->role;
        $absen= 'false';
        return view('pages.post-detail', compact('post','active','role','absen'));
    }

    // public function indexSaya(){
    //     $active =12;
    //     $role = Auth::user()->role;
    //     $absen= 'false';

    //     return view('pages.post-saya', compact('active','role','absen'));
    // }

    public function cariSaya(Request $request){
        $active = 12;
        $role = Auth::user()->role;
        $absen= 'false';
        $id = Auth::user()->id;

        $input = $request->get('cari');
        $keyword = Post::where('judul','LIKE','%'.$input.'%')
            ->orwhere('isi','LIKE','%'.$input.'%')
            ->orwhere('kategori','LIKE','%'.$input.'%')
            ->where('id_mahasiswa', $id)
            ->latest()->paginate(5);
        
        return view('pages.post-saya-hasil', compact('active','role','absen','input','keyword'));
    }

    public function cariSemua(Request $request){
        $active = 13;
        $role = Auth::user()->role;
        $absen= 'false';
        $id = Auth::user()->id;

        $input = $request->get('cari');
        $keyword = Post::where('judul','LIKE','%'.$input.'%')
            ->orwhere('isi','LIKE','%'.$input.'%')
            ->orwhere('kategori','LIKE','%'.$input.'%')
            ->latest()->paginate(5);
        
        return view('pages.post-semua-hasil', compact('active','role','absen','input','keyword'));
    }
    
}
