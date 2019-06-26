<?php

namespace App\Http\Controllers\admin\master\mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TblmahasiswaDocMst;

class ReqDocMstController extends Controller
{
    public function index(){
        return view('admin.master.mahasiswa.reqdocmst');
    }

    public function getData(){
        return Datatables::of(TblmahasiswaDocMst::all())->addColumn('action', function ($data) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$data->doc_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.mahasiswa.reqdocmst.delete', $data->doc_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->addColumn('mhsdoc', function ($data) {
            return '<div class="col-md-12"><a href="#" class="btn btn-icon icon-left btn-primary mhsdocbutton" data-id="'.$data->doc_id.'"><i class="fas fa-file"></i>Dokumen</a></div>';
        })->make(true);
    }

    public function getSingleData($doc_id){
        $data = TblmahasiswaDocMst::find($doc_id);
        return $data;
    }

    public function save(Request $request){
        $data = TblmahasiswaDocMst::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $data = TblmahasiswaDocMst::find($request->doc_id);
        $data->update($request->except('doc_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($doc_id){
        $data = TblmahasiswaDocMst::find($doc_id);
        $data->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
