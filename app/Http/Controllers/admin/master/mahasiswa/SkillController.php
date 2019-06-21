<?php

namespace App\Http\Controllers\admin\master\mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tblskill;

class SkillController extends Controller
{
    public function index(){
        return view('admin.master.skill');
    }

    public function getData(){
        return Datatables::of(Tblskill::all())->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->skill_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.skill.delete', $menu->skill_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($skill_id){
        $menu = Tblskill::find($skill_id);
        return $menu;
    }

    public function save(Request $request){
        $menu = Tblskill::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $menu = Tblskill::find($request->skill_id);
        $menu->update($request->except('skill_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($skill_id){
        $menu = Tblskill::find($skill_id);
        $menu->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
