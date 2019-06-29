<?php

namespace App\Http\Controllers\admin\master\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tblperusahaan;
use App\Models\Tblkota;
use App\Models\Tblprovinsi;

class PerusahaanController extends Controller
{
    public function index(){
        $provs = Tblprovinsi::all();
        $kotas = Tblkota::all();
        return view('admin.master.perusahaan.perusahaan', ['provs' => $provs, 'kotas' => $kotas]);
    }

    public function getData(){
        $perusahaans = Tblperusahaan::join('tblprovinsi', 'tblprovinsi.prov_id', '=', 'tblperusahaan.prov_id')->join('tblkota', 'tblkota.kota_id', '=', 'tblperusahaan.kota_id')->select(['tblperusahaan.*', 'tblkota.kota_name', 'tblprovinsi.prov_name']);
        return Datatables::of($perusahaans)->addColumn('action', function ($data) {
            return '<a href="#" class="btn btn-icon btn-primary editbutton" data-id="'.$data->perusahaan_id.'"><i class="fas fa-edit"></i></a><a href="#" class="btn btn-icon btn-danger deletebutton" data-url="'.route('admin.master.perusahaan.delete', $data->perusahaan_id).'"><i class="fas fa-trash"></i></a>';
        })->make(true);
    }

    public function getSingleData($perusahaan_id){
        $data = Tblperusahaan::find($perusahaan_id);
        return $data;
    }

    public function save(Request $request){
        $data = Tblperusahaan::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $data = Tblperusahaan::find($request->perusahaan_id);
        $data->update($request->except('perusahaan_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($perusahaan_id){
        $data = Tblperusahaan::find($perusahaan_id);
        $data->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
