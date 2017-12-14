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
            'isi' => 'required|max:1000',
            'kategori' => 'required',
            'foto' => 'mimes:jpeg,png,jpg|max:15000',
        ]);

        // $foto = $request->file('foto')->store('fotos');
       
        // $gambar = $request->foto;
        // $namaFile = $gambar->getClientOriginalName();
        // $request->foto->move('uploadgambar', $namaFile);
        // $do = new Post($request->all());
        // $do->file_gambar = $namaFile;
        // $do->save();
        // return redirect('pages.post-saya');

        // $photo1 = "";
        // if ($request->hasFile('foto')){ //has file itu meminta nama databasenya bukan classnya
        //     $ip = request()->ip();
        //     $file = $request->foto;
        //     $fileName = str_random(40) . '.' . $file->guessClientExtension();;
        //     $getPath = 'http://180.244.234.254/simak/public/img/' . $fileName;
        //     $destinationPath = "storage/fotos";
        //     $data['foto'] = '../'. $destinationPath . '/' . $fileName;
        //     $file -> move($destinationPath, $getPath,$fileName);
        //     $photo1 = $fileName;
        //     $data['user'] = $user->email;
        // }

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
        $this->validate(request(), [
            'judul' => 'required|max:144',
            'isi' => 'required|max:1000',
            'kategori' => 'required',
        ]);
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
