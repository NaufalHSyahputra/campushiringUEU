<?php

namespace App\Http\Controllers\careercenter\lowongan;

use Carbon\Carbon;
use App\Models\Tbllowongan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\TbllowonganReqDoc;
use App\Models\TbllowonganRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerifyController extends Controller
{
    public function getData(){
        $lowongans = TbllowonganRequest::join("tbllowongan", "tbllowongan.lowongan_id", "=", "tbllowongan_request.lowongan_id")
        ->join("tblperusahaan", "tblperusahaan.perusahaan_id", "=", "tbllowongan.perusahaan_id")
        ->join("tbllowongan_req_type", "tbllowongan_req_type.req_type_id", "=", "tbllowongan_request.req_type_id")
        ->select("tbllowongan_request.low_req_id", "tbllowongan.lowongan_id", "tblperusahaan.nama", "tbllowongan.title", "tbllowongan.duration", "tbllowongan_request.is_approved", "tbllowongan_request.approved_date", "tbllowongan_request.approved_by", "tbllowongan_req_type.req_type_id")
        ->where("tbllowongan_request.is_approved", 0)
        ->get();
        return Datatables::of($lowongans)->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->lowongan_id.'" data-req="'.$menu->low_req_id.'"><i class="fas fa-edit"></i></a></div></div>';
        })->editColumn('req_type_id', function ($data) {return $data->req_type_id == 1 ? "Baru" : "Perpanjang";})->editColumn('is_active', function ($data) {return $data->is_visible == 1 ? "Aktif" : "Tidak Aktif";})->editColumn('is_approved', function ($data) {return $data->is_visible == 1 ? "Sudah di Approve" : "Belum di Approve";})->make(true);
    }

    public function index(){
        return view('careercenter.lowongan.verify');
    }

    public function getDokumen($low_req_id){
        return TbllowonganReqDoc::join("tbllowongan_req_doc_mst", "tbllowongan_req_doc_mst.doc_id", "=", "tbllowongan_req_doc.doc_id")
        ->where("low_req_id", $low_req_id)
        ->get();
    }

    public function save(Request $request) {
        $lowongan = Tbllowongan::find($request->lowongan_id);
        $durasi = $lowongan->duration;
        $hari_ini = Carbon::now();
        if ($durasi == 4) {
            $expired_date = $hari_ini->addMonth();
        }else{
            $expired_date = $hari_ini->addWeeks(2);
        }
        Tbllowongan::where("lowongan_id", $request->lowongan_id)->update([
            "is_active" => $request->is_approved,
            "active_date" => Carbon::now(),
            "expired_date" => $expired_date,
            "is_approved" => $request->is_approved,
            "approved_date" => Carbon::now(),
            "approved_by" => Auth::user()->lgname,
        ]);
        TbllowonganRequest::where("lowongan_id", $request->lowongan_id)->update([
            "is_approved" => $request->is_approved,
            "approved_date" => Carbon::now(),
            "approved_by" => Auth::user()->lgname,
            "notes" => $request->notes
        ]);
        return redirect()->back();
    }
}
