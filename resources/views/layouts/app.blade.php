<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/app.css">
  <link rel="stylesheet" href="../assets/css/bootstrap-touchspin.css">
  <link rel="stylesheet" href="../assets/css/dark-mode.css">
  <link rel="stylesheet" href="../assets/css/dropzone.css">
  <link rel="stylesheet" href="../assets/css/fancytree.css">
  <link rel="stylesheet" href="../assets/css/flatpickr.css">
  <link rel="stylesheet" href="../assets/css/fontawesome.css">
  <link rel="stylesheet" href="../assets/css/rangeslider.css">
  <link rel="stylesheet" href="../assets/css/jvectormap.css">
  <link rel="stylesheet" href="../assets/css/jvectormapmaterial-icons.css">
  <link rel="stylesheet" href="../assets/css/material-icons.css">
  <link rel="stylesheet" href="../assets/css/nestable.css">
  <link rel="stylesheet" href="../assets/css/preloader.css">
  <link rel="stylesheet" href="../assets/css/quill.css">
  <link rel="stylesheet" href="../assets/css/select2.css">
  <link rel="stylesheet" href="../assets/css/sweetalert.css">
  <link rel="stylesheet" href="../assets/css/toastr.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">

    <style>
        .dropdown-menu-right {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            float: left;
            min-width: 10rem;
            padding: 0.5rem 0;
            margin: 0.125rem 0 0;
            font-size: 1rem;
            color: #212529;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0,0,0,.15);
            border-radius: 0.25rem;
        }

        .dropdown-menu-right.show {
            display: block;
        }

    </style>


</head>
<body>
        <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="https://web.whatsapp.com/"><span class="mai-logo-whatsapp text-primary"></span> +255788339939</a>
              <span class="divider">|</span>
              <a href="https://mail.google.com/mail/?view=cm&fs=1&to=nicombukoti1909@gmail.com&su=SUBJECT&body=BODY&bcc=nicombukoti1909@gmail.com"><span class="mai-mail text-primary"></span> nicombukoti1909@gmail.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

        <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm">
            <div class="container">
                    <a class="nav-link" href="/"><span class="text-primary">WAKILI </span>MTANDAO
                </a>
                <form action="3" method="GET">
                  <div class="input-group input-navbar">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username"
                      aria-describedby="icon-addon1">
                  </div>
                </form>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                  aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupport">
                    <!-- Left Side Of Navbar -->


                    <ul class="navbar-nav  ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item active">
                            <a class="btn btn-dark ml-lg-3" href="/">Msaada wa kisheria</a>
                          </li>
                        <li class="nav-item dropdown">
                            <a id="doctors-link" class="btn btn-dark ml-lg-3 dropdown-toggle" href="/admin/doctors" role="button" aria-haspopup="true" aria-expanded="false">
                                Stamps/ mihuri
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="doctors-link">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    certification
                                </a>
                                <a class="dropdown-item" href="/consultation">viapo/ oath</a> <!-- New Consultation item -->
{{--                                <a class="dropdown-item" href="/consultation">Consultation</a> <!-- New Consultation item -->--}}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <!-- Add more dropdown items here if needed -->
                            </div>
                        </li>

                        <!-- News Dropdown -->
                        <li class="nav-item dropdown">
                            <a id="news-link" class="btn btn-dark ml-lg-3 dropdown-toggle" href="/admin/blog" role="button" aria-haspopup="true" aria-expanded="false">
                                Drafting/uandishi
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="news-link">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Plaint
                                </a>
                                <a class="dropdown-item" href="/consultation">applications</a>
                                <a class="dropdown-item" href="/consultation">replays (WSD)</a>
                                <a class="dropdown-item" href="/consultation">submissions</a>
                                <a class="dropdown-item" href="/consultation">witness statements (WS)</a>
                                <a class="dropdown-item" href="/consultation">others </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <!-- Add more dropdown items here if needed -->
                            </div>
                        </li>

                        <!-- Contact Dropdown -->
                        <li class="nav-item dropdown">
                            <a id="contact-link" class="btn btn-dark ml-lg-3 dropdown-toggle" href="/products/create" role="button" aria-haspopup="true" aria-expanded="false">
                                Msaada
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="contact-link">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    call center
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <!-- Add more dropdown items here if needed -->
                            </div>
                        </li>
                        <li class="nav-item">

                            <a class="btn btn-dark ml-lg-3"  href="/admin/about">About Us</a>
                        </li>

                    @guest
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                    <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
      <script>
          document.addEventListener('DOMContentLoaded', function() {
              var doctorsLink = document.getElementById('doctors-link');
              var doctorsDropdown = document.querySelector('#doctors-link + .dropdown-menu');
              var newsLink = document.getElementById('news-link');
              var newsDropdown = document.querySelector('#news-link + .dropdown-menu');
              var contactLink = document.getElementById('contact-link');
              var contactDropdown = document.querySelector('#contact-link + .dropdown-menu');

              // Function to close all dropdowns except the specified one
              function closeDropdowns(excludeDropdown) {
                  if (doctorsDropdown && doctorsDropdown !== excludeDropdown) doctorsDropdown.classList.remove('show');
                  if (newsDropdown && newsDropdown !== excludeDropdown) newsDropdown.classList.remove('show');
                  if (contactDropdown && contactDropdown !== excludeDropdown) contactDropdown.classList.remove('show');
              }

              if (doctorsLink && doctorsDropdown) {
                  doctorsLink.addEventListener('mouseenter', function() {
                      closeDropdowns(doctorsDropdown);
                      doctorsDropdown.classList.add('show');
                  });

                  doctorsLink.addEventListener('mouseleave', function() {
                      // Delay hiding the dropdown to allow moving the mouse to the dropdown
                      setTimeout(function() {
                          doctorsDropdown.classList.remove('show');
                      }, 5000); // Adjust the delay as needed
                  });

                  doctorsDropdown.addEventListener('mouseenter', function() {
                      doctorsDropdown.classList.add('show');
                  });

                  doctorsDropdown.addEventListener('mouseleave', function() {
                      doctorsDropdown.classList.remove('show');
                  });
              }

              if (newsLink && newsDropdown) {
                  newsLink.addEventListener('mouseenter', function() {
                      closeDropdowns(newsDropdown);
                      newsDropdown.classList.add('show');
                  });

                  newsLink.addEventListener('mouseleave', function() {
                      // Delay hiding the dropdown to allow moving the mouse to the dropdown
                      setTimeout(function() {
                          newsDropdown.classList.remove('show');
                      }, 5000); // Adjust the delay as needed
                  });

                  newsDropdown.addEventListener('mouseenter', function() {
                      newsDropdown.classList.add('show');
                  });

                  newsDropdown.addEventListener('mouseleave', function() {
                      newsDropdown.classList.remove('show');
                  });
              }

              if (contactLink && contactDropdown) {
                  contactLink.addEventListener('mouseenter', function() {
                      closeDropdowns(contactDropdown);
                      contactDropdown.classList.add('show');
                  });

                  contactLink.addEventListener('mouseleave', function() {
                      // Delay hiding the dropdown to allow moving the mouse to the dropdown
                      setTimeout(function() {
                          contactDropdown.classList.remove('show');
                      }, 5000); // Adjust the delay as needed
                  });

                  contactDropdown.addEventListener('mouseenter', function() {
                      contactDropdown.classList.add('show');
                  });

                  contactDropdown.addEventListener('mouseleave', function() {
                      contactDropdown.classList.remove('show');
                  });
              }
          });
      </script>





      <script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
</body>
</html>
