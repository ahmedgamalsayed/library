<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Library | @yield('title', 'Home Page')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('new/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('new/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('new/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('new/vendor/line-awesome/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('new/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('new/css/style.css') }}" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
<header id="header"
        class="fixed-top d-flex align-items-center {{ request()->routeIs('home') ? 'header-transparent' : '' }} ">
    <div class="container d-flex justify-content-between">

        <nav class="nav-menu">
            <ul>
                @if (auth('users')->check())
                    <li class="">
                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                            {{ auth('users')->user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="text-dark" href="{{ route('profile') }}">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="text-dark" onclick="submit_form()" href="#">Logout</a>
                        </div>
                    </li>
                    <form id="logout_form" class="d-none" method="post" action="{{ route('logout') }}">
                        @csrf
                    </form>
                    <script>
                        function submit_form() {
                            document.getElementById('logout_form').submit();
                        }
                    </script>
                @else
                    <li class=""><a href="{{ route('login') }}">Login</a></li>
                    <li class=""><a href="{{ route('register') }}">Register</a></li>
                @endauth

            </ul>
        </nav>

        <div class="logo">
            <h1 class="text-light"><a href="{{ route('home') }}">Library</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="{{ asset('new/img/logo.png') }}" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block float-right">
            <ul>
                <li>
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <div class="input-group" style="border: none">
                            <div class="form-outline">
                                <input type="search" name="search" id="form1" class="form-control" style="background: rgba(255,255,255,0.8)"/>
                            </div>
                            <button type="submit" class="btn btn-success pl-2 pr-2">
                                Search
                            </button>
                        </div>
                    </form>
                </li>
                <li class="drop-down"><a href="#">Categories</a>
                    <ul>
                        @foreach(App\Models\Library::get() as $library)
                            <li><a href="{{ route('libraries.show', ['id' => $library->id]) }}">{{ $library->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

@if (request()->routeIs('home'))
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center"
             style='background-image: url("{{ asset('images/slider2.jpg') }}"); background-size: cover'>
        <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

            <!-- Slide 1 -->
            <div class="carousel-item active">`
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Library</span></h2>
                    <p class="animate__animated fanimate__adeInUp">Borrow and Buy Books</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Start Now</h2>
                    <p class="animate__animated animate__fadeInUp">Start now using the website.</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path"
                      d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)"></use>
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)"></use>
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff"></use>
            </g>
        </svg>

    </section><!-- End Hero -->
@endif

<main id="main" style="margin-top: 40px">
    @yield('content')
</main>

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <h3>Library</h3>
        <div class="social-links">
            <a href="https://twitter.com/Library1111" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="https://www.instagram.com/Library.1111/" class="instagram" target="_blank"><i
                    class="bx bxl-instagram"></i></a>
{{--            <a href="mailto:Library.1111@gmail.com" class="google-plus" target="_blank"><i class="bx bxl-mail-send"></i></a>--}}
        </div>
        <div class="copyright">
            &copy; Copyright. All Rights Reserved
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('new/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('new/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('new/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('new/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('new/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('new/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('new/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('new/vendor/aos/aos.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('new/js/main.js') }}"></script>

</body>

</html>
