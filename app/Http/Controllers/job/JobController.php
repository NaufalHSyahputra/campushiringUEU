<?php

namespace App\Http\Controllers\job;

use Auth;
use Carbon\Carbon;
use App\Models\Tblkota;
use App\Models\Tblskill;
use App\Models\Tblfakultas;
use App\Models\Tbllowongan;
use App\Models\Tblmahasiswa;
use Illuminate\Http\Request;
use App\Models\Tblperusahaan;
use App\Models\TbllowonganMhs;
use App\Models\TbllowonganDetil;
use Yajra\Datatables\Datatables;
use App\Models\TbllowonganTypeMst;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class JobController extends Controller
{
    public function testFilter(Request $request){
        $result = Tbllowongan::filter($request->all())->get();
    }

    public function show($lowongan_id){
        $lowongan = Tbllowongan::where('lowongan_id', $lowongan_id)->where('is_approved', 1);
        if ($lowongan->count() > 0) {
            return view('frontend.job.detail', ['lowongan' => $lowongan->first()]);
        }else{
            abort(404, 'Lowongan ini tidak ditemukan atau belum di approve oleh Career Center');
        }
    }

    public function all(){
        $kotas = Tblkota::all();
        $fakultass = Tblfakultas::all();
        $skills = Tblskill::all();
        $levels = TbllowonganTypeMst::all();
        $lowongans = Tbllowongan::where("is_approved", 1)->where("expired_date", ">", Carbon::now())->paginate(5);
        return view('frontend.job.all', ['kotas' => $kotas, 'fakultass' => $fakultass, 'skills' => $skills, 'levels' => $levels,'lowongans' => $lowongans]);
    }

    public function apply(Request $request){
        $lowongan = Tbllowongan::find($request->input('lowongan_id'));
        $mahasiswa = Tblmahasiswa::find(Auth::user()->tblmahasiswa->mahasiswa_id);
        if (TbllowonganMhs::where("mahasiswa_id", Auth::user()->tblmahasiswa->mahasiswa_id)->count() > 0){
            return redirect()->back()->withError('Anda sudah melamar pekerjaan di lowongan ini, silahkan tunggu tanggapan dari perusahaan.');
        }else{
            if ($lowongan->expired_date->lessThan(Carbon::now())){
                return redirect()->back()->withError('Lowongan ini sudah kedaluwarsa.');
            }else{
                if ($mahasiswa->tblmahasiswa_docs->count() == 0){
                    return redirect()->back()->withError('Anda belum mengunggah dokumen');
                }else{
                    if ($mahasiswa->is_approved == 0) {
                        return redirect()->back()->withError('Akun anda belum di approve');
                    } else {
                        if ($lowongan->tbllowongan_detail->low_type_id != 3) {
                            TbllowonganMhs::create([
                            'mahasiswa_id' => $mahasiswa->mahasiswa_id,
                            'lowongan_id' => $request->input('lowongan_id'),
                            'apply_dates' => Carbon::now(),
                            'is_respond' => 0,
                            'mhs_desc' => $request->input('mhs_desc')
                        ]);
                            return redirect()->back()->withSuccess('Anda berhasil melamar pekerjaan di lowongan ini, silahkan tunggu tanggapan dari perusahaan.');
                        } else {
                            if ($request->has('magang')) {
                                $image = $request->file('magang');
                                $name = $mahasiswa->mahasiswa_id.'_SuratMagang.'.$image->getClientOriginalExtension();
                                $image->move(public_path().'/imgs/lowongan/magang/', $name);
                                TbllowonganMhs::create([
                                'mahasiswa_id' => $mahasiswa->mahasiswa_id,
                                'lowongan_id' => $request->input('lowongan_id'),
                                'apply_dates' => Carbon::now(),
                                'is_respond' => 0,
                                'mhs_desc' => $request->input('mhs_desc'),
                                'mhs_magang_doc' => $name
                            ]);
                                return redirect()->back()->withSuccess('Anda berhasil melamar magang/internship di lowongan ini, silahkan tunggu tanggapan dari perusahaan.');
                            } else {
                                return redirect()->back()->withSuccess('Surat Magang/Intership dari Fakultas wajib diunggah');
                            }
                        }
                    }
                }
            }
        }
    }
}
