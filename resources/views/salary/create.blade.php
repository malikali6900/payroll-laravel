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
                    <h1 class="mb-4">Salary Manager</h1>
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        Salary, Allowance, and Bonus updated successfully for Employee: {{ session('employee_name') }}
                        <br>
                        New Salary Amount: {{ session('salary_amount') }}
                        <br>
                        New Allowance: {{ session('allowance') }}
                        <br>
                        New Bonus: {{ session('bonus') }}
                    </div>
                @endif

                <form method="post" action="{{ route('salary.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="employee_name">Employee Name</label>
                        <select id="employee_name" name="employee_name" class="form-control" onchange="updateEmployeeDetails()">
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="employee_id">Employee ID</label>
                        <input type="text" id="employee_id" name="employee_id" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="salary_amount">Salary Amount (Rs)</label>
                        <input type="number" id="salary_amount" name="salary_amount" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="allowance">Allowance (Rs)</label>
                        <input type="number" id="allowance" name="allowance" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="bonus">Bonus (Rs)</label>
                        <input type="number" id="bonus" name="bonus" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Salary</button>
                </form>

                <script>
                    function updateEmployeeDetails() {
                        var employeeSelect = document.getElementById('employee_name');
                        var employeeIdInput = document.getElementById('employee_id');
                        var salaryAmountInput = document.getElementById('salary_amount');
                        var allowanceInput = document.getElementById('allowance');
                        var bonusInput = document.getElementById('bonus');

                        // Get the selected option
                        var selectedOption = employeeSelect.options[employeeSelect.selectedIndex];
                        var employeeId = selectedOption.value;

                        // Set the value of the employee_id input
                        employeeIdInput.value = employeeId;

                        // Use AJAX to fetch salary details
                        axios.get('/get-salary-details/' + employeeId)
                            .then(function (response) {
                                // Update salary details in the form
                                var data = response.data;
                                salaryAmountInput.value = data.salary_amount || '';
                                allowanceInput.value = data.allowance || '';
                                bonusInput.value = data.bonus || '';
                            })
                            .catch(function (error) {
                                console.error('Error fetching salary details: ', error);
                            });
                    }
                </script>
       
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
