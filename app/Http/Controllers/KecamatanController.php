<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function dataKecamatan(){
        return view ('data-kecamatan');
    }
}
