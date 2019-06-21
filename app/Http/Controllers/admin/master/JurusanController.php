<?php

namespace App\Http\Controllers\admin\master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tbljurusan;
use App\Models\Tblfakultas;

class JurusanController extends Controller
{
    public function index(){
        $fakultass = Tblfakultas::all();
        return view('admin.master.jurusan', ["fakultass" => $fakultass]);
    }

    public function getData(){
        $jurusans = Tbljurusan::join('tblfakultas', 'tblfakultas.fakultas_id', '=', 'tbljurusan.fakultas_id')->select(['tbljurusan.*', 'tblfakultas.fakultas_name']);
        return Datatables::of($jurusans)->addColumn('action', function ($data) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$data->jurusan_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.jurusan.delete', $data->jurusan_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($jurusan_id){
        $menu = Tbljurusan::find($jurusan_id);
        return $menu;
    }

    public function save(Request $request){
        $menu = Tbljurusan::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $menu = Tbljurusan::find($request->jurusan_id);
        $menu->update($request->except('jurusan_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($jurusan_id){
        $menu = Tbljurusan::find($jurusan_id);
        $menu->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
