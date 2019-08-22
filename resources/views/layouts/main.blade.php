<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Stisla Laravel') &mdash; {{ env('APP_NAME') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_assets/css/components.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_assets/modules/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  @yield('css')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        @include('layouts.partials.topnav')
      </nav>
      <div class="main-sidebar">
        @include('layouts.partials.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('title-section')</h1>
            </div>
        <div class="section-body">
            @if (Auth::user()->tbluser_role->role_id == 3 )
                @include('layouts.partials.panel-perusahaan')
            @elseif (Auth::user()->tbluser_role->role_id == 4)
                @include('layouts.partials.panel-careercenter')
            @endif
            @yield('content')
        </div>
        </section>
      </div>
      <footer class="main-footer">
        @include('layouts.partials.footer')
      </footer>
    </div>
  </div>
  @yield('modal')
  <script src="{{ asset('js/app.js') }}?{{ uniqid() }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('admin_assets/js/stisla.js') }}"></script>
  <script src="{{ asset('admin_assets/js/scripts.js') }}"></script>
  <script src="{{ asset('admin_assets/modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('admin_assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin_assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('admin_assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
  @include('sweetalert::alert')
  @yield('js')
</body>
</html>
