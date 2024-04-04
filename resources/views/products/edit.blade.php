
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

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>
        <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +255754240753</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> admin@admin.com</a>
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

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                    <a href="#"><span class="text-primary">{{ config('app.name', 'Laravel') }}</span>-SYSTEM
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


                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/admin/about">About Us</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/admin/doctors">Doctors</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/admin/blog">News</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/admin/blog_details">blog</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/admin/contact">Contact</a>
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
<body>
    <div class="row mb-3 col-sm-6 py-2 wow fadeInLeft" >
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>you may edit the product details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="contact-form mt-5" action="{{ route('products.update',$product->id) }}" method="POST">
    	@csrf
        @method('PUT')
        <div class="row mb-3">
		    <div class="col-sm-6 py-2 wow fadeInLeft">
		        <div class="form-group">
		            <strong>Name</strong>
		            <input type="text" name="fullName" value="{{ $product->fullName }}" class="form-control" placeholder="Name">
		        </div>
		    </div>
            <div class="col-sm-6 py-2 wow fadeInRight">
		        <div class="form-group">
		            <strong>Email</strong>
		            <input type="email" name="emailAddress" value="{{ $product->emailAddress }}"class="form-control" placeholder="email">
		        </div>
		    </div>
            <div class="col-12 py-2 wow fadeInUp">
		        <div class="form-group">
		            <strong>subject:</strong>
		            <input type="text" name="subject" value="{{ $product->subject }}"class="form-control" placeholder="subject">
		        </div>
		    </div>
		    <div class="col-12 py-2 wow fadeInUp">
		        <div class="form-group">
		            <strong>message:</strong>
		            <textarea class="form-control" style="height:150px" name="message" value="{{ $product->message }}" placeholder="message"></textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary wow zoomIn">Submit</button>
		    </div>
		</div>

 <script src="../assets/js/jquery-3.5.1.min.js"></script>

 <script src="../assets/js/bootstrap.bundle.min.js"></script>

 <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

 <script src="../assets/vendor/wow/wow.min.js"></script>

 <script src="../assets/js/theme.js"></script>

</body>
 </html>

