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

                    <form action="" class="calculate-sallery-form">
                        <h4 class="text-custom mt-5 pt-3">Note:</h4>
                        <p class="text-dark">Enter ID of an employee to calculate its Salary</p>
                        <input type="text" class="form-control" placeholder="ID OF EMPLOYEE" />
                        <button class="btn btn-primary btn-block mt-3" id="calculateButton">Calculate Salary</button>
                    </form>
                    <div class="calculated-salary-main">
                        <!-- Page Heading -->
                        <h2 class="text-custom mt-5 mb-4">Calculated Salary</h2>
                        <div class="calculated-sallery">
                            <table class="table border-collapse text-dark">
                                <thead>
                                    <tr>
                                        <th class="text-custom">Description</th>
                                        <th class="text-custom">Value (in Rs)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-custom">Name</td>
                                        <td>Taimoor Barlas</td>
                                    </tr>
                                    <tr>
                                        <td class="text-custom">Basic Salary</td>
                                        <td>50,000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-custom">Allowances</td>
                                        <td>5,000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-custom">Deductions</td>
                                        <td>2,000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-custom">Bonuses</td>
                                        <td>3,000</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="mt-3 mb-5 pb-5">
                                <h4 class="text-custom">Calculated Salary: <span class="font-weight-bold" id="calculatedSalary">Rs. 56,000</span></h4>
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
