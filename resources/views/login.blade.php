<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
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
                <div class="special-offer">
                  <span class="offer">off<br><em>50%</em></span>
                  <h6>Valide: <em>24 April 2036</em></h6>
                  <h4>Special Offer <em>50%</em> OFF!</h4>
                  <a href="#"><i class="fa fa-angle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="contact-us-content">
                @if ($errors->has('invalid'))
                    <div class="alert alert-danger">
                        {{ $errors->first('invalid') }}
                    </div>
                @endif
                <form action="{{ url('/') }}" class="user" method="POST" id="contact-form">
                    @csrf
                  <div class="row">
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" value="{{old('email')}}" autocomplete="off">
                                                <span class="text-danger">
                                                    @error('email')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                        {{-- <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required> --}}
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" value="">
                                                <span class="text-danger">
                                                    @error('password')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                        {{-- <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required=""> --}}
                      </fieldset>
                      <div class="mb-4">
                        <a class="small text-white" href="{{ route('forgot-password') }}">Forgot Password?</a>
                    </div>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="orange-button">Login Now</button>
                      </fieldset>
                    </div>

                  </div>
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

 
    <script>
        $(document).ready(function () {
            // Check if the user is authenticated and on the login page
            if ({{ Auth::check() ? 'true' : 'false' }} && window.location.pathname === '/login') {
                // Redirect to the tables page
                window.location.href = '/tables';
            }
    
            // Disable caching of the login page to prevent going back
            if (window.location.pathname === '/login') {
                window.history.pushState(null, null, window.location.href);
                window.addEventListener('popstate', function () {
                    window.history.pushState(null, null, window.location.href);
                });
            }
        });
    </script>
</body>

</html>