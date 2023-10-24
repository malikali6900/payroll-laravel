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
                    <h1>Employee List</h1>
    <form method="POST" action="{{ url('/employees/update') }}">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>
                        <input class="form-control" type="text" name="name[]" value="{{ $employee->name }}">
                        <input class="form-control" type="hidden" name="id[]" value="{{ $employee->id }}">
                        @error('name.' . $loop->index)
                        <span class="text-danger">Name cannot be empty</span>
                        @enderror
                    </td>
                    <td>
                        <input class="form-control" type="text" name="designation[]" value="{{ $employee->designation }}">
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Save Updates</button>
    </form>

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
