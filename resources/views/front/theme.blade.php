<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-3.3.6/css/bootstrap.min.css') }}">
    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') }}">
    <!-- Fonts Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/font-awesome-4.6.1/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/font-elegant/elegant.css') }}">
    <!-- OwlCarousel2 Slider Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/owl.carousel.2/assets/owl.carousel.css') }}">


    <!-- Animate Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">

    <!-- Main Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.css') }}">
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>



    <!--[if lt IE 9]>
        <script src="assets/plugins/iesupport/html5shiv.js"></script>
        <script src="assets/plugins/iesupport/respond.js"></script>
        <![endif]-->
</head>

<body id="home">
    <!-- Preloader -->
    {{-- <div id="preloader">

            <div class="small1">
                <div class="small ball smallball1"></div>
                <div class="small ball smallball2"></div>
                <div class="small ball smallball3"></div>
                <div class="small ball smallball4"></div>
            </div>


            <div class="small2">
                <div class="small ball smallball5"></div>
                <div class="small ball smallball6"></div>
                <div class="small ball smallball7"></div>
                <div class="small ball smallball8"></div>
            </div>

            <div class="bigcon">
                <div class="big ball"></div>
            </div>

        </div> --}}
    <!-- /.Preloader -->


    <!-- Main Wrapper -->
    <main class="wrapper">

        <!-- Header -->
        <header class="header-main header-style2">

            <!-- Header Topbar -->
            <div class="top-bar font2-title1 white-clr">
                <div class="theme-container container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <ul class="list-items fs-10">
                                <br>
                                <li><a href="#">sitemap</a></li>
                                <li class="active"><a href="#">Privacy</a></li>
                                <li><a href="#">Pricing</a></li>
                                <br>
                                <br>

                            </ul>
                        </div>


                        <div class="col-md-6 col-sm-7 fs-12 text-right"> <!-- Place the content on the right -->
                            @auth
                                <!-- Contenu à afficher si un utilisateur est connecté -->
                                <span class="theme-clr">Bonjour {{ auth()->user()->name }}</span>
                                <a data-toggle="modal" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <!-- Contenu à afficher si aucun utilisateur n'est connecté -->
                                <a data-toggle="modal" class="sign-in fs-12 theme-clr-bg" href="{{ route('login') }}">LOG
                                    IN</a>
                            @endauth
                        </div>
                    </div>
                </div>



            </div>
            <!-- /.Header Topbar -->

            <!-- Header Logo & Navigation -->
            <nav class="menu-bar font2-title1 white-clr">
                <div class="theme-container container">
                    <div class="row">
                        <div class="col-md-2 col-sm-2">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-logo" href="#"> <img src="{{ asset('assets/img/logo/logo-2.png') }}"
                                    alt="logo" /> </a>
                        </div>
                        <div class="col-md-10 col-sm-10 fs-12">
                            <div id="navbar" class="collapse navbar-collapse no-pad">
                                <ul class="navbar-nav theme-menu">
                                    <li> <a href="{{ route('home') }}">Home</a> </li>



                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-haspopup="true">Reclamation</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('reclamations.create') }}">Ajouter une
                                                    réclamation</a></li>
                                            @auth
                                                <li><a href="{{ route('mes-reclamations') }}">Consulter mes
                                                        réclamations</a></li>
                                            @endauth
                                        </ul>
                                    </li>
                                    <li> <a href="{{ route('events.index') }}">events</a> </li>
                                    <li> <a href="{{ route('produits.index') }}">produits</a> </li>
                                    <li> <a href="{{ route('driver.list') }}">Drivers</a> </li>
                                    <li> <a href="{{ route('agence.list') }}">Agences</a> </li>
                                    <li> <a href="{{ route('cars.listCars') }}">Cars</a> </li>
                                    <li> <a href="/chatify">Chat</a> </li>
                                    <li><span class="search fa fa-search theme-clr transition"> </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- /.Header Logo & Navigation -->

        </header>
        <!-- /.Header -->

        <!-- Content Wrapper -->
        <article>
            <!-- Banner -->
            <section class="banner banner-style2 mask-overlay pt-120 white-clr">
                <div class="pad-50 hidden-xs"></div>
                <div class="container theme-container rel-div">
                    <img class="pt-10 effect animated fadeInLeft" alt=""
                        src="{{ asset('assets/img/icons/icon-1.png') }}" />
                    <ul class="list-items fw-600 effect animated wow fadeInUp" data-wow-offset="50"
                        data-wow-delay=".20s">
                        <li><a href="#">fast</a></li>
                        <li><a href="#">secured</a></li>
                        <li><a href="#">worldwide</a></li>
                    </ul>
                    <h2 class="section-title fs-48 effect animated wow fadeInUp" data-wow-offset="50"
                        data-wow-delay=".20s"> awesome template for <br> <span class="theme-clr"> courier </span> &
                        <span class="theme-clr"> delivery </span> services </h2>
                    <div class="pad-30"></div>
                    <div class="col-md-8 col-md-offset-2 tracking-form text-left effect animated fadeInUp">
                        <h2 class="title-1"> track your product </h2> <span class="font2-light fs-12">Now you can
                            track your product easily</span>
                        <div class="row">
                            <form class="">
                                <div class="col-md-7 col-sm-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control box-shadow" required=""
                                            placeholder="Enter your product ID">
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div class="form-group">
                                        <button class="btn-1">track your product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="pad-10"></div>
                    </div>
                </div>
            </section>
            <!-- /.Banner -->

            <!-- Feature-2 -->
            @yield('content')
            <!-- /.Contact us -->
        </article>
        <!-- /.Content Wrapper -->

        <!-- Footer -->
        <footer>
            <div class="footer-main pad-120 white-clr">
                <div class="theme-container container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 footer-widget">
                            <a href="#"> <img class="logo" alt="#"
                                    src="{{ asset('assets/img/logo/logo-white.png') }}" /> </a>
                        </div>
                        <div class="col-md-3 col-sm-6 footer-widget">
                            <h2 class="title-1 fw-900">quick links</h2>
                            <ul>
                                <li> <a href="#">sitemap</a> </li>
                                <li> <a href="#">pricing</a> </li>
                                <li> <a href="#">payment method</a> </li>
                                <li> <a href="#">support</a> </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 footer-widget">
                            <h2 class="title-1 fw-900">important links</h2>
                            <ul>
                                <li> <a href="#">themeforest</a> </li>
                                <li> <a href="#">envato</a> </li>
                                <li> <a href="#">audiojungle</a> </li>
                                <li> <a href="#">videohibe</a> </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 footer-widget">
                            <h2 class="title-1 fw-900">get in touch</h2>
                            <ul class="social-icons list-inline">
                                <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".20s"> <a href="#"
                                        class="fa fa-facebook"></a> </li>
                                <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".25s"> <a href="#"
                                        class="fa fa-twitter"></a> </li>
                                <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".30s"> <a href="#"
                                        class="fa fa-google-plus"></a> </li>
                                <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".35s"> <a href="#"
                                        class="fa fa-linkedin"></a> </li>
                            </ul>
                            <ul class="payment-icons list-inline">
                                <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".20s"> <a
                                        href="#"> <img alt="#"
                                            src="{{ asset('assets/img/icons/payment-1.png') }}" /> </a> </li>
                                <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".25s"> <a
                                        href="#"> <img alt="#"
                                            src="{{ asset('assets/img/icons/payment-2.png') }}" /> </a> </li>
                                <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".30s"> <a
                                        href="#"> <img alt="#"
                                            src="{{ asset('assets/img/icons/payment-3.png') }}" /> </a> </li>
                                <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".35s"> <a
                                        href="#"> <img alt="#"
                                            src="{{ asset('assets/img/icons/payment-4.png') }}" /> </a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="theme-container container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <p> © Copyright 2016, All rights reserved </p>
                        </div>
                        <div class="col-md-6 col-sm-6 text-right">
                            <p> Design and <span class="theme-clr fa fa-heart"></span> by <a href="#"
                                    class="main-clr"> AmineBensaid </a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.Footer -->


    </main>
    <!-- / Main Wrapper -->

    <!-- Top -->
    <div class="to-top theme-clr-bg transition"> <i class="fa fa-angle-up"></i> </div>

    <!-- Popup: Login -->
    <div class="modal fade login-popup" id="login-popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <a class="close close-btn" data-dismiss="modal" aria-label="Close"> x </a>

            <div class="modal-content">
                <div class="login-wrap text-center">
                    <h2 class="title-3"> sign in </h2>
                    <p> Sign in to <strong> GO </strong> for getting all details </p>

                    <div class="login-form clrbg-before">
                        <form class="login">
                            <div class="form-group"><input type="text" placeholder="Email address"
                                    class="form-control"></div>
                            <div class="form-group"><input type="password" placeholder="Password"
                                    class="form-control"></div>
                            <div class="form-group">
                                <button class="btn-1 " type="submit"> Sign in now </button>
                            </div>
                        </form>
                        <a href="#" class="gray-clr"> Forgot Passoword? </a>
                    </div>
                </div>
                <div class="create-accnt">
                    <a href="#" class="white-clr"> Don’t have an account? </a>
                    <h2 class="title-2"> <a href="#" class="green-clr under-line">Create a free account</a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Popup: Login -->

    <!-- Search Popup -->
    <div class="search-popup">
        <div>
            <div class="popup-box-inner">
                <form>
                    <input class="search-query" type="text" placeholder="Search and hit enter" />
                </form>
            </div>
        </div>
        <a href="javascript:void(0)" class="close-search"><i class="fa fa-close"></i></a>
    </div>
    <!-- / Search Popup -->

    <!-- Main Jquery JS -->
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/plugins/bootstrap-3.3.6/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap Select JS -->
    <script src="{{ asset('assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') }}"
        type="text/javascript"></script>
    <!-- OwlCarousel2 Slider JS -->
    <script src="{{ asset('assets/plugins/owl.carousel.2/owl.carousel.min.js') }}" type="text/javascript"></script>
    <!-- Sticky Header -->
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('assets/plugins/WOW-master/dist/wow.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('http://code.jquery.com/jquery-3.4.0.min.js') }}"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>


    <!-- Slider JS -->


    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.js') }}" type="text/javascript"></script>

</body>

</html>
