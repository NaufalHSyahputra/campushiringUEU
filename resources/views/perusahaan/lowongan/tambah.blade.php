@extends('layouts.main')

@section('title', 'Campus Hiring - Tambah Lowongan')

@section('title-section', 'Tambah Lowongan')

@section('content')
<div class="card">
        <div class="card-header">
            <h4>@yield('title-section')</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('perusahaan.lowongan.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label>Judul Lowongan</label>
                          <input type="text" class="form-control" name="title">
                        </div>
                      <div class="form-group">
                            <label>Deskripsi Lowongan</label>
                            <textarea name="deskripsi" id="deskripsi"></textarea>
                          </div>
                        <div class="form-group">
                            <label for="duration">Durasi</label>
                            <select name="duration" id="duration" class="form-control">
                                <option value="2">2 Minggu</option>
                                <option value="4">1 Bulan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kota_id">Kota</label>
                            <select name="kota_id" id="kota_id" class="form-control select2">
                                @foreach ($kotas as $kota)
                                <option value="{{ $kota->kota_id }}">{{ $kota->kota_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="low_type_id">Tipe Lowongan</label>
                            <select name="low_type_id" id="low_type_id" class="form-control">
                                @foreach ($lowtypes as $low_type)
                                <option value="{{ $low_type->low_type_id }}">{{ $low_type->low_type_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fakultas_id">Fakultas</label>
                            <select name="fakultas_id" id="fakultas_id" class="form-control select2">
                                @foreach ($fakultass as $fakultas)
                                    <option value="{{ $fakultas->fakultas_id }}">{{ $fakultas->fakultas_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="skill_id">Skill</label>
                            <select name="skill_id" id="skill_id" class="form-control select2">
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->skill_id }}" class="{{ $skill->fakultas_id }}">{{ $skill->skill_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="salary_min">Gaji Minimal</label>
                              <input type="number" class="form-control" id="salary_min" name="salary_min" placeholder="Gaji Minimal">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="salary_max">Gaji Maksimal</label>
                              <input type="number" class="form-control" id="salary_max" name="salary_max" placeholder="Gaji Maksimal">
                            </div>
                          </div>
                        <div class="form-group">
                            <label for="is_salary_nego">Gaji negotiable</label>
                            <select name="is_salary_nego" id="is_salary_nego" class="form-control">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="surat_peromohonan">Surat Permohonan</label>
                                <input type="file" class="form-control" id="file_sp" name="file_sp">
                            </div>
                            <div class="form-group">
                                    <label for="is_salary_nego">Poster</label>
                                <input type="file" class="form-control" id="file_poster" name="file_poster">
                                </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </form>
        </div>
    </div>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset("admin_assets/modules/bootstrap-daterangepicker/daterangepicker.css") }}">
<link rel="stylesheet" href="{{ asset("admin_assets/modules/select2/dist/css/select2.min.css") }}">
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>
<script src="{{ asset('admin_assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/chain.min.js') }}"></script>
<script src="{{ asset('admin_assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script>
CKEDITOR.replace( 'deskripsi', {
					width: '100%',
					height: 500
				} );
			// First matching element will be used
      </script>
@endsection
