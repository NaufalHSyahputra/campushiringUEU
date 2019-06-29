<?php

namespace App\Http\Controllers\admin\master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tblemployee;

class EmployeeController extends Controller
{
    public function index(){
        return view('admin.master.employee');
    }

    public function getData(){
        return Datatables::of(Tblemployee::all())->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->employee_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.employee.delete', $menu->employee_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($employee_id){
        $menu = Tblemployee::find($employee_id);
        return $menu;
    }

    public function save(Request $request){
        $menu = Tblemployee::create($request->all());
        return redirect()->back()->withSuccess('Tambah data berhasil!');
    }

    public function update(Request $request){
        $menu = Tblemployee::find($request->employee_id);
        $menu->update($request->except('employee_id'));
        return redirect()->back()->withSuccess('Ubah data berhasil!');
    }

    public function delete($employee_id){
        $menu = Tblemployee::find($employee_id);
        $menu->delete();
        return redirect()->back()->withSuccess('Delete data berhasil!');
    }
}
