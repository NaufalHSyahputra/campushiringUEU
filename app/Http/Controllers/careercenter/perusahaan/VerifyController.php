<?php

namespace App\Http\Controllers\careercenter\perusahaan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tblperusahaan;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\TblperusahaanRequest;
use Illuminate\Support\Facades\Auth;

class VerifyController extends Controller
{
    public function getData(){
        $perusahaans = TblperusahaanRequest::join("tblperusahaan", "tblperusahaan.perusahaan_id", "=", "tblperusahaan_request.perusahaan_id")
        ->join("tblperusahaan_detail", "tblperusahaan_detail.perusahaan_id", "=", "tblperusahaan_request.perusahaan_id")
        ->where("tblperusahaan_request.is_approved", 0)
        ->get();
        return Datatables::of($perusahaans)->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->perusahaan_id.'"><i class="fas fa-edit"></i></a></div></div>';
        })->editColumn('is_approved', function ($data) {return $data->is_approved == 1 ? "Sudah di Approve" : "Belum di Approve";})->make(true);
    }

    public function index(){
        return view('careercenter.perusahaan.verify');
    }

    public function save(Request $request) {
        Tblperusahaan::where("perusahaan_id", $request->perusahaan_id)
        ->update(["is_approved" => $request->is_approved]);
        TblperusahaanRequest::where("perusahaan_id", $request->perusahaan_id)
        ->update(["is_approved" => $request->is_approved, "notes" => $request->notes, "approved_date" => Carbon::now(), "approved_by" => Auth::user()->lgname]);

        return redirect()->back();
    }
}
