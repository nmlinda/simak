<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests;

class HomepageController extends Controller
{
    public function login(){
        return view('pages.login');
    }

    public function panduan(){
        return view('pages.panduan');
    }

    public function profil(){
        return view('pages.profil');
    }

    public function timeline(){
        return view('pages.timeline-home');
    }
}
