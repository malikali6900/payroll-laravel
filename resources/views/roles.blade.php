<!-- resources/views/roles/index.blade.php -->

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
                    <h1 class="mb-4">Role Manager</h1>

    <form method="POST" action="{{ route('roles.update') }}">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>
                            <input class="form-control" type="text" name="role[]" value="{{ $employee->role }}">
                            <input type="hidden" name="id[]" value="{{ $employee->id }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Save Role Updates</button>
    </form>
    <h4 class="text-dark mt-5 pt-3">Note:</h4>
                    <p class="text-dark"><b>super_admin</b> will have all the rights to add and edit emplyees while <b>user</b> have less right just like (View Data and edit his profile only).</p>
    
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
