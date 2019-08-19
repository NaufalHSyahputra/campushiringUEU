@extends('layouts.main')

@section('title', 'Campus Hiring - Masa Berlaku Lowongan')

@section('title-section', 'Masa Berlaku Lowongan')

@section('css')
<link rel="stylesheet" href="{{ asset("admin_assets/modules/summernote/summernote-bs4.css") }}">
<link rel="stylesheet" href="{{ asset("admin_assets/modules/bootstrap-daterangepicker/daterangepicker.css") }}">
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card card-statistic-2">
      <div class="card-icon bg-warning">
        <i class="far fa-file"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Lowongan yang habis masa berlakunya</h4>
        </div>
        <div class="card-body">
          {{ count($lowongans) }}
        </div>
      </div>
    </div>
  </div>
<div class="card">
        <div class="card-header">
            <h4>@yield('title-section')</h4>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1" width="100%">
                    <thead>
                        <tr>
                            <th>Perusahaan</th>
                            <th>Judul Lowongan</th>
                            <th>Masa Berlaku</th>
                        </tr>
                    </thead>
                    <tbody>
@foreach ($lowongans as $lowongan)
    <td>{{ $lowongan->tblperusahaan->nama }}</td>
    <td>{{ $lowongan->title }}</td>
    <td>{{ $lowongan->expired_date }}</td>
@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>

</script>
@endsection

