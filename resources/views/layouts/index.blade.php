<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author"="">
  <title>@if(View::hasSection('title')) @yield('title') @else {{ 'Proshore' }} @endif</title>
  <link rel="icon"
    href="https://yt3.ggpht.com/-lACcuw6QnX4/AAAAAAAAAAI/AAAAAAAAAAA/7CDL8hHdNgs/s68-c-k-no-mo-rj-c0xffffff/photo.jpg" />
  <link href="{{asset('js/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('js/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('js/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
  <link href="{{asset('js/vendor/bootstrap/css/change.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/errors.css')}}">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
  <!-- AdminLte -->
  {{-- <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}"> --}}
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="{{asset('css/dist/css/adminlte.min.css')}}"> --}}
  <!-- Ionicons -->
  <link href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}" rel="stylesheet">

  <!-- Jquery -->
  <script src="{{asset('js/vendor/jquery/jquery.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
</head>

<body id="page-top">
  @include('layouts.header')
  <div id="wrapper">
    @include('layouts.nav')
    <div id="content-wrapper" style="padding-bottom:0px">
      <div class="container-fluid ">
        @include('layouts.message')
        @include('layouts.breadcrumb')
        <div class="row">
          <div class="col-12">
            @yield('main-content')
          </div>
        </div>
        {{-- @include('layouts.footer') --}}
        <!-- Scroll to Top Button-->

      </div>
      {{-- @include('layouts.footer') --}}
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded sticky" href="#page-top" style="z-index:99;">
        <i class="fas fa-angle-up"></i>
      </a>
    </div>
  </div>
  @include('layouts.logoutModal')
  <script src="{{asset('js/vendor/chart.js/Chart.min.js')}}"></script>
  @stack('page-script')
  <!-- Message timer-->
  <script>
    $(document).ready(function () {
      $('.toast').toast('show');
    });
    setTimeout(() => {
      $('div.customMsg').hide('slow');
    }, 3000);
  </script>
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{asset('js/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <!-- Page level plugin JavaScript-->

  <script src="{{asset('js/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('js/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/dashboard.js')}}"></script>
  <!-- Demo scripts for this page-->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
  <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('js/demo/chart-bar-demo.js')}}"></script>
  <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin.min.js')}}"></script>
</body>

</html>