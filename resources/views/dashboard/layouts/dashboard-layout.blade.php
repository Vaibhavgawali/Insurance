<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Insurance next</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/admin-assets/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/admin-assets/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/admin-assets/assets/css/style.css">
    <link rel="stylesheet" href="/admin-assets/assets/css/candidate-quiz.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/admin-assets/assets/images/logomini.jpg" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script

</head>

<body>
    
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <x-dashboard-header></x-dashboard-header>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <x-dashboard-sidebar></x-dashboard-sidebar>
            <!-- partial -->
            <div class="main-panel">

                @yield('main-section')
      
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <x-dashboard-footer></x-dashboard-footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/admin-assets/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/admin-assets/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/admin-assets/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/admin-assets/assets/js/off-canvas.js"></script>
    <script src="/admin-assets/assets/js/hoverable-collapse.js"></script>
    <script src="/admin-assets/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/admin-assets/assets/js/dashboard.js"></script>
    <script src="/admin-assets/assets/js/profile.js"></script>
    <script src="/admin-assets/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
</body>

</html>