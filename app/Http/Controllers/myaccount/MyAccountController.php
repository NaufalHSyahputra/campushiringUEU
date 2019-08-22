<?php

namespace App\Http\Controllers\myaccount;

use App\Models\Tblkota;
use App\Models\Tbluser;
use App\Models\Tbljurusan;
use App\Models\Tblfakultas;
use App\Models\Tblprovinsi;
use App\Models\Tblmahasiswa;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Models\TblmahasiswaDetail;
use App\Http\Controllers\Controller;
use App\Models\TbllowonganMhs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    public function showUbahPass(){
        return view('frontend.myaccount.ubahpass');
    }

    public function showRiwayat(){
        $lows = TbllowonganMhs::where("mahasiswa_id", Auth::user()->tblmahasiswa->mahasiswa_id)->get();
        return view('frontend.myaccount.riwayatlamaran', ["lows" => $lows]);
    }

    public function showInfoAkun(){
        $user = Tblmahasiswa::where("user_id", Auth::id())->first();
        $provs = Tblprovinsi::all();
        $kotas = Tblkota::all();
        $fakultass = Tblfakultas::all();
        $jurusans = Tbljurusan::all();
        return view('frontend.myaccount.informasiakun', ["fakultass" => $fakultass,"jurusans" => $jurusans,"user" => $user,"provs" => $provs,"kotas" => $kotas]);
    }

    public function prosesInfoAkun(Request $request){
        $this->validate($request,[
            'nama' => ['required', 'string', 'max:50'],
            'nim' => ['required', 'string', 'max:15'],
            'nik' => ['required', 'string', 'max:20'],
            'tahun_ajaran' => ['required', 'string', 'max:4'],
            'alamat' => ['required', 'string'],
            'nohp' => ['required', 'string', 'max:15'],
            'gender' => ['required'],
            'is_lulus' => ['required'],
            'kota_id' => ['required'],
            'prov_id' => ['required'],
            'jurusan_id' => ['required'],
            'fakultas_id' => ['required'],
        ]);
        TblmahasiswaDetail::where("mahasiswa_id", Auth::user()->tblmahasiswa->mahasiswa_id)->update($request->except(["kota_id", "prov_id", "fakultas_id", "jurusan_id", "_token"]));
        Tblmahasiswa::where("mahasiswa_id", Auth::user()->tblmahasiswa->mahasiswa_id)->update($request->only(["kota_id", "prov_id", "fakultas_id", "jurusan_id"]));
        return redirect()->back()->with("success", "Ubah Data Diri berhasil!");
    }

    public function prosesUbahPass(Request $request){
        $this->validate($request,[
            'password' => ['required', new MatchOldPassword],
            'newpass' => "required|min:8|confirmed",
        ]);
        $newpass = Hash::make($request->newpass);
        Tbluser::where("user_id", Auth::id())->update(["password" => $newpass]);
        return redirect()->back()->with("success", "Ubah Password berhasil!");
    }
}
