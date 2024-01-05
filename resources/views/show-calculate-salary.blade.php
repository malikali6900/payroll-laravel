@extends('layouts.dashboard-layout')

@section('content')

   <!-- Page Wrapper -->
   <div id="wrapper">

    <!-- Sidebar -->

    @if(Auth::user()->role === 'super_admin')
    @component('components.admin-dashboard')
    @endcomponent
    @elseif(Auth::user()->role === 'user')
        @component('components.employe-dashboard')
        @endcomponent
    @endif


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
                    <div class="row justify-content-center left-btn-row">
                        <h2 class="text-custom mt-5 mb-4 col-6">Calculated Salary</h2>
                        <div class="col-6 text-right">
                            <button id="exportButton" class="btn btn-primary">Export to Excel</button>
                        </div>
                    </div>
                        <table class="table border-collapse text-dark" id="individual-salary">
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
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                document.getElementById('exportButton').addEventListener('click', function() {
                                    exportTableToExcel('individual-salary', 'exported_data');
                                });
                        
                                function exportTableToExcel(tableId, filename) {
                                    var table = document.getElementById(tableId);
                                    var ws = XLSX.utils.table_to_sheet(table);
                                    var wb = XLSX.utils.book_new();
                                    XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
                                    XLSX.writeFile(wb, filename + '.xlsx');
                                }
                            });
                        </script>
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
