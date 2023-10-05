<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Payroll') }}</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
	
</head>
<body id="page-top">

        @yield('content')

        
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- Scripts -->
     <!-- Bootstrap core JavaScript-->
     <script src="{{ asset('jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 
     <!-- Core plugin JavaScript-->
     <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
 
     <!-- Custom scripts for all pages-->
     <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
 
     <!-- Page level plugins -->
     <script src="{{ asset('chart.js/Chart.min.js') }}"></script>
 
     <!-- Page level custom scripts -->
     <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
     <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
     {{-- Custom Script --}}
     <script src="{{ asset('js/custom-plugins.js') }}"></script>

</body>
</html>
