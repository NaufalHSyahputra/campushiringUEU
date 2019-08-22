<?php

namespace App\Http\Controllers\admin\master\mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\tblmahasiswakill;

class SkillController extends Controller
{
    public function index(){
        return view('admin.master.mahasiswa.skill');
    }

    public function getData(){
        return Datatables::of(tblmahasiswakill::all())->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.skill.delete', $menu->id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($id){
        $menu = tblmahasiswakill::find($id);
        return $menu;
    }

    public function save(Request $request){
        $menu = tblmahasiswakill::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $menu = tblmahasiswakill::find($request->id);
        $menu->update($request->except('id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($id){
        $menu = tblmahasiswakill::find($id);
        $menu->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
