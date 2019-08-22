<div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-2">
            <div class="card-icon bg-success">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Lowongan</h4>
              </div>
              <div class="card-body">
                @php
                $totalLow = App\Models\Tbllowongan::count();
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
                    $totalLow = App\Models\Tbllowongan::where("is_approved", 0)->count();
                    echo $totalLow;
                    @endphp
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-2">
            <div class="card-icon bg-success">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Mahasiswa</h4>
              </div>
              <div class="card-body">
                    @php
                    $totalLow = App\Models\Tblmahasiswa::count();
                    echo $totalLow;
                    @endphp
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-2">
            <div class="card-icon bg-danger">
              <i class="fas fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Mahasiswa Pending</h4>
              </div>
              <div class="card-body">
                    @php
                    $totalLow = App\Models\Tblmahasiswa::where("is_approved", 0)->count();
                    echo $totalLow;
                    @endphp
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-2">
                  <div class="card-icon bg-success">
                    <i class="far fa-building"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Perusahaan</h4>
                    </div>
                    <div class="card-body">
                          @php
                          $totalLow = App\Models\Tblperusahaan::count();
                          echo $totalLow;
                          @endphp
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-2">
                  <div class="card-icon bg-danger">
                    <i class="fas fa-building"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Perusahaan Pending</h4>
                    </div>
                    <div class="card-body">
                          @php
                          $totalLow = App\Models\Tblperusahaan::where("is_approved", 0)->count();
                          echo $totalLow;
                          @endphp
                    </div>
                  </div>
                </div>
              </div>
      </div>
