<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="admin_assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin_assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="admin_assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="admin_assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="admin_assets/modules/select2/dist/css/select2.min.css">
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
              <div class="card-header"><h4>Pendaftaran Perusahaan</h4></div>

              <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="role" id="role" value="3">
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
                            Data Perusahaan
                        </div>
                  <div class="form-group">
                    <label for="nama">Nama Perusahaan</label>
                    <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}">
                    <div class="invalid-feedback">{{ $errors->first('nama') }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone_number">Nomor telepon Perusahaan</label>
                    <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number">
                    <div class="invalid-feedback">{{ $errors->first('phone_number') }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="web">Website Perusahaan</label>
                    <input id="web" type="text" class="form-control{{ $errors->has('web') ? ' is-invalid' : '' }}" name="web">
                    <div class="invalid-feedback">{{ $errors->first('web') }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi Perusahaan</label>
                    <textarea class="summernote" name="deskripsi" id="deskripsi"></textarea>
                    <div class="invalid-feedback">{{ $errors->first('deskripsi') }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nohp">Logo Perusahaan</label>
                    <input type="file" name="logo_pic" id="logo_pic">
                    <div class="invalid-feedback">{{ $errors->first('logo_pic') }}
                    </div>
                  </div>

                  <div class="form-divider">
                    Alamat Perusahaan
                  </div>
                  <div class="form-group">
                        <label for="tahun_ajaran">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"></textarea>
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
                  <div class="form-divider">
                        Data Penanggung Jawab
                      </div>
                  <div class="form-group">
                    <label for="pic_name">Nama Penanggung Jawab</label>
                    <input id="pic_name" type="text" class="form-control{{ $errors->has('pic_name') ? ' is-invalid' : '' }}" name="pic_name">
                    <div class="invalid-feedback">{{ $errors->first('pic_name') }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pic_phone">Nomor Telepon Penanggung Jawab</label>
                    <input id="pic_phone" type="text" class="form-control{{ $errors->has('pic_phone') ? ' is-invalid' : '' }}" name="pic_phone">
                    <div class="invalid-feedback">{{ $errors->first('pic_phone') }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pic_email">EmaiL Penanggung Jawab</label>
                    <input id="pic_email" type="text" class="form-control{{ $errors->has('pic_email') ? ' is-invalid' : '' }}" name="pic_email">
                    <div class="invalid-feedback">{{ $errors->first('pic_email') }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pic_title">Jabatan Penanggung Jawab</label>
                    <input id="pic_title" type="text" class="form-control{{ $errors->has('pic_title') ? ' is-invalid' : '' }}" name="pic_title">
                    <div class="invalid-feedback">{{ $errors->first('pic_title') }}
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
  <script src="admin_assets/modules/summernote/summernote-bs4.js"></script>
  <script src="frontend_assets/js/chain.min.js"></script>
  <script src="admin_assets/modules/select2/dist/js/select2.full.min.js"></script>

  <!-- Template JS File -->
  <script src="admin_assets/js/scripts.js"></script>
  <script src="admin_assets/js/custom.js"></script>
  <script src="frontend_assets/js/chain.min.js"></script>
  <script>
  $(document).ready(function(){
    $("#prov_id").select2();
  $("#kota_id").select2();
  $("#kota_id").chained("#prov_id");
  $(".summernote").summernote({
       dialogsInBody: true,
      minHeight: 250,
    });
  });
  </script>
</body>
</html>
