<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomponenGaji;

class KomponenGajiController extends Controller
{
    public function adminIndex() 
    {
        $kGaji = KomponenGaji::all();
        return view('admin.komponengaji.index', compact('kGaji'));
    }
}
