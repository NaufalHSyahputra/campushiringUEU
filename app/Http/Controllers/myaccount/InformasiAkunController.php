<?php

namespace App\Http\Controllers\myaccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformasiAkunController extends Controller
{
    public function index(){
        return view('frontend.myaccount.index');
    }

    public function proses(){

    }
}
