<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;

class TambahUserController extends Controller
{
    use RegistersUsers;

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nim' => 'required|string|max:9|unique:users',
        ]);
    }

    // protected function administrator(array $data)
    // {
    //     User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'gedung' => $data['gedung'],
    //         'lorong' => $data['lorong'],
    //         'kamar' => $data['kamar'],
    //         'password' => Hash::make($data['password']),
    //         'role' => $data['role'],
    //         'nim' => $data['nim'],
    //     ]);
    //     return redirect('/tambah-administrator');
    // }

    public function administrator()
    {
        $password = request('password');

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt($password),
            'gedung' => request('gedung'),
            'lorong' => request('lorong'),
            'kamar' => request('kamar'),
            'role' => 'Administrator',
            'nim' => request('nim'),
            'supervisor' => request('supervisor'),
        ]);
        return redirect('/tambah-administrator')->with('success', 'Administrator berhasil ditambahkan');
    }

    public function SR()
    {
        $password = request('password');

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt($password),
            'gedung' => request('gedung'),
            'lorong' => request('lorong'),
            'kamar' => request('kamar'),
            'role' => 'Senior Resident',
            'nim' => request('nim'),
            'supervisor' => request('supervisor'),
        ]);
        return redirect('/tambah-sr')->with('success', 'Senior Resident berhasil ditambahkan');
    }

    public function mahasiswa()
    {
        $password = request('password');

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt($password),
            'gedung' => request('gedung'),
            'lorong' => request('lorong'),
            'kamar' => request('kamar'),
            'role' => 'Mahasiswa',
            'nim' => request('nim'),
            'supervisor' => request('supervisor'),
        ]);
        return redirect('/tambah-mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan');
    }
}
