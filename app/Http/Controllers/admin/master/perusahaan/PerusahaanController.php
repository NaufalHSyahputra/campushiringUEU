<?php

namespace App\Http\Controllers\admin\master\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tblperusahaan;

class PerusahaanController extends Controller
{
    public function index(){
        $roles = Tblrole::all();
        $parents = Tblmenu::where('is_parent_child', 'P')->get();
        return view('admin.master.menu', ['roles' => $roles, 'parents' => $parents]);
    }

    public function getData(){
        $menus = Tblmenu::join('tblrole', 'tblrole.role_id', '=', 'tblmenu.role_id')->select(['tblmenu.*', 'tblrole.role_desc']);
        return Datatables::of($menus)->addColumn('action', function ($data) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$data->id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.menu.delete', $data->id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->editColumn('is_visible', function ($data) {return $data->is_visible == 1 ? "true" : "false";})->make(true);
    }

    public function getSingleData($id){
        $menu = Tblmenu::find($id);
        return $menu;
    }

    public function save(Request $request){
        $menu = Tblmenu::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $menu = Tblmenu::find($request->id);
        $menu->update($request->except('id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($id){
        $menu = Tblmenu::find($id);
        $menu->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
