<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use App\Models\Tblkota;
use App\Models\Tbluser;
use App\Models\Tbljurusan;
use App\Models\Tblfakultas;
use App\Models\Tblprovinsi;
use App\Models\TbluserRole;
use App\Models\Tblmahasiswa;
use Illuminate\Http\Request;
use App\Models\Tblperusahaan;
use App\Models\TblmahasiswaRequest;
use App\Http\Controllers\Controller;
use App\Models\TblmahasiswaDetail;
use App\Models\TblperusahaanDetail;
use App\Models\TblperusahaanRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(Request $req)
    {
        $kotas = Tblkota::all();
        $provs = Tblprovinsi::all();
        $fakultass = Tblfakultas::all();
        $jurusans = Tbljurusan::all();
        if ($req->input("role") == "mhs" || $req->input("role") == ""){
            return view('auth.register_mhs', ["kotas" => $kotas, "provs" => $provs, "fakultass" => $fakultass, "jurusans" => $jurusans]);
        }else{
            return view('auth.register_perusahaan', ["kotas" => $kotas, "provs" => $provs]);
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['role'] == '3'){ //perusahaan

            return Validator::make($data, [
                'nama' => ['required', 'string', 'max:50'],
                'web' => ['required'],
                'alamat' => ['required', 'string'],
                'phone_number' => ['required', 'string', 'max:15'],
                'deskripsi' => ['required'],
                'logo_pic' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'kota_id' => ['required'],
                'prov_id' => ['required'],
                'pic_name' => ['required', 'string', 'max:100'],
                'pic_phone' => ['required', 'string', 'max:15'],
                'pic_email' => ['required', 'string', 'max:100'],
                'pic_title' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:tbluser'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }else{
            return Validator::make($data, [
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
                'email' => ['required', 'string', 'email', 'max:255', 'unique:tbluser'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            $user = Tbluser::create([
                'lgname' => $data['nama'],
                'password' => Hash::make($data['password']),
                'email' => $data['email']
            ]);
            $user_id = $user->user_id;
            TbluserRole::create([
                'role_id' => $data['role'],
                'user_id' => $user_id
            ]);
            if ($data['role'] == 3) {
                $imageName = 'Logo_'.time().'.'.request()->logo_pic->getClientOriginalExtension();
                request()->logo_pic->move(public_path('imgs/perusahaan'), $imageName);
                $prs = Tblperusahaan::create([
                    'user_id' => $user_id,
                    'nama' => $data['nama'],
                    'kota_id' => $data['kota_id'],
                    'prov_id' => $data['prov_id'],
                ]);
                $perusahaan_id = $prs->perusahaan_id;
                $prsDetail = TblperusahaanDetail::create([
                    'perusahaan_id' => $perusahaan_id,
                    'alamat' => $data['alamat'],
                    'phone_number' => $data['phone_number'],
                    'deskripsi' => $data['deskripsi'],
                    'logo_pic' => $imageName,
                    'web' => $data['web'],
                    'pic_name' => $data['pic_name'],
                    'pic_phone' => $data['pic_phone'],
                    'pic_email' => $data['pic_email'],
                    'pic_title' => $data['pic_title'],
                ]);
                $req = TblperusahaanRequest::create([
                    'perusahaan_id' => $perusahaan_id,
                    'req_date' => Carbon::now()
                ]);
                return $prs;
            } else {
                if ($data["is_lulus"] == 0) {
                    $tahun = 0;
                }else{
                    $tahun = $data["tahun_lulus"];
                }
                $mhs =  Tblmahasiswa::create([
                    'user_id' => $user_id,
                    'kota_id' => $data['kota_id'],
                    'prov_id' => $data['prov_id'],
                    'jurusan_id' => $data['jurusan_id'],
                    'fakultas_id' => $data['fakultas_id'],
                ]);
                $mahasiswa_id = $mhs->mahasiswa_id;
                $mhsDetail = TblmahasiswaDetail::create([
                    'mahasiswa_id' => $mahasiswa_id,
                    'alamat' => $data['alamat'],
                    'nama' => $data['nama'],
                    'nim' => $data['nim'],
                    'nik' => $data['nik'],
                    'tahun_ajaran' => $data['tahun_ajaran'],
                    'nohp' => $data['nohp'],
                    'gender' => $data['gender'],
                    'is_lulus' => $data['is_lulus'],
                    'tahun_lulus' => $tahun,
                    'email' => $data['email'],
                ]);
                $req = TblmahasiswaRequest::create([
                    'mahasiswa_id' => $mahasiswa_id,
                    'req_date' => Carbon::now()
                ]);
                return $mhs;
            }
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath())->with('status', "Pendaftaran berhasil, silahkan tunggu konfirmasi career center Universitas Esa Unggul.");
    }
}
