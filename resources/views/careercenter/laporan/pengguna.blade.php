@extends('layouts.main')

@section('title', 'Campus Hiring - Jumlah Pengguna')

@section('title-section', 'Jumlah Pengguna')

@section('css')
<link rel="stylesheet" href="{{ asset("admin_assets/modules/summernote/summernote-bs4.css") }}">
<link rel="stylesheet" href="{{ asset("admin_assets/modules/bootstrap-daterangepicker/daterangepicker.css") }}">
@endsection
@section('content')
<div class="card">
        <div class="card-header">
            <h4>@yield('title-section')</h4>

        </div>
        <div class="card-body">
            {!! $chart->container() !!}
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
@endsection
