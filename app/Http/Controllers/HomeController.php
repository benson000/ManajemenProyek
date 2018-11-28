<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function admin(Request $req){
        return view('/admin')->withMessage('Admin');
    }
    public function dosen(Request $req){
        return view('/dosen')->withMessage('Dosen');
    }
     public function ormawa(Request $req){
        return view('/ormawa')->withMessage('Ormawa');
    }
    public function mahasiswa(Request $req){
        return view('/mahasiswa')->withMessage('Mahasiswa');
    }
}
