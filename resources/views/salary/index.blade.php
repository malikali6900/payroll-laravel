@extends('layouts.dashboard-layout')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

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
                    <div class="row justify-content-center left-btn-row">
                        <h1 class="col-6"></h1>
                        <div class="col-6 text-right">
                            <button id="exportButton" class="btn btn-primary">Export to Excel</button>
                        </div>
                    </div>
                    @if(isset($salaries) && count($salaries) > 0)
                        <h2 class="text-custom mt-5 mb-4">Salaries of Employees</h2>
                        <table class="table border-collapse text-dark" id="salary_table">
                            <thead>
                                <tr>
                                    <th class="text-custom">Employee Name</th>
                                    <th class="text-custom">Basic Salary</th>
                                    <th class="text-custom">Allowances</th>
                                    <th class="text-custom">Bonuses</th>
                                    <th class="text-custom">Deductions</th>
                                    <th class="text-custom">Total Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salaries as $salary)
                                    <tr>
                                        <td>{{ $salary->employee->name }}</td>
                                        <td>{{ $salary->salary_amount ?? 0 }}</td>
                                        <td>{{ $salary->allowance ?? 0 }}</td>
                                        <td>{{ $salary->bonus ?? 0 }}</td>
                                        <td>{{ $salary->deduction ?? 0 }}</td>
                                        <td>
                                            <div class="total__salary">
                                                {{ $salary->totalSalary ?? 0 }}
                                            </div>
                                             <span>{{ $salary->month ?? 0 }} - {{ $salary->year ?? 0 }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Get all the rows in the table body
                                var rows = document.querySelectorAll('tbody tr');
                        
                                // Loop through each row
                                rows.forEach(function(row) {
                                    // Get the values from the columns
                                    var salaryAmount = parseFloat(row.querySelector('td:nth-child(2)').innerText) || 0;
                                    var allowance = parseFloat(row.querySelector('td:nth-child(3)').innerText) || 0;
                                    var bonus = parseFloat(row.querySelector('td:nth-child(4)').innerText) || 0;
                                    var deduction = parseFloat(row.querySelector('td:nth-child(5)').innerText) || 0;
                        
                                    // Calculate the total salary
                                    var totalSalary = salaryAmount + allowance + bonus - deduction;
                        
                                    // Set the calculated total salary in the last column
                                    row.querySelector('.total__salary').innerText = totalSalary.toFixed(2);
                                });
                            });
                        </script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                document.getElementById('exportButton').addEventListener('click', function() {
                                    exportTableToExcel('salary_table', 'exported_data');
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
                    @else
                        <p>No salaries found.</p>
                    @endif
       
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
