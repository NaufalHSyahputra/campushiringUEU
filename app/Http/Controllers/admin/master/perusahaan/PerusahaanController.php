<?php

namespace App\Http\Controllers\admin\master\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tblperusahaan;

class PerusahaanController extends Controller
{
    public function index(){
        return view('admin.master.perusahaan.perusahaan');
    }

    public function getData(){
        return Datatables::of(Tblperusahaan::all())->addColumn('action', function ($data) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$data->perusahaan_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.perusahaan.perusahaan.delete', $data->perusahaan_id).'"><i class="fas fa-trash"></i></a></div></div>';
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
