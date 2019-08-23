<?php

namespace App\Http\Controllers\perusahaan\lowongan;

use Carbon\Carbon;
use App\Models\Tblkota;
use App\Models\Tblskill;
use App\Models\Tblfakultas;
use App\Models\Tbllowongan;
use Illuminate\Http\Request;
use App\Models\TbllowonganMhs;
use App\Models\TblmahasiswaDoc;
use Yajra\Datatables\Datatables;
use App\Models\TbllowonganDetail;
use App\Models\TbllowonganReqDoc;
use App\Models\TbllowonganRequest;
use App\Models\TbllowonganTypeMst;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LowonganController extends Controller
{
    public function showTambahLowongan(){
        $kotas = Tblkota::all();
        $lowtypes = TbllowonganTypeMst::all();
        $skills = Tblskill::all();
        $fakultass = Tblfakultas::all();
        return view('perusahaan.lowongan.tambah', ['kotas' => $kotas, 'lowtypes' => $lowtypes, 'skills' => $skills, 'fakultass' => $fakultass]);
    }

    public function showEdit($lowongan_id){
        $kotas = Tblkota::all();
        $lowtypes = TbllowonganTypeMst::all();
        $skills = Tblskill::all();
        $fakultass = Tblfakultas::all();
        $lowongan = Tbllowongan::find($lowongan_id);
        return view('perusahaan.lowongan.edit', ['lowongan' => $lowongan, 'kotas' => $kotas, 'lowtypes' => $lowtypes, 'skills' => $skills, 'fakultass' => $fakultass]);
    }

    public function showListLowongan(){
        return view('perusahaan.lowongan.list');
    }

    public function getData(){
        $lowongans = Tbllowongan::join("tbllowongan_mhs", "tbllowongan_mhs.lowongan_id", "=", "tbllowongan.lowongan_id")->select("tbllowongan.lowongan_id", "tbllowongan.title","tbllowongan.is_active","tbllowongan.active_date","tbllowongan.expired_date","tbllowongan.is_approved","tbllowongan.approved_date","tbllowongan.approved_by",DB::raw("count(tbllowongan_mhs.lowongan_id) as count"))->where("tbllowongan.perusahaan_id", Auth::user()->tblperusahaan->perusahaan_id)->groupBy("tbllowongan_mhs.lowongan_id");
        return Datatables::of($lowongans)->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="'.route('perusahaan.lowongan.detail', $menu->lowongan_id).'" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->lowongan_id.'"><i class="fas fa-edit"></i></a></div>
            <div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-danger deletebutton" data-url="'.route('perusahaan.lowongan.detail', $menu->lowongan_id).'"><i class="fas fa-trash"></i></a></div></div>';
        })->editColumn('is_active', function ($data) {return $data->is_active == 1 ? "Aktif" : "Tidak Aktif";})->editColumn('is_approved', function ($data) {return $data->is_approved == 1 ? "Sudah di Approve" : "Belum di Approve";})->make(true);
    }

    public function showDetailLowongan($lowongan_id){
        $lowongan = Tbllowongan::where("lowongan_id", $lowongan_id)->first();
        $pelamars = TbllowonganMhs::where("lowongan_id", $lowongan_id)->get();
        return view('perusahaan.lowongan.detail', ['lowongan' => $lowongan, 'pelamars' => $pelamars]);
    }

    public function showDetailMahasiswa($mahasiswa_id){

    }

    public function getDokumen($mahasiswa_id){
        return TblmahasiswaDoc::join("tbldokumen_mst", "tbldokumen_mst.doc_id", "=", "tblmahasiswa_doc.doc_id")->where("tblmahasiswa_doc.mahasiswa_id", $mahasiswa_id)->get();
    }

    public function saveRespon(Request $request){
        TbllowonganMhs::where("low_mhs_id", $request->low_mhs_id)->update([
            "is_respond" => 1,
            "respond_notes" => $request->respond_notes,
            "respond_date" => Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function save(Request $request){
        $this->validate($request, [
            'file_sp' => 'required|file|mimes:jpeg,png,gif,webp,pdf|max:4096',
            'file_poster' => 'required|file|mimes:jpeg,png,gif,webp,pdf|max:4096',
        ]);
        $file_sp = $request->file('file_sp');
        $file_poster = $request->file('file_poster');
        $ext = $file_sp->getClientOriginalExtension();
        $ext2 = $file_poster->getClientOriginalExtension();
        $filename = 'SuratPermohonan_'.Auth::user()->lgname.'.'.$ext;
        $filename2 = 'Poster_'.Auth::user()->lgname.'.'.$ext2;
        $file_sp->move(public_path(). '/document/lowongan/', $filename);
        $file_poster->move(public_path(). '/document/lowongan/', $filename2);
        $lowongan = new Tbllowongan;
        $lowongan->perusahaan_id = Auth::user()->tblperusahaan->perusahaan_id;
        $lowongan->title = $request->title;
        $lowongan->deskripsi = $request->deskripsi;
        $lowongan->duration = $request->duration;
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
        $requestlow = new TbllowonganRequest;
        $requestlow->lowongan_id = $lowongan->lowongan_id;
        $requestlow->req_type_id = 1;
        $requestlow->save();
        $lowdoc = new TbllowonganReqDoc;
        $lowdoc->low_req_id = $requestlow->low_req_id;
        $lowdoc->doc_id = 1;
        $lowdoc->file_name = $filename;
        $lowdoc->save();
        $lowdoc2 = new TbllowonganReqDoc;
        $lowdoc2->low_req_id = $requestlow->low_req_id;
        $lowdoc2->doc_id = 2;
        $lowdoc2->file_name = $filename2;
        $lowdoc2->save();
        Alert::success('Tambah Lowongan Berhasil!', 'Silahkan tunggu konfirmasi dari Career Center Universitas Esa Unggul.');
        return redirect()->route('perusahaan.lowongan.index');
    }

    public function update(Request $request){
        Tbllowongan::where("lowongan_id", $request->lowongan_id)->update($request->only(["title", "deskripsi"]));
        TbllowonganDetail::where("lowongan_id", $request->lowongan_id)->update($request->except(["_token", "title", "deskripsi"]));
        Alert::success('Ubah Lowongan berhasil!', 'Data Lowongan Berhasil Diubah!');
            return redirect()->route('perusahaan.lowongan.index');
    }

    public function updateStatus(Request $request){
        Tbllowongan::find($request->lowongan_id)->update(["is_active" => $request->is_active]);
        Alert::success('Ubah Status Berhasil!', 'Ubah Status Lowongan Berhasil!');
        return redirect()->route('perusahaan.lowongan.index');
    }

    public function tambahMasaBerlaku(Request $request){
        $lowongan = Tbllowongan::find($request->lowongan_id);
        if ($lowongan->expired_date > Carbon::now()){
            Alert::error('Tambah masa berlaku gagal!', 'Masa berlaku lowongan belum habis!');
            return redirect()->route('perusahaan.lowongan.index');
        }else{
            $file_sp = $request->file('file_sp');
            $ext = $file_sp->getClientOriginalExtension();
            $filename = 'SuratPermohonan_Renew_'.Auth::user()->lgname.'.'.$ext;
            $file_sp->move(public_path(). '/document/lowongan/', $filename);
            $requestlow = new TbllowonganRequest;
            $requestlow->lowongan_id = $lowongan->lowongan_id;
            $requestlow->req_type_id = 2;
            $requestlow->save();
            $low_req_id = $requestlow->low_req_id;
            TbllowonganReqDoc::insert([
                "low_req_id" => $low_req_id,
                "doc_id" => 1,
                "file_name" => $filename
            ]);
            $lowongan->update(["duration" => $request->duration]);
            Alert::success('Tambah Masa Berlaku Lowongan Berhasil!', 'Silahkan tunggu konfirmasi dari Career Center Universitas Esa Unggul.');
            return redirect()->route('perusahaan.lowongan.index');
        }
    }
}
