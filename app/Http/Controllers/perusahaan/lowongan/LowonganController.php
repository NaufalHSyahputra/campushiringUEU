<?php

namespace App\Http\Controllers\perusahaan\lowongan;

use App\Models\Tblkota;
use App\Models\Tblskill;
use App\Models\Tblfakultas;
use App\Models\Tbllowongan;
use Illuminate\Http\Request;
use App\Models\TbllowonganDetail;
use App\Models\TbllowonganTypeMst;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Datatables;

class LowonganController extends Controller
{
    public function showTambahLowongan(){
        $kotas = Tblkota::all();
        $lowtypes = TbllowonganTypeMst::all();
        $skills = Tblskill::all();
        $fakultass = Tblfakultas::all();
        return view('perusahaan.lowongan.tambah', ['kotas' => $kotas, 'lowtypes' => $lowtypes, 'skills' => $skills, 'fakultass' => $fakultass]);
    }

    public function showListLowongan(){
        return view('perusahaan.lowongan.list');
    }

    public function getData(){
        $lowongans = Tbllowongan::where("perusahaan_id", Auth::user()->tblperusahaan->perusahaan_id);
        return Datatables::of($lowongans)->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->lowongan_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.employee.delete', $menu->lowongan_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->editColumn('is_active', function ($data) {return $data->is_visible == 1 ? "Aktif" : "Tidak Aktif";})->editColumn('is_approved', function ($data) {return $data->is_visible == 1 ? "Sudah di Approve" : "Belum di Approve";})->make(true);
    }

    public function showDetailLowongan($lowongan_id){

    }

    public function showDetailMahasiswa($mahasiswa_id){

    }

    public function save(Request $request){
        $lowongan = new Tbllowongan;
        $lowongan->perusahaan_id = Auth::user()->tblperusahaan->perusahaan_id;
        $lowongan->title = $request->title;
        $lowongan->deskripsi = $request->deskripsi;
        $lowongan->duration = $request->duration;
        $lowongan->save();
        $detail = new TbllowonganDetail;
        $detail->lowongan_id = $lowongan->lowongan_id;
        $detail->kota_id = $request->kota_id;
        $detail->low_type_id = $request->low_type_id;
        $detail->fakultas_id = $request->fakultas_id;
        $detail->skill_id = $request->skill_id;
        $detail->salary_min = $request->salary_min;
        $detail->salary_max = $request->salary_max;
        $detail->is_salary_nego = $request->is_salary_nego;
        $detail->save();
        Alert::success('Tambah Lowongan Berhasil!', 'Silahkan tunggu konfirmasi dari Career Center Universitas Esa Unggul.');
        return redirect()->route('perusahaan.lowongan.index');
    }

    public function edit(Request $request){

    }
}
