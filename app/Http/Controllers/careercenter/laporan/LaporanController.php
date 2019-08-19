<?php

namespace App\Http\Controllers\careercenter\laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TbllowonganMhs;
use Illuminate\Support\Facades\DB;
use App\Charts\PenggunaChart;
use App\Models\Tblfakultas;

class LaporanController extends Controller
{
    public function index(){
        $pelamars =  TbllowonganMhs::join("tblmahasiswa", "tblmahasiswa.mahasiswa_id", "=", "tbllowongan_mhs.mahasiswa_id")
        ->join("tblfakultas", "tblfakultas.fakultas_id", "=", "tblmahasiswa.fakultas_id")
        ->select(DB::raw('count(tblmahasiswa.fakultas_id) as count'))
        ->groupBy("tblmahasiswa.fakultas_id")
        ->get()
        ->pluck("count");
        $fakultass = Tblfakultas::all()->pluck("fakultas_name");

        $chart = new PenggunaChart;
        $chart->labels($fakultass);
        $chart->dataset("My Datasets", 'bar', $pelamars)->backgroundColor(["#ff7961","#ff2164","#ff4762"]);

        return view('careercenter.laporan.pengguna', compact('chart'));
    }
    public function getData(){
        $data = [];

    }
}
