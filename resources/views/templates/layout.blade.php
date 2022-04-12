<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Herbs & Spices</title>
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/hover/hover.min.css') }}" rel="stylesheet">

    <!-- Blog Stylesheet File -->
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Responsive css -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

</head>

<body>

<!-- start section navbar -->
<nav id="main-nav-subpage" class="subpage-nav">
    <div class="row">
        <div class="container">

            <div class="logo">
                <a href="{{ route('home') }}">
                    <h3>Herbs & Species</h3>
                </a>
            </div>

            <div class="responsive"><i data-icon="m" class="ion-navicon-round"></i></div>

            <ul class="nav-menu list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('categories.all') }}">Categories</a></li>
                <li><a href="#">Search</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
            </ul>

        </div>
    </div>
</nav>
<!-- End section navbar -->

@yield('content')

<!-- start section footer -->
<div id="footer" class="text-center">
    <div class="container">
        <div class="socials-media text-center">

{{--            <ul class="list-unstyled">--}}
{{--                <li><a href="#"><i class="ion-social-facebook"></i></a></li>--}}
{{--                <li><a href="#"><i class="ion-social-twitter"></i></a></li>--}}
{{--                <li><a href="#"><i class="ion-social-instagram"></i></a></li>--}}
{{--                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>--}}
{{--                <li><a href="#"><i class="ion-social-tumblr"></i></a></li>--}}
{{--                <li><a href="#"><i class="ion-social-dribbble"></i></a></li>--}}
{{--            </ul>--}}

        </div>

        <p>&copy; Copyrights. All rights reserved.</p>

    </div>
</div>
<!-- End section footer -->

<!-- JavaScript Libraries -->
<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/typed/typed.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/magnific-popup/magnific-popup.min.js') }}"></script>
<script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>

<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>

</body>

</html>
