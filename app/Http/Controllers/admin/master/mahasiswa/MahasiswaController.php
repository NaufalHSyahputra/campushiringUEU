<?php

namespace App\Http\Controllers\admin\master\mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tblmahasiswa;

class MahasiswaController extends Controller
{
    public function index(){
        return view('admin.master.mahasiswa.mahasiswa');
    }

    public function getData(){
        return Datatables::of(Tblmahasiswa::all())->addColumn('action', function ($data) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$data->mahasiswa_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.mahasiswa.mahasiswa.delete', $data->mahasiswa_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($mahasiswa_id){
        $data = Tblmahasiswa::find($mahasiswa_id);
        return $data;
    }

    public function save(Request $request){
        $data = Tblmahasiswa::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $data = Tblmahasiswa::find($request->mahasiswa_id);
        $data->update($request->except('mahasiswa_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($mahasiswa_id){
        $data = Tblmahasiswa::find($mahasiswa_id);
        $data->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
