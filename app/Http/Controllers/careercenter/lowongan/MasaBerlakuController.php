<?php

namespace App\Http\Controllers\careercenter\lowongan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tbllowongan;
use Carbon\Carbon;

class MasaBerlakuController extends Controller
{
    public function index(){
        $lowongans = Tbllowongan::where("expired_date", "<", Carbon::now())->get();
        return view('careercenter.lowongan.masaberlaku', ['lowongans' => $lowongans]);
    }
}
