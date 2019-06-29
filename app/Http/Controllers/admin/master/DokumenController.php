<?php

namespace App\Http\Controllers\admin\master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\TbldokumenMst;

class DokumenController extends Controller
{
    public function index(){
        return view('admin.master.dokumen');
    }

    public function getData(){
        return Datatables::of(TbldokumenMst::all())->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->doc_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.employee.delete', $menu->doc_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($doc_id){
        $menu = TbldokumenMst::find($doc_id);
        return $menu;
    }

    public function save(Request $request){
        $menu = TbldokumenMst::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $menu = TbldokumenMst::find($request->doc_id);
        $menu->update($request->except('doc_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($doc_id){
        $menu = TbldokumenMst::find($doc_id);
        $menu->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
