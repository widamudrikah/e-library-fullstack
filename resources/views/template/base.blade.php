<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title') | E-Library</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('purple/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('purple/assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('purple/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{ asset('purple/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('purple/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('purple/assets/css/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ asset('purple/assets/images/favicon.png')}}" />
</head>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('template.includes.navbar')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_sidebar.html -->
      @include('template.includes.sidebar')


      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->

        @include('template.includes.footer')

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- plugins:js -->
  <script src="{{ asset('purple/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('purple/assets/vendors/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('purple/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('purple/assets/js/off-canvas.js')}}"></script>
  <script src="{{ asset('purple/assets/js/misc.js')}}"></script>
  <script src="{{ asset('purple/assets/js/settings.js')}}"></script>
  <script src="{{ asset('purple/assets/js/todolist.js')}}"></script>
  <script src="{{ asset('purple/assets/js/jquery.cookie.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="{{ asset('purple/assets/js/dashboard.js')}}"></script>
  <!-- End custom js for this page -->

  <!-- Wajib ada -->
  @stack('scripts')
</body>

</html>