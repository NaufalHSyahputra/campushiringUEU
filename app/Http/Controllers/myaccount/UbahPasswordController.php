<?php

namespace App\Http\Controllers\myaccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UbahPasswordController extends Controller
{
    public function index(){
        return view('frontend.myaccount.ubahpass');
    }

    public function proses(){

    }
}
