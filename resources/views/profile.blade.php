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

                    <div class="row my-5 py-5">
                        <div class="col-6">
                            <div class="profile-img d-flex align-items-center justify-content-center mb-5">
                                @if (auth()->user()->user_img)
                                <img src="{{ asset('storage/' . auth()->user()->user_img) }}" alt="User Image">
                                @else
                                <img src="{{ asset('img/undraw_profile.svg') }}" alt="Placeholder Image">
                                {{-- <img src="img/undraw_profile.svg" alt="" width="300px"> --}}
                                @endif
                            </div>
                            <form class="text-center upload-img-form" action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data">
                                <p>Upload/Change Profile Picture</p>
                                @csrf
                                <input type="file" name="user_img" class="demo1">
                                <button type="submit" class="btn btn-primary theme-btn mt-4">Upload Image</button>
                            </form>
                        </div>
                        <div class="col-6 form-main">
                            @if (Auth::check() && Auth::user()->name !== '')
                            <form action="{{ route('update-profile') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="fullName">Your Name</label>
                                    <input type="text" class="form-control" id="fullName" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email address"  value="{{ Auth::user()->email }}" readonly class="focus-none">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Designation</label>
                                    <input type="text" class="form-control" id="designation" placeholder="Designation"  value="{{ Auth::user()->designation }}" readonly class="focus-none">
                                </div>
                                <div class="form-group">
                                    <label for="message">Reset Password</label>
                                    <input type="password" class="form-control" id="reset-password" name="password" placeholder="Reset Password">
                                    <div class="mt-3 d-flex align-items-center show-password">
                                        <input type="checkbox" onclick="showPassword()" id="show-pass"> <label for="show-pass" class="ml-2 m-0" style="
                                        color: #858796;
                                        font-size: 15px;
                                        font-weight: 400;
                                    " >Show Password</label>
                                    </div>
                                    <script>
                                        function showPassword() {
                                            var passwordInput = document.getElementById('reset-password');
                                        
                                            // Check if the checkbox is checked
                                            if (document.querySelector('input[type="checkbox"]').checked) {
                                                // Change the type attribute to 'text' to show the password
                                                passwordInput.type = 'text';
                                            } else {
                                                // Change the type attribute back to 'password' to hide the password
                                                passwordInput.type = 'password';
                                            }
                                        }
                                        </script>
                                </div>
                                <div class="form-group">
                                    <label for="message">Confirm Password</label>
                                    <input type="password" class="form-control" id="reset-password-confirm" name="password_confirmation" placeholder="Confirm Password">
                                </div>
                                <button type="submit" class="btn-lg btn btn-primary theme-btn">Save Change</button>
                            </form>
                            @endif
                        </div>
                    </div>

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

@endsection