<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\User;

class UserController extends Controller
{
    public function ganti_password(){
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        $active = 'beranda';
        $absen = 'false';
        // dd(Auth::user()->password);
        return view('pages.password', compact('role', 'active', 'absen'));
    }
    public function update_password(Request $request){
        $this->validate($request, [
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $plainPassword = request('old_password');
        $hashedPassword = Auth::user()->password;
        if (!Hash::check($plainPassword, $hashedPassword)) {
            return back()->with('danger','Password gagal diperbarui, silahkan masukan password lama anda.');
        }else{
            $id = Auth::user()->id;
            $user = User::find($id);
            $new_password = request('new_password');
            $user->update([
                'password'=> bcrypt($new_password),
            ]);
            return redirect('\beranda')->with('success','Password berhasil diperbarui.');
        }
    }
    public function edit_user(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'nim' => 'required|min:9|max:9',
            'email' => 'required|email',
            'gedung' => 'required',
            'lorong' => 'required',
            'kamar' => 'required',
        ]);
        $password = request('password');
        $id = request('id');
        $user = User::find($id);
        if(($password) != null){
            $user->update([
                'password'=> bcrypt($password),
            ]);
        }
        $user->update([
            'id' => request('id'),
            'name' => request('name'),
            'email' => request('email'),
            'gedung' => request('gedung'),
            'lorong' => request('lorong'),
            'kamar' => request('kamar'),
        ]);
        return redirect('\beranda')->with('success','Data berhasil diperbarui.');
    }
    public function destroy(){
        $id=request('id');
        User::where('id', $id)->delete();
        return redirect('/beranda')->with('success', 'User berhasil dihapus.');
    }
}
