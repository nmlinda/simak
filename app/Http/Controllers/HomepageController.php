<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Http\Requests;

class HomepageController extends Controller
{
    public function home(){
        $active = 'home';
        $posts = Post::latest()->paginate(4);
        return view('pages.homepage', compact('active','posts'));
    }

    public function login(){
        return view('pages.login');
    }

    public function panduan(){
        $active = 'panduan';
        return view('pages.panduan', compact('active'));
    }

    public function profil(){
        $active = 'profil';
        return view('pages.profil', compact('active'));
    }

    public function timeline(){
        $active = 'tl';
        return view('pages.timeline-home', compact('active'));
    }
}
