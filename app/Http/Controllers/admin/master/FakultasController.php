<?php

namespace App\Http\Controllers\admin\master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tblfakultas;

class FakultasController extends Controller
{
    public function index(){
        return view('admin.master.fakultas');
    }

    public function getData(){
        return Datatables::of(Tblfakultas::all())->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->fakultas_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.fakultas.delete', $menu->fakultas_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($fakultas_id){
        $menu = Tblfakultas::find($fakultas_id);
        return $menu;
    }

    public function save(Request $request){
        $menu = Tblfakultas::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $menu = Tblfakultas::find($request->fakultas_id);
        $menu->update($request->except('fakultas_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($fakultas_id){
        $menu = Tblfakultas::find($fakultas_id);
        $menu->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
