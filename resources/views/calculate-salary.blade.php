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

                    <h1 class="mb-4 text-center pb-4 mt-4 pt-4">Calculate Sallary</h1>
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('calculate.salary') }}" class="custom-form">
                        @csrf

                        <div class="form-group">
                            <label for="user_id">Select Employee</label>
                            <select id="user_id" name="user_id" class="form-control" onchange="updateEmployeeId()">
                                <option value="">Select Employee</option>
                                @if(auth()->user()->role === 'super_admin')
                                    @foreach($salaries as $salary)
                                        <option value="{{ $salary->employee_id }}">{{ $salary->name }}</option>
                                    @endforeach
                                @else
                                    <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="employee_id">Employee ID</label>
                            <input type="text" id="employee_id" name="employee_id" class="form-control" readonly>
                        </div>

                        <!-- Add other form fields as needed -->

                        <button type="submit" class="btn btn-primary">Calculate Salary</button>
                    </form>

                    <script>
                        function updateEmployeeId() {
                            var employeeSelect = document.getElementById('user_id');
                            var employeeIdInput = document.getElementById('employee_id');

                            // Get the selected option
                            var selectedOption = employeeSelect.options[employeeSelect.selectedIndex];

                            // Set the value of the employee_id input
                            employeeIdInput.value = selectedOption.value;
                        }
                    </script>
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
