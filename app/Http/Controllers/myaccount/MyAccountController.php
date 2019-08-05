<?php

namespace App\Http\Controllers\myaccount;

use Illuminate\Http\Request;
use App\Models\TblmahasiswaDoc;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function showIndex(){
        return view('frontend.myaccount.informasiakun');
    }

    public function showDokumen(){
        $dokumens = TblmahasiswaDoc::where("mahasiswa_id", Auth::user()->tblmahasiswa->mahasiswa_id)->get();
        return view('frontend.myaccount.unggahdokumen', ['dokumens' => $dokumens]);
    }
}
