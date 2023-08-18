<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{LibBarangay, LibMunCity, LibProvince};

class LibraryController extends Controller
{
    public function getBarangays() {
        $brgys = LibBarangay::all();
        return $brgys;
    }

    public function getMunCity() {
        $muncity = LibMunCity::all();
        return $muncity;
    }

    public function getProvince() {
        $province = LibProvince::all();
        return $province;
    }
}
