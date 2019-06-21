<?php

namespace App\Http\Controllers\admin\master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tblrole;

class RoleController extends Controller
{
    public function index(){
        return view('admin.master.role');
    }

    public function getData(){
        return Datatables::of(Tblrole::all())->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->role_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.role.delete', $menu->role_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($role_id){
        $menu = Tblrole::find($role_id);
        return $menu;
    }

    public function save(Request $request){
        $menu = Tblrole::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $menu = Tblrole::find($request->role_id);
        $menu->update($request->except('role_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($role_id){
        $menu = Tblrole::find($role_id);
        $menu->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
