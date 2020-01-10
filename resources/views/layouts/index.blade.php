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
  <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
  <!-- Nprogress styles for loading -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" rel="stylesheet"
    type="text/css">
  <!-- Ionicons -->
  <link href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}" rel="stylesheet">
  <!-- Jquery -->
  <script src="{{asset('js/vendor/jquery/jquery.min.js')}}"></script>
  <!-- Jquery datepicker -->
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
    integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
  <!-- Jquery Validation-->
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
      </div>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded sticky" href="#page-top" style="z-index:99;">
        <i class="fas fa-angle-up"></i>
      </a>
    </div>
  </div>
  @include('layouts.logoutModal')
  <!-- Sweet alert-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Pie chart-->
  <script src="{{asset('js/vendor/chart.js/Chart.min.js')}}"></script>
  @stack('page-script')
  <script>
    /*<------------Alert Promise----->*/
    function removeAlert(){
      return new Promise(function(resolve,reject) {
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover it!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          closeOnClickOutside:false,
        }).then(resp => {
          if (resp) {
            resolve(true);
          }
          resolve(false);
        })
      })
    }  
    /*<-------Message timer---------->*/
    setTimeout(() => {
      $('div.customMsg').hide('slow');
    }, 3000);
    /*<-------Ajax ProgressBar---------->*/  
    function nProgressBar(){
      NProgress.start();
      NProgress.set(0.5);
      NProgress.configure({ parent: '#page-top' });
      NProgress.inc();
      NProgress.configure({ ease: 'ease', speed: 500 });
      NProgress.configure({ showSpinner: true });
    }
  </script>

  <script>
    function formRemove() {
      event.preventDefault();
      removeAlert().then((isConfirm) => {
          if (isConfirm == true) {
            console.log('ok');
            $('#submitRemove').submit();
            return false;
          }
          else {
            swal("Cancelled", "nothing done", "error");
          }
      });
    }
  </script>
  <!-- Nprogress Bar JavaScript-->
  <script src=" https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
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
  {{-- <script src="{{asset('js/demo/chart-area-demo.js')}}"></script> --}}
  {{-- <script src="{{asset('js/demo/chart-bar-demo.js')}}"></script> --}}
  {{-- <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script> --}}
  <!-- Custom scripts for all pages-->
  {{-- <script src="{{asset('js/sb-admin.min.js')}}"></script> --}}
</body>

</html>