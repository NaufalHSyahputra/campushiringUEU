<?php

namespace App\Http\Controllers\admin\master\mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TblmahasiswaDoc;

class ReqDocumentController extends Controller
{
    public function index(){
        return view('admin.master.mahasiswa.reqdoc');
    }

    public function getData(){
        return Datatables::of(TblmahasiswaDoc::all())->addColumn('action', function ($data) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$data->mhs_req_id.'" data-docid="'.$data->doc_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.mahasiswa.reqdoc.delete', ['doc_id' => $data->doc_id, 'mhs_req_id' => $data->mhs_req_id]).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($mhs_req_id, $doc_id){
        $data = TblmahasiswaDoc::where(['mhs_req_id' => $mhs_req_id, 'doc_id' => $doc_id])->first();
        return $data;
    }

    public function save(Request $request){
        $data = TblmahasiswaDoc::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $data = TblmahasiswaDoc::where(['mhs_req_id' => $request->mhs_req_id, 'doc_id' => $request->doc_id])->first();
        $data->update($request->except('doc_id', 'mhs_req_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($mhs_req_id, $doc_id){
        $data = TblmahasiswaDoc::where(['mhs_req_id' => $mhs_req_id, 'doc_id' => $doc_id])->first();
        $data->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
