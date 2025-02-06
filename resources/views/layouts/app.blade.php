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
{{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
  <!-- Styles -->
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

  <link rel="stylesheet" href="{{ asset('favicon/mac_favicon.ico') }}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{ asset('favicon/apple-touch-icon.png') }}">
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-touch-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-touch-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-touch-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-touch-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-touch-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-touch-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-touch-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon-180x180.png') }}">

<link rel="stylesheet" href="{{ asset('global/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('global/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('global/plugins/jquery-ui/theme/pepper_grinder/1.14/css/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('icons_fonts/elegant_font/elegant.min.css') }}">
<link rel="stylesheet" href="{{ asset('layouts/layout-left-top-menu/css/color/light/color-default.css') }}" id="site-color">
<link rel="stylesheet" href="{{ asset('global/plugins/switchery/dist/switchery.min.css') }}">
<link rel="stylesheet" href="{{ asset('global/plugins/perfect-scrollbar/css/perfect-scrollbar.min.css') }}">
<link rel="stylesheet" href="{{ asset('global/plugins/font-awesome/css/font-awesome.min.css') }}">


<link rel="stylesheet" href="{{ asset('global/plugins/toastr/build/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('global/plugins/AmaranJS/dist/css/amaran.min.css') }}">
<link rel="stylesheet" href="{{ asset('global/plugins/AmaranJS/dist/css/animate.min.css') }}">

<link rel="stylesheet" href="{{ asset('global/css/components.min.css') }}">
<link rel="stylesheet" href="{{ asset('layouts/layout-left-top-menu/css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('ims/css/custom.css') }}">

  <style>
      .card {
          background: linear-gradient( #0c5460, #6c757d, #403934); /* Adding gradient */
          color: white;
      }
      #casesTable tbody tr:hover {
          background-color: #f1f1f1;
      }

      .table-responsive {
          overflow-x: auto;
      }

      #casesTable {
          width: 100%;
          table-layout: fixed;
      }

      #casesTable th, #casesTable td {
          padding: 10px;
          text-align: left;
      }

      .modal-title {
          color: #007bff; /* Set a color to highlight the title */
          font-weight: bold;
      }
      #casesStatusChart {
          max-width: 100%;
          height: auto;
      }

      @media (max-width: 768px) {
          .card-body {
              padding: 10px; /* Smaller padding on mobile */
          }

          .container-fluid {
              padding: 10px;
          }
      }

      .modal-body p {
          margin: 10px 0;
      }

      .dataTables_wrapper {
          font-size: 14px; /* Adjust font size for better readability */
      }

      .card:hover {
          transform: scale(1.05); /* Slight scaling effect */
      }

      /* Sidebar */
      #sidebar {
          width: 250px;
          position: absolute;
          top: 120px; /* Adjust based on header height */
          left: 0;
          height: calc(100vh); /* Subtract header height */
          background: #343a40; /* Match navbar background */
          color: white;
          padding: 15px;
          transition: all 0.3s;
          z-index: 100; /* Ensure sidebar stays below the header */
      }

      /* Sidebar links */
      #sidebar ul li a {
          color: white;
          text-decoration: none;
          display: block;
          padding: 10px 20px; /* Add padding for easier hover target */
          border-radius: 5px;
          transition: 0.3s; /* Smooth transition */
          width: 100%; /* Ensure it takes full width of the sidebar */
      }

      /* Hover Effect - Full width */
      #sidebar ul li a:hover {
          background: #007bff; /* Navbar hover background */
          color: white; /* Ensure text stays white on hover */
      }

      /* Active Link Styling */
      #sidebar ul li a.active {
          background: #0056b3; /* Darker blue for active link */
      }

      /* Content area */
      #content {
          margin-left: 250px;
          padding: 20px;
          transition: all 0.3s;
      }

      /* Body */
      body {
          margin: 0;
          padding: 0;
          margin-bottom: 15px;
          margin-top: 8px;
          position: relative;
          z-index: 1; /* Ensures content area and header are above the sidebar */
      }


      /* Dropdown Menu */
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

      .dropdown-submenu {
          position: relative;
      }

      .dropdown-submenu .dropdown-menu {
          top: 0;
          left: 100%;
          margin-top: -1px;
      }

      /* PDF Preview Container */
      #pdf-preview-container {
          position: relative;
      }

      #pdf-preview-container canvas {
          width: 100%;
          height: auto;
          border: 1px solid #ddd;
      }

      /* Custom Download Button */
      #customDownloadButton {
          position: absolute;
          top: 10px;
          right: 10px;
          z-index: 1000;
          padding: 8px 12px;
          background-color: #58718b;
          color: #fff;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          font-size: 14px;
          transition: background-color 0.3s ease;
      }

      #customDownloadButton:hover {
          background-color: #0056b3;
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
              <a class="nav-link" href="/"><span class="text-primary">WAKILI </span>MTANDAO</a>
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
        </div>
      </div>
    </div>
      <nav class="navbar navbar-expand-sm navbar-light">
          <div class="container">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupport">
                  <ul class="navbar-nav ml-auto">
                      <!-- Stamps/Mihuri Dropdown -->
                      <li class="nav-item dropdown">
                          <a id="doctors-link" class="btn btn-dark ml-lg-3 dropdown-toggle" href="/admin/doctors" role="button" aria-haspopup="true" aria-expanded="false">
                              Stamps/ Mihuri
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="doctors-link">
                              <form action="{{ route('document.create') }}" method="POST">
                                  @csrf
                                  <button type="submit" class="dropdown-item" id="document">Certification</button>
                              </form>
                              <a class="dropdown-item" href="{{ route('document.indexOath') }}">Viapo/ Oath</a>
                          </div>
                      </li>

                      <!-- Drafting/Uandishi Dropdown -->
                      <li class="nav-item dropdown">
                          <a id="news-link" class="btn btn-dark ml-lg-3 dropdown-toggle" href="/admin/blog" role="button" aria-haspopup="true" aria-expanded="false">
                              Drafting/ Uandishi
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="news-link">
                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Plaint</a>
                              <div class="dropdown-submenu">
                                  <a class="dropdown-item dropdown-toggle" href="#" id="viapo-link" role="button" aria-haspopup="true" aria-expanded="false">Viapo</a>
                                  <div class="dropdown-menu" aria-labelledby="viapo-link">
                                      <a class="dropdown-item" href="/document/majina">Viapo vya Majina</a>
                                      <a class="dropdown-item" href="/document/sehemu">Viapo vya Sehemu</a>
                                      <a class="dropdown-item" href="/document/kuzaliwa">Viapo vya Kuzaliwa</a>
                                  </div>
                              </div>
                              <a class="dropdown-item" href="/consultation">Applications</a>
                              <a class="dropdown-item" href="/consultation">Replays (WSD)</a>
                              <a class="dropdown-item" href="/consultation">Submissions</a>
                              <a class="dropdown-item" href="/consultation">Witness Statements (WS)</a>
                              <a class="dropdown-item" href="/consultation">Others</a>
                          </div>
                      </li>

                      <!-- Ushauri wa Kisheria Dropdown -->
                      <li class="nav-item dropdown">
                          <a id="contact-link" class="btn btn-dark ml-lg-3 dropdown-toggle" href="/products/create" role="button" aria-haspopup="true" aria-expanded="false">
                              Ushauri wa Kisheria
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="contact-link">
                              <div class="dropdown-submenu">
                                  <a class="dropdown-item dropdown-toggle" href="#" id="madai-link" role="button" aria-haspopup="true" aria-expanded="false">Madai</a>
                                  <div class="dropdown-menu" aria-labelledby="madai-link">
                                      <!-- Familia Submenu -->
                                      <div class="dropdown-submenu">
                                          <a class="dropdown-item dropdown-toggle" href="#" id="familia-link" role="button" aria-haspopup="true" aria-expanded="false">Familia</a>
                                          <div class="dropdown-menu" aria-labelledby="familia-link">
                                              <a class="dropdown-item" href="/ushauri/ndoa">Ndoa/ Talaka</a>
                                              <a class="dropdown-item" href="/document/sehemu">Watoto</a>
                                              <a class="dropdown-item" href="/document/kuzaliwa">Mirathi</a>
                                              <a class="dropdown-item" href="/document/kuzaliwa">Others</a>
                                          </div>
                                      </div>
                                      <!-- Biashara Submenu -->
                                      <div class="dropdown-submenu">
                                          <a class="dropdown-item dropdown-toggle" href="#" id="biashara-link" role="button" aria-haspopup="true" aria-expanded="false">Biashara</a>
                                          <div class="dropdown-menu" aria-labelledby="biashara-link">
                                              <a class="dropdown-item" href="/document/majina">Kusajiri Jina</a>
                                              <a class="dropdown-item" href="/document/sehemu">Kusajiri Kampuni</a>
                                              <a class="dropdown-item" href="/document/sehemu">Leseni</a>
                                              <a class="dropdown-item" href="/document/sehemu">Return</a>
                                              <a class="dropdown-item" href="/document/kuzaliwa">Others</a>
                                          </div>
                                      </div>
                                      <div class="dropdown-submenu">
                                          <a class="dropdown-item dropdown-toggle" href="#" id="biashara-link" role="button" aria-haspopup="true" aria-expanded="false">Uwekezaji</a>
                                          <div class="dropdown-menu" aria-labelledby="biashara-link">
                                              <a class="dropdown-item" href="/document/majina">Madini</a>
                                              <a class="dropdown-item" href="/document/sehemu">Utalii</a>
                                              <a class="dropdown-item" href="/document/kuzaliwa">Mafuta/Gesi</a>
                                          </div>
                                      </div>
                                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Ardhi</a>
                                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Ajira</a>
                                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Tort</a>
                                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Insurance</a>
                                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Others</a>
                                  </div>


                                  <a class="dropdown-item dropdown-toggle" href="#" id="madai-link" role="button" aria-haspopup="true" aria-expanded="false">Jinai</a>
                                  <div class="dropdown-menu" aria-labelledby="madai-link">
                                      <!-- Jinai Submenu -->
                                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Penal Code offences</a>
                                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Economic Offences</a>
                                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Money Laundary</a>
                                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Traffic Offences</a>
                                  </div>



                              </div>
{{--                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Jinai</a>--}}
                          </div>
                      </li>

                      <li class="nav-item active">
                          <a class="btn btn-dark ml-lg-3" href="/">Msaada wa Kisheria</a>
                      </li>
                      <li class="nav-item">
                          <a class="btn btn-dark ml-lg-3" href="/admin/about">About Us</a>
                      </li>

                      @guest
                          <li class="nav-item">
                              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                              @if (Route::has('register'))
                                  <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                              @endif
                          </li>
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>
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
  </header>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      function toggleDropdown(dropdown, action) {
        if (action === 'show') {
          dropdown.classList.add('show');
        } else {
          dropdown.classList.remove('show');
        }
      }

      function handleDropdownMouseEvents(link, dropdown) {
        link.addEventListener('mouseenter', function() {
          toggleDropdown(dropdown, 'show');
        });

        link.addEventListener('mouseleave', function() {
          setTimeout(function() {
            if (!dropdown.matches(':hover')) {
              toggleDropdown(dropdown, 'hide');
            }
          }, 300);
        });

        dropdown.addEventListener('mouseenter', function() {
          toggleDropdown(dropdown, 'show');
        });

        dropdown.addEventListener('mouseleave', function() {
          setTimeout(function() {
            if (!dropdown.matches(':hover')) {
              toggleDropdown(dropdown, 'hide');
            }
          }, 300);
        });
      }

      function handleSubmenuMouseEvents(link, submenu) {
        link.addEventListener('mouseenter', function() {
          toggleDropdown(submenu, 'show');
        });

        link.addEventListener('mouseleave', function() {
          setTimeout(function() {
            if (!submenu.matches(':hover')) {
              toggleDropdown(submenu, 'hide');
            }
          }, 300);
        });

        submenu.addEventListener('mouseenter', function() {
          toggleDropdown(submenu, 'show');
        });

        submenu.addEventListener('mouseleave', function() {
          setTimeout(function() {
            if (!submenu.matches(':hover')) {
              toggleDropdown(submenu, 'hide');
            }
          }, 300);
        });
      }

      var dropdownLinks = document.querySelectorAll('.nav-item.dropdown > .dropdown-toggle');
      dropdownLinks.forEach(function(link) {
        var dropdown = link.nextElementSibling;
        if (dropdown) {
          handleDropdownMouseEvents(link, dropdown);

          var submenuLinks = dropdown.querySelectorAll('.dropdown-submenu > .dropdown-toggle');
          submenuLinks.forEach(function(submenuLink) {
            var submenu = submenuLink.nextElementSibling;
            if (submenu) {
              handleSubmenuMouseEvents(submenuLink, submenu);
            }
          });
        }
      });
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
