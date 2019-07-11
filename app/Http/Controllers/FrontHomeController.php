<?php

namespace App\Http\Controllers;

use App\Models\Tblkota;
use App\Models\Tblskill;
use App\Models\Tblfakultas;
use App\Models\Tbllowongan;
use Illuminate\Http\Request;
use App\Models\TbllowonganDetil;
use App\Models\TbllowonganTypeMst;

class FrontHomeController extends Controller
{
    public function search(Request $request){
        $kotas = Tblkota::all();
        $fakultass = Tblfakultas::all();
        $skills = Tblskill::all();
        $levels = TbllowonganTypeMst::all();
        $lowongans = TbllowonganDetil::filter($request->all())->paginateFilter(5);
        return view('frontend.job.resultSearch', ['kotas' => $kotas, 'fakultass' => $fakultass, 'skills' => $skills, 'levels' => $levels,'lowongans' => $lowongans]);
    }

    public function index()
    {
        $kotas = Tblkota::all();
        $fakultass = Tblfakultas::all();
        $skills = Tblskill::all();
        $levels = TbllowonganTypeMst::all();
        return view('frontend.home', ['kotas' => $kotas, 'fakultass' => $fakultass, 'skills' => $skills, 'levels' => $levels]);
    }

    public function test(Request $req){
    }
}
