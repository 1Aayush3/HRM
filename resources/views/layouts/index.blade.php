<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author"="">
  <title>@if(View::hasSection('title')) @yield('title') @else {{ 'Proshore' }} @endif</title>
  <!-- Bootstrap CSS-->
  <link href="{{asset('js/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
  <!-- css for font-awesome-->
  <link href="{{asset('js/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <!-- CSS for datatables-->
  <link href="{{asset('js/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <!-- Custom styles for dashboard-->
  <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
  <!-- Custom styles for dashboard-->
  <link href="{{asset('js/vendor/bootstrap/css/change.css')}}" rel="stylesheet">
  <!-- Styles for datatable-->
  {{-- <link href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}" rel="stylesheet">
  --}}
  {{-- <link href="{{asset('https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  --}}
  <!-- scripts for datatable-->
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
  {{-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}
  {{-- <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script> --}}
</head>

<body id="page-top">
  @include('layouts.header')
  <div id="wrapper">
    @include('layouts.nav')
    <div id="content-wrapper">
      <div class="container-fluid">
        @include('layouts.breadcrumb')
        <div class="row">
          <div class="col-xl-5 col-sm-6 mb-3 ">
            @yield('main-content')
          </div>
        </div>

      </div>
      @include('layouts.footer')
    </div>
  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  @include('layouts.logoutModal')

  <!-- Bootstrap core JavaScript-->
  <script src="../js/vendor/jquery/jquery.min.js"></script>
  @stack('page-script')
  <script src="../js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../js/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Page level plugin JavaScript-->
  <script src="../js/vendor/chart.js/Chart.min.js"></script>
  <script src="../js/vendor/datatables/jquery.dataTables.js"></script>
  <script src="../js/vendor/datatables/dataTables.bootstrap4.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../js/dashboard.js"></script>
  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>
  <script src="../js/demo/chart-area-demo.js"></script>
</body>

</html>