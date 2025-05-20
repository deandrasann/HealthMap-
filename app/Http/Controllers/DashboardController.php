<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view ('navbar');
    }
    public function dashboard(){
        return view ('dashboard');
    }
    public function login(){
        return view('index');
    }
        public function profil(){
        return view('profil');
    }

}
