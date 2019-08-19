<?php

namespace App\Http\Controllers\careercenter\mahasiswa;

use Carbon\Carbon;
use App\Models\Tblmahasiswa;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\TblmahasiswaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerifyController extends Controller
{
    public function getData(){
        $mahasiswas = TblmahasiswaRequest::join("tblmahasiswa", "tblmahasiswa.mahasiswa_id", "=", "tblmahasiswa_request.mahasiswa_id")
        ->join("tblmahasiswa_detail", "tblmahasiswa_detail.mahasiswa_id", "=", "tblmahasiswa_request.mahasiswa_id")
        ->where("tblmahasiswa_request.is_approved", 0)
        ->get();
        return Datatables::of($mahasiswas)->addColumn('action', function ($menu) {
            return '<div class="row"><div class="col-md-6"><a href="#" class="btn btn-icon icon-left btn-primary editbutton" data-id="'.$menu->mahasiswa_id.'" data-req="'.$menu->mhs_req_id.'"><i class="fas fa-edit"></i></a></div></div>';
        })->editColumn('is_approved', function ($data) {return $data->is_approved == 1 ? "Sudah di Approve" : "Belum di Approve";})->make(true);
    }

    public function index(){
        return view('careercenter.mahasiswa.verify');
    }

    public function save(Request $request) {
        Tblmahasiswa::where("mahasiswa_id", $request->mahasiswa_id)
        ->update(["is_approved" => $request->is_approved]);
        TblmahasiswaRequest::where("mahasiswa_id", $request->mahasiswa_id)
        ->update(["is_approved" => $request->is_approved, "notes" => $request->notes, "approved_date" => Carbon::now(), "approved_by" => Auth::user()->lgname]);

        return redirect()->back();
    }
}
