<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    public function dataAnak() {
        return view ('data-anak');

    }
}
