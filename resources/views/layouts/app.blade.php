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
    body {
      margin: 0;
      padding: 0;
      margin-bottom: 15px;
      margin-top: 8px;
    }
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
    <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a id="doctors-link" class="btn btn-dark ml-lg-3 dropdown-toggle" href="/admin/doctors" role="button" aria-haspopup="true" aria-expanded="false">
                Stamps/ mihuri
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="doctors-link">
                <form action="{{ route('document.create') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item" id="document">certification</button>
                </form>
                <a class="dropdown-item" href="{{ route('document.indexOath') }}">viapo/ oath</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a id="news-link" class="btn btn-dark ml-lg-3 dropdown-toggle" href="/admin/blog" role="button" aria-haspopup="true" aria-expanded="false">
                Drafting/uandishi
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="news-link">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Plaint</a>
                <div class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#" id="viapo-link" role="button" aria-haspopup="true" aria-expanded="false">
                    Viapo
                  </a>
                  <div class="dropdown-menu" aria-labelledby="viapo-link">
                    <a class="dropdown-item" href="/document/majina">Viapo vya majina</a>
                    <a class="dropdown-item" href="/document/sehemu">Viapo vya sehemu</a>
                    <a class="dropdown-item" href="/document/kuzaliwa">Viapo vya kuzaliwa</a>
                  </div>
                </div>
                <a class="dropdown-item" href="/consultation">applications</a>
                <a class="dropdown-item" href="/consultation">replays (WSD)</a>
                <a class="dropdown-item" href="/consultation">submissions</a>
                <a class="dropdown-item" href="/consultation">witness statements (WS)</a>
                <a class="dropdown-item" href="/consultation">others</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a id="contact-link" class="btn btn-dark ml-lg-3 dropdown-toggle" href="/products/create" role="button" aria-haspopup="true" aria-expanded="false">
                Ushauri wa kisheria
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="contact-link">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">call center</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
            <li class="nav-item active">
              <a class="btn btn-dark ml-lg-3" href="/">Msaada wa kisheria</a>
            </li>
            <li class="nav-item dropdown">
              <a id="help-link" class="btn btn-dark ml-lg-3 dropdown-toggle" href="/products/create" role="button" aria-haspopup="true" aria-expanded="false">
                Msaada
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="help-link">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">call center</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
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
