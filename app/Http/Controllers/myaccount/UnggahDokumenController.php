<?php

namespace App\Http\Controllers\myaccount;

use Illuminate\Http\Request;
use App\Models\TbldokumenMst;
use App\Models\TblmahasiswaDoc;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

class UnggahDokumenController extends Controller
{
    public function index(){
        $dokumens = TblmahasiswaDoc::where("mahasiswa_id", Auth::user()->tblmahasiswa->mahasiswa_id)->get();
        $mstdocs = TbldokumenMst::all();
        return view('frontend.myaccount.unggahdokumen', ['dokumens' => $dokumens, "mstdocs" => $mstdocs]);
    }

    public function save(Request $request){
        $doc = TbldokumenMst::where("doc_id", $request->doc_id)->first();
        if ($doc->is_multiple == 0){
            $alread_exists = TblmahasiswaDoc::where("mahasiswa_id", Auth::user()->tblmahasiswa->mahasiswa_id)->where("doc_id", $request->doc_id)->count();
            if ($alread_exists >= 1) {
                return redirect()->back()->with("failed", "Kategori dokumen yang dipilih tidak dapat diunggah lebih dari 1 kali.");
            }else{
                $this->validate($request, [
                    'doc_file' => 'required|file|mimes:jpeg,png,gif,webp,pdf|max:4096'
                ]);
                $doc_file = $request->file('doc_file');
                $ext = $doc_file->getClientOriginalExtension();
                $filename = $doc->doc_desc.'_'.Auth::user()->lgname.'.'.$ext;
                $doc_file->move(public_path(). '/document/mahasiswa/', $filename);
                $mhsdoc = new TblmahasiswaDoc;
                $mhsdoc->mahasiswa_id = Auth::user()->tblmahasiswa->mahasiswa_id;
                $mhsdoc->doc_id = $request->doc_id;
                $mhsdoc->doc_file = $filename;
                $mhsdoc->save();

                return redirect()->back()->with("success", "Unggah Dokumen berhasil");
            }
        }else{
            $this->validate($request, [
                'doc_file' => 'required|file|mimes:jpeg,png,gif,webp,pdf|max:4096'
            ]);
            $doc_file = $request->file('doc_file');
            $ext = $doc_file->getClientOriginalExtension();
            $filename = $doc->doc_desc.'_'.Auth::user()->lgname.'.'.$ext;
            $doc_file->move(public_path(). '/document/mahasiswa/', $filename);
            $mhsdoc = new TblmahasiswaDoc;
            $mhsdoc->mahasiswa_id = Auth::user()->tblmahasiswa->mahasiswa_id;
            $mhsdoc->doc_id = $request->doc_id;
            $mhsdoc->doc_file = $filename;
            $mhsdoc->save();

            return redirect()->back()->with("success", "Unggah Dokumen berhasil");
        }
    }

    public function delete($mhs_doc_id){
        $mhsdoc = TblmahasiswaDoc::where("mhs_doc_id", $mhs_doc_id)->first();
        File::delete(public_path(). '/document/mahasiswa/'. $mhsdoc->doc_file);
        $mhsdoc->delete();
        return redirect()->back()->with("success", "Hapus Dokumen berhasil");
    }
}
