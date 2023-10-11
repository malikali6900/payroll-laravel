<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register User</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="{{ asset('css/home-template.css') }}">
        {{-- <link rel="stylesheet" href="assets/css/owl.css"> --}}
        <link rel="stylesheet" href="{{ asset('css/home-animation.css') }}">
        <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

</head>

<body class="">
    <div class="contact-us section" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-lg-6  align-self-center">
              <div class="section-heading">
                <h6>Contact Us</h6>
                <h2>Feel free to contact us anytime</h2>
                <p>Giga Creatives Inc. is a trusted, dexterously handled software development company. Since embarking its presence in the digital market<br>Giga Creative Inc. is offering a wide range of IT solution for the past 5 years at Giga Creative Inc. We endeavor to develop innovative, creative and customized services. </p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="contact-us-content">
                @if ($errors->has('invalid'))
                    <div class="alert alert-danger">
                        {{ $errors->first('invalid') }}
                    </div>
                @endif
                <form action="{{ url('/user-register') }}" class="user" method="POST">
                    @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="First Name" value="{{old('name')}}" name="name">
                            <span class="text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </span>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                            placeholder="Last Name" value="{{old('last_name')}}" name="last_name">
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                        placeholder="Email Address" value="{{old('email')}}" name="email">
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user"
                            id="exampleInputPassword" placeholder="Password" name="password">
                            <span class="text-danger">
                                @error('password')
                                    {{$message}}
                                @enderror
                            </span>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user"
                            id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation">
                            <span class="text-danger">
                                    @error('password_confirmation')
                                        {{$message}}
                                    @enderror
                                </span>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="user_role"
                    placeholder="Role" value="{{old('role')}}" name="role">
                    <span class="text-danger">
                        @error('role')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="user_designation"
                        placeholder="Designation" value="{{old('designation')}}" name="designation">
                    <span class="text-danger">
                        @error('designation')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Register Account
                </button>
                <hr>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
    




    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>