<?php

namespace App\Http\Controllers\admin\master\mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\TblmahasiswaRequest;

class RequestController extends Controller
{
    public function index(){
        return view('admin.master.mahasiswa.request');
    }

    public function getData(){
        return Datatables::of(TblmahasiswaRequest::all())->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->mhs_req_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.request.delete', $menu->mhs_req_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->addColumn('mhsdoc', function ($data) {
            return '<div class="col-md-12"><a href="#" class="btn btn-icon icon-left btn-primary mhsdocbutton" data-id="'.$data->mhs_req_id.'"><i class="fas fa-file"></i>Dokumen</a></div>';
        })->make(true);
    }

    public function getSingleData($mhs_req_id){
        $menu = TblmahasiswaRequest::find($mhs_req_id);
        return $menu;
    }

    public function getMhsDocData($mhs_req_id){
        $data = TblmahasiswaDoc::where('mhs_req_id', $mhs_req_id)->get();
        return $data;
    }

    public function save(Request $request){
        $menu = TblmahasiswaRequest::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $menu = TblmahasiswaRequest::find($request->mhs_req_id);
        $menu->update($request->except('mhs_req_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($mhs_req_id){
        $menu = TblmahasiswaRequest::find($mhs_req_id);
        $menu->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
