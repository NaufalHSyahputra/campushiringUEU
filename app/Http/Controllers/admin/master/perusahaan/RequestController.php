<?php

namespace App\Http\Controllers\admin\master\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\TblperusahaanRequest;

class RequestController extends Controller
{
    public function index(){
        return view('admin.master.perusahaan.request');
    }

    public function getData(){
        return Datatables::of(TblperusahaanRequest::all())->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->prs_req_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.perusahaan.request.delete', $menu->prs_req_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($prs_req_id){
        $menu = TblperusahaanRequest::find($prs_req_id);
        return $menu;
    }

    public function save(Request $request){
        $menu = TblperusahaanRequest::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $menu = TblperusahaanRequest::find($request->prs_req_id);
        $menu->update($request->except('prs_req_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($prs_req_id){
        $menu = TblperusahaanRequest::find($prs_req_id);
        $menu->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
