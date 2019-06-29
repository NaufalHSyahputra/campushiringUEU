<?php

namespace App\Http\Controllers\admin\master\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\TblperusahaanRequest;
use App\Models\Tblperusahaan;

class RequestController extends Controller
{
    public function index(){
        $prs =  Tblperusahaan::all();
        return view('admin.master.perusahaan.request', ["prs" => $prs]);
    }

    public function getData(){
        $requests = TblperusahaanRequest::join('tblperusahaan', 'tblperusahaan.perusahaan_id', '=', 'tblperusahaan_request.perusahaan_id')->select(['tblperusahaan.nama', 'tblperusahaan_request.*']);
        return Datatables::of($requests)->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->prs_req_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.perusahaan.request.delete', $menu->prs_req_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($prs_req_id){
        $data = TblperusahaanRequest::find($prs_req_id);
        return $data;
    }

    public function save(Request $request){
        $data = TblperusahaanRequest::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $data = TblperusahaanRequest::find($request->prs_req_id);
        $data->update($request->except('prs_req_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($prs_req_id){
        $data = TblperusahaanRequest::find($prs_req_id);
        $data->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
