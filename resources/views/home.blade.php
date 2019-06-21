@extends('layouts.main')

@section('title')
Home
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Home</h1>
  </div>
  <div class="section-body">
    <div class="card">
        <div class="card-header">
          <h4>Budget vs Sales</h4>
        </div>
        <div class="card-body">
          qwq
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card gradient-bottom">
        <div class="card-header">
          <h4>Top 5 Products</h4>
          <div class="card-header-action dropdown">
            <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              <li class="dropdown-title">Select Period</li>
              <li><a href="#" class="dropdown-item">Today</a></li>
              <li><a href="#" class="dropdown-item">Week</a></li>
              <li><a href="#" class="dropdown-item active">Month</a></li>
              <li><a href="#" class="dropdown-item">This Year</a></li>
            </ul>
          </div>
        </div>
        <div class="card-body" id="top-5-scroll">
          asa
        </div>
        <div class="card-footer pt-3 d-flex justify-content-center">
            asa
        </div>
      </div>
  </div>
</section>
@endsection
