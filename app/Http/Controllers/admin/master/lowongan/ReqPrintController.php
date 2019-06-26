<?php

namespace App\Http\Controllers\admin\master\lowongan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TbllowonganReqPrint;

class ReqPrintController extends Controller
{

    public function index(){
        return view('admin.master.lowongan.reqprint');
    }

    public function getData(){
        return Datatables::of(TbllowonganReqPrint::all())->addColumn('action', function ($data) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$data->low_req_pr_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.perusahaan.perusahaan.delete', $data->low_req_pr_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($low_req_pr_id){
        $data = TbllowonganReqPrint::find($low_req_pr_id);
        return $data;
    }

    public function save(Request $request){
        $data = TbllowonganReqPrint::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $data = TbllowonganReqPrint::find($request->low_req_pr_id);
        $data->update($request->except('low_req_pr_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($low_req_pr_id){
        $data = TbllowonganReqPrint::find($low_req_pr_id);
        $data->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
