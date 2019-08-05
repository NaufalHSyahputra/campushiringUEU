<?php

namespace App\Http\Controllers\admin\master\lowongan;

use App\Models\Tblkota;
use App\Models\Tbllowongan;
use Illuminate\Http\Request;
use App\Models\Tblperusahaan;
use Yajra\Datatables\Datatables;
use App\Models\TbllowonganTypeMst;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tblskill;
use App\Models\Tblfakultas;
use Carbon\Carbon;

class LowonganController extends Controller
{

    public function index(){
        $prs = Tblperusahaan::where('is_approved', 1)->get();
        $kotas = Tblkota::all();
        $lowtypes = TbllowonganTypeMst::all();
        $skills = Tblskill::all();
        $fakultass = Tblfakultas::all();
        return view('admin.master.lowongan.lowongan', ['prs' => $prs, 'kotas' => $kotas, 'lowtypes' => $lowtypes, 'skills' => $skills, 'fakultass' => $fakultass]);
    }

    public function getData(){
        $lowongans = Tbllowongan::join('tblperusahaan', 'tblperusahaan.perusahaan_id', '=', 'tbllowongan.perusahaan_id')->select(['tbllowongan.*', 'tblperusahaan.nama']);
        return Datatables::of($lowongans)->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->lowongan_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('admin.master.employee.delete', $menu->lowongan_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->make(true);
    }

    public function getSingleData($lowongan_id){
        $menu = Tbllowongan::with("tbllowongan_detail")->where("lowongan_id", $lowongan_id)->first();
        return $menu;
    }

    public function save(Request $request){
        $lowongan = new Tbllowongan;
        $lowongan->perusahaan_id = $request->perusahaan_id;
        $lowongan->title = $request->title;
        $lowongan->deskripsi = $request->deskripsi;
        $lowongan->is_active = $request->is_active;
        $lowongan->active_date = $request->active_date;
        $lowongan->duration = $request->duration;
        $active_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->active_date);
        if ($request->duration == 2) {
            $lowongan->expired_date = $active_date::addWeeks(2);
        } elseif ($request->duration == 4) {
            $lowongan->expired_date = $active_date::addMonth();
        }
        $lowongan->save();
        $detail = new TbllowonganDetail;
        $detail->lowongan_id = $lowongan->lowongan_id;
        $detail->kota_id = $request->kota_id;
        $detail->low_type_id = $request->low_type_id;
        $detail->fakultas_id = $request->fakultas_id;
        $detail->skill_id = $request->skill_id;
        $detail->salary_min = $request->salary_min;
        $detail->salary_max = $request->salary_max;
        $detail->is_salary_nego = $request->is_salary_nego;
        $detail->save();
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
