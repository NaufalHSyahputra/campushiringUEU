<?php

namespace App\Http\Controllers\job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tbllowongan;
use App\Models\Tblperusahaan;

class JobController extends Controller
{
    public function testFilter(Request $request){
        $result = Tbllowongan::filter($request->all())->get();
    }

    public function show($lowongan_id){
        $lowongan = Tbllowongan::findOrFail($lowongan_id);
        return view('frontend.job.detail', ['lowongan' => $lowongan]);
    }

    public function all(){
        Tbllowongan::paginate(5);
    }
}
