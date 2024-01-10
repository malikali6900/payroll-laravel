@extends('layouts.dashboard-layout')

@section('content')

   <!-- Page Wrapper -->
   <div id="wrapper">

    <!-- Sidebar -->

    @component('components.admin-dashboard')
    @endcomponent

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @component('components.top-bar')
            @endcomponent
            <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Update Total Earn</div>
            
                                <div class="card-body">
                                    <form method="POST" action="{{ route('update.total.earn') }}">
                                        @csrf
                                        @method('PUT')
            
                                        <div class="form-group">
                                            <label for="total_earn">Total Earn</label>
                                            <input type="number" name="total_earn" id="total_earn" class="form-control" value="{{ $additionalDetails->total_earn }}">
                                        </div>
            
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mt-5">
                            <div class="card">
                                <div class="card-header">Update Total Spent</div>
            
                                <div class="card-body">
                                    <form method="POST" action="{{ route('update.total.spent') }}">
                                        @csrf
                                        @method('PUT')
                
                                        <div class="form-group">
                                            <label for="total_spent">Total Spent</label>
                                            <input type="number" name="total_spent" id="total_spent" class="form-control" value="{{ $additionalDetails->total_spent }}">
                                        </div>
                
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mt-5">
                            <div class="card">
                                <div class="card-header">Update Total Salaries</div>
            
                                <div class="card-body">
                                    <form method="POST" action="{{ route('update.total.salaries') }}">
                                        @csrf
                                        @method('PUT')
                                    
                                        <div class="form-group">
                                            <label for="total_salaries">Total Salaries</label>
                                            <input type="number" name="total_salaries" id="total_salaries" class="form-control" value="{{ $additionalDetails->total_salaries }}">
                                        </div>
                                    
                                        <button type="submit" class="btn btn-warning">Update Total Salaries</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © 2023 Giga Creatives Organization. All rights reserved.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

@endsection