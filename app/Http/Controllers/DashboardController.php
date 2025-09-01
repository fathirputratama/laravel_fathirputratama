<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $jumlahRS = RumahSakit::count();
        $jumlahPasien = Pasien::count();
        return view('dashboard', compact('jumlahRS', 'jumlahPasien'));
    }
}
