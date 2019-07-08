<?php

namespace App\Http\Controllers\admin\master\lowongan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tbllowongan;
use App\Models\Tblperusahaan;

class LowonganController extends Controller
{

    public function index(){
        $prs = Tblperusahaan::where('is_approved', 1)->get();
        return view('admin.master.lowongan.lowongan', ['prs' => $prs]);
    }

    public function getData(){
        return Datatables::of(Tbllowongan::all())->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->lowongan_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.employee.delete', $menu->lowongan_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($lowongan_id){
        $menu = Tbllowongan::find($lowongan_id);
        return $menu;
    }

    public function save(Request $request){
        $menu = Tbllowongan::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $menu = Tbllowongan::find($request->lowongan_id);
        $menu->update($request->except('lowongan_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($lowongan_id){
        $menu = Tbllowongan::find($lowongan_id);
        $menu->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
