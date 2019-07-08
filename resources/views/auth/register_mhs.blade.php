<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="admin_assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin_assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="admin_assets/modules/select2/dist/css/select2.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="admin_assets/modules/jquery-selectric/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="admin_assets/css/style.css">
  <link rel="stylesheet" href="admin_assets/css/components.css">

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
                <img src="/admin_assets/img/logo.jpg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Pendaftaran Mahasiswa</h4></div>
              <div class="card-body">
                    <a href="{{ route('register') }}?role=perusahaan" class="btn btn-primary btn-block">Daftar sebagai Perusahaan? Klik tombol ini!</a>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="role" id="role" value="2">
                    <div class="form-divider">
                        Informasi Login
                    </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                    <div class="invalid-feedback">{{ $errors->first('email') }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} pwstrength" data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                      <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                          </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password_confirmation">
                    </div>
                  </div>
                    <div class="form-divider">
                        Data Diri
                    </div>
                  <div class="form-group">
                    <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                    <input id="nik" type="text" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik" value="{{ old('nik') }}">
                    <div class="invalid-feedback">{{ $errors->first('nik') }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}">
                    <div class="invalid-feedback">{{ $errors->first('nama') }}
                    </div>
                  </div>
                    <div class="form-group">
                      <label class="d-block">Jenis Kelamin</label>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="gender" name="gender" value="Laki-Laki">
                        <label class="form-check-label" for="gender">Laki-Laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="gender" name="gender" value="Perempuan">
                        <label class="form-check-label" for="gender">Perempuan</label>
                      </div>
                      <div class="invalid-feedback">{{ $errors->first('gender') }}
                        </div>
                    </div>
                  <div class="form-group">
                    <label for="nohp">Nomor Telepon</label>
                    <input id="nohp" type="text" class="form-control{{ $errors->has('nohp') ? ' is-invalid' : '' }}" name="nohp" value="{{ old('nohp') }}">
                    <div class="invalid-feedback">{{ $errors->first('nohp') }}
                    </div>
                  </div>
                    <div class="form-divider">
                        Data Kemahasiswaaan
                    </div>
                  <div class="form-group">
                    <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                    <input id="nim" type="text" class="form-control{{ $errors->has('nim') ? ' is-invalid' : '' }}" name="nim" value="{{ old('nim') }}">
                    <div class="invalid-feedback">{{ $errors->first('nim') }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Fakultas</label>
                      <select class="form-control{{ $errors->has('fakultas_id') ? ' is-invalid' : '' }}" name="fakultas_id" id="fakultas_id">
                        @foreach ($fakultass as $fakultas)
                            <option value="{{ $fakultas->fakultas_id }}">{{ $fakultas->fakultas_name }}</option>
                        @endforeach
                      </select>
                      <div class="invalid-feedback">{{ $errors->first('fakultas_id') }}
                        </div>
                    </div>
                    <div class="form-group col-6">
                      <label>Jurusan</label>
                      <select class="form-control{{ $errors->has('jurusan_id') ? ' is-invalid' : '' }}" name="jurusan_id" id="jurusan_id">
                        @foreach ($jurusans as $jurusan)
                        <option value="{{ $jurusan->jurusan_id }}" class="{{ $jurusan->fakultas_id }}">{{ $jurusan->jurusan_name }}</option>
                    @endforeach
                      </select>
                      <div class="invalid-feedback">{{ $errors->first('jurusan_id') }}
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tahun_ajaran">Tahun Angkatan</label>
                    <input id="tahun_ajaran" type="text" class="form-control{{ $errors->has('tahun_ajaran') ? ' is-invalid' : '' }}" value="{{ old('tahun_ajaran') }}" name="tahun_ajaran">
                    <div class="invalid-feedback">{{ $errors->first('tahun_ajaran') }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nohp">Status Kelulusan</label>
                    <select name="is_lulus" id="is_lulus" class="form-control{{ $errors->has('is_lulus') ? ' is-invalid' : '' }}" value="{{ old('is_lulus') }}">
                        <option value="0">Belum Lulus</option>
                        <option value="1">Sudah lulus</option>
                    </select>
                    <div class="invalid-feedback">{{ $errors->first('is_lulus') }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tahun_lulus">Tahun Lulus</label>
                    <input id="tahun_lulus" type="text" class="form-control{{ $errors->has('tahun_lulus') ? ' is-invalid' : '' }}"  value="{{ (old('tahun_lulus') != "" ? old('tahun_lulus'): '0') }}"name="tahun_lulus" disabled="disabled">
                    <div class="invalid-feedback">{{ $errors->first('tahun_lulus') }}
                    </div>
                  </div>

                  <div class="form-divider">
                    Alamat Rumah
                  </div>
                  <div class="form-group">
                        <label for="tahun_ajaran">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}">{{ old('alamat') }}</textarea>
                        <div class="invalid-feedback">{{ $errors->first('alamat') }}
                        </div>
                      </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Provinsi</label>
                      <select class="form-control{{ $errors->has('prov_id') ? ' is-invalid' : '' }}" name="prov_id" id="prov_id">
                        @foreach ($provs as $prov)
                            <option value="{{ $prov->prov_id }}">{{ $prov->prov_nama }}</option>
                        @endforeach
                      </select>
                      <div class="invalid-feedback">{{ $errors->first('prov_id') }}
                        </div>
                    </div>
                    <div class="form-group col-6">
                      <label>Kota</label>
                      <select class="form-control{{ $errors->has('kota_id') ? ' is-invalid' : '' }}" name="kota_id" id="kota_id">
                        @foreach ($kotas as $kota)
                        <option value="{{ $kota->kota_id }}" class="{{ $kota->prov_id }}">{{ $kota->kota_nama }}</option>
                    @endforeach
                      </select>
                      <div class="invalid-feedback">{{ $errors->first('kota_id') }}
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Daftar!
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="admin_assets/modules/jquery.min.js"></script>
  <script src="admin_assets/modules/popper.js"></script>
  <script src="admin_assets/modules/tooltip.js"></script>
  <script src="admin_assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="admin_assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="admin_assets/modules/moment.min.js"></script>
  <script src="admin_assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="admin_assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="admin_assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="admin_assets/js/page/auth-register.js"></script>
  <script src="frontend_assets/js/chain.min.js"></script>
  <script src="admin_assets/modules/select2/dist/js/select2.full.min.js"></script>
  <!-- Template JS File -->
  <script src="admin_assets/js/scripts.js"></script>
  <script src="admin_assets/js/custom.js"></script>
  <script>
  $(document).ready(function(){
    $("#prov_id").select2();
  $("#kota_id").select2();
  $("#kota_id").chained("#prov_id");
  $("#is_lulus").change(function(){
      if ($(this).val() == 1) {
          $("#tahun_lulus").prop('disabled', '');
      } else {
        $("#tahun_lulus").prop('disabled', 'disabled');
        $("#tahun_lulus").val("0");
      }
  })
  })
  </script>
</body>
</html>
