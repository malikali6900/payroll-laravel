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
                    <h1 class=" text-dark my-5 font-weight-normal">Leaves List</h1>
                    {{-- <table class="table">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Leave Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through your database records here -->
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>
                                    @if ($employee->leave_status === 'Approved')
                                        <span class="text-success">Approved</span>
                                    @elseif ($employee->leave_status === 'Rejected')
                                        <span class="text-danger">Rejected</span>
                                    @else
                                        <span class="text-warning">Pending</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            <!-- End of loop -->
                        </tbody>
                    </table> --}}
                    <table class="table text-dark border-collapse">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Leave Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>6</td>
                                <td>Talha Rasheed</td>
                                <td class="text-success">Approved</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Taimoor Barlas</td>
                                <td class="text-danger">Rejected</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>Ali Ahmed</td>
                                <td class="text-success">Approved</td>
                            </tr>
                            <!-- Add more rows with different leave statuses as needed -->
                        </tbody>
                    </table>
                    <h4 class="text-dark mt-5 pt-3">Note:</h4>
                    <p class="text-dark">Rejected Leaves will be considerd as Absent.</p>

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
