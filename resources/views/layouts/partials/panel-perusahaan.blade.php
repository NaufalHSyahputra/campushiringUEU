<div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-2">
            <div class="card-icon bg-primary">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Lowongan</h4>
              </div>
              <div class="card-body">
                @php
                $totalLow = App\Models\Tbllowongan::where("perusahaan_id", Auth::user()->tblperusahaan->perusahaan_id)->count();
                echo $totalLow;
                @endphp
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-2">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Lowongan Pending</h4>
              </div>
              <div class="card-body">
                    @php
                    $totalLow = App\Models\Tbllowongan::where("is_approved", 0)->where("perusahaan_id", Auth::user()->tblperusahaan->perusahaan_id)->count();
                    echo $totalLow;
                    @endphp
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-2">
            <div class="card-icon bg-warning">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Pelamar</h4>
              </div>
              <div class="card-body">
                    @php
                    $totalLow = App\Models\TbllowonganMhs::join("tbllowongan", "tbllowongan.lowongan_id", "=", "tbllowongan_mhs.lowongan_id")->join("tblperusahaan", "tblperusahaan.perusahaan_id", "=", "tbllowongan.perusahaan_id")->where("tblperusahaan.perusahaan_id", Auth::user()->tblperusahaan->perusahaan_id)->count();
                    echo $totalLow;
                    @endphp
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-2">
            <div class="card-icon bg-success">
              <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Lowongan Expired</h4>
              </div>
              <div class="card-body">
                    @php
                    $totalLow = App\Models\Tbllowongan::where("expired_date", "<", date("Y-m-d"))->where("perusahaan_id", Auth::user()->tblperusahaan->perusahaan_id)->count();
                    echo $totalLow;
                    @endphp
              </div>
            </div>
          </div>
        </div>
      </div>
