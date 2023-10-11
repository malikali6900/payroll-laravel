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
                    <h2 class="mb-4">List of Pakistani Holidays</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>English Name</th>
                                <th>Local Name</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>5 February</td>
                                <td>Kashmir Solidarity Day</td>
                                <td>یوم یکجحتی کشمیر<br>Youm-e-Yakjehti Kashmir</td>
                                <td>Observed to show Pakistan's support and unity with the people of Jammu and Kashmir.</td>
                            </tr>
                            <tr>
                                <td>23 March</td>
                                <td>Pakistan Day</td>
                                <td>یوم پاکستان<br>Youm-e-Pakistan</td>
                                <td>Commemorates the Lahore Resolution, which formally demanded an independent Muslim-majority state to be created out of British India. The republic was also declared on this day in 1956.</td>
                            </tr>
                            <tr>
                                <td>1 May</td>
                                <td>Labour Day</td>
                                <td>یوم مزدور<br>Youm-e-Mazdoor</td>
                                <td>Celebrates the achievements of Labor.</td>
                            </tr>
                            <tr>
                                <td>14 August</td>
                                <td>Independence Day</td>
                                <td>یومِ آزادی<br>Youm-e-Azadi</td>
                                <td>Marking Pakistani independence and the formation of Pakistan in 1947.</td>
                            </tr>
                            <tr>
                                <td>6 September</td>
                                <td>Defense Day</td>
                                <td>یوم دفاع<br>Youm-e-Difa</td>
                                <td>Celebrated in Pakistan as a national day to commemorate the sacrifices made by Pakistani soldiers in defending its borders.</td>
                            </tr>
                            <tr>
                                <td>10 November</td>
                                <td>Iqbal Day</td>
                                <td>یومِ اقبال<br>Youm-e-Iqbal</td>
                                <td>Birthday of Muhammad Iqbal, National Poet of Pakistan.</td>
                            </tr>
                            <tr>
                                <td>25 December</td>
                                <td>Quaid-e-Azam Day</td>
                                <td>یوم ولادت قائداعظم<br>Youm-e-Quaid-e-Azam</td>
                                <td>Birthday of Muhammad Ali Jinnah, founder of Pakistan.</td>
                            </tr>
                        </tbody>
                    </table>

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