<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function notifikasi() {
        return view ('notifikasi');

    }

    public function dataBaru($id) {
        return view('data-terbaru', ['id' => $id]);
    }
}
