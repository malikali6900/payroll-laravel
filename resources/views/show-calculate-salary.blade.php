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

                    @if(isset($user, $salary, $allowances, $bonuses, $deductions, $totalSalary))
                        <h2 class="text-custom mt-5 mb-4">Calculated Salary</h2>
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
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-custom">Basic Salary</td>
                                    <td>{{ $salary->salary_amount ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td class="text-custom">Allowances</td>
                                    <td>{{ $allowances ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td class="text-custom">Bonuses</td>
                                    <td>{{ $bonuses ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td class="text-custom">Deductions</td>
                                    <td>{{ $deductions ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td class="text-custom">Total Salary</td>
                                    <td>{{ $totalSalary ?? 0 }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
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
