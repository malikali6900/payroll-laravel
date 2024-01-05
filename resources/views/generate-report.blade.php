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
                    <h1 class="my-4 py-4 text-center">Generate Report</h1>
                          <form class="custom-form show-salaries-form" method="post" action="{{ route('show.all.salaries') }}">
                            @csrf

                            <div class="form-group show-salaries">
                              <label for="reportType">Select Report Type:</label>
                              <div class="form-check">
                                <input type="radio" class="form-check-input" id="monthly" name="reportType" value="monthly" checked>
                                <label class="form-check-label" for="monthly">Monthly</label>
                              </div>
                              <div class="form-check">
                                <input type="radio" class="form-check-input" id="yearly" name="reportType" value="yearly">
                                <label class="form-check-label" for="yearly">Yearly</label>
                              </div>
                            </div>

                            <div class="form-group"  id="monthDropdown">
                              <label for="month">Select Month:</label>
                              <select id="month" name="month" class="form-control">
                                  @foreach($distinctMonths as $distinctMonth)
                                      <option value="{{ $distinctMonth }}">{{ $distinctMonth }}</option>
                                  @endforeach
                              </select>
                          </div>
                          
                          <div class="form-group"  id="yearDropdown">
                              <label for="year">Select Year:</label>
                              <select id="year" name="year" class="form-control">
                                  @foreach($distinctYears as $distinctYear)
                                      <option value="{{ $distinctYear }}">{{ $distinctYear }}</option>
                                  @endforeach
                              </select>
                          </div>
                            <button type="submit" class="btn btn-primary">Show Salaries</button>
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
