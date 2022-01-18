<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="{{asset('front.assest/img/fav.png')}}"/>
        <title>Online Food Ordering Website</title>

        <link rel="stylesheet" type="text/css" href="{{asset('front.assest/vendor/slick/slick.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('front.assest/vendor/slick/slick-theme.min.css')}}" />

        <link href="{{asset('front.assest/vendor/icons/feather.css')}}" rel="stylesheet" type="text/css">

        <link href="{{asset('front.assest/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <link href="{{asset('front.assest/css/style.css')}}" rel="stylesheet">

        <link href="{{asset('front.assest/vendor/sidebar/demo.css')}}" rel="stylesheet">
    </head>
    <body class="fixed-bottom-bar">
        <header class="section-header">
            <section class="header-main shadow-sm bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-1">
                        <a href="{{url('front')}}" class="brand-wrap mb-0">
                        <img alt="#" class="img-fluid" src="{{asset('front.assest/img/logo_web.png')}}">
                        </a>

                    </div>
                    <div class="col-3 d-flex">
                        <h5>E Restaurant</h5>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center justify-content-end pr-5">

                            <div class="dropdown mr-4 m-none">
                                <a href="#" class="dropdown-toggle text-dark py-3 d-block" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if ($user_img==NULL)

                                    @else
                                    <img alt="#"  src="{{asset('storage/media/Customers/'.$user_img)}}" class="img-fluid rounded-circle header-user mr-2 header-user">
                                    @endif Hi {{$user_name}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{url('front/profile/'.$user_id)}}">My account</a>
                                    <a class="dropdown-item" href="{{url('front/logout')}}">Logout</a>
                                </div>
                            </div>

                            <a href="{{url('front/checkout')}}" class="widget-header mr-4 text-dark">
                            <div class="icon d-flex align-items-center">
                                <i class="feather-shopping-cart h6 mr-2 mb-0"></i> <span>Cart</span>
                            </div>
                            </a>
                            <a class="toggle" href="#">
                                <span></span>
                            </a>
                        </div>

                    </div>

                </div>

            </div>
            </section>
        </header>


        @section('container')
        @show


        <footer class="section-footer border-top bg-dark">
            <div class="container">
                <section class="footer-top padding-y py-5">
                    <div class="row pt-3">
                        <aside class="col-md-4 footer-about">
                            <article class="d-flex pb-3">
                            <div>
                                <img alt="#" src="{{asset('front.assest/img/logo_web.png')}}" class="logo-footer mr-3"></div>
                                <div>
                                    <h6 class="title text-white">About Us</h6>
                                    <p class="text-muted">Some short text about company like You might remember the Dell computer commercials in which a youth reports.</p>
                                    <div class="d-flex align-items-center">
                                        <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Facebook" target="_blank" href="#"><i class="feather-facebook"></i></a>
                                        <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Instagram" target="_blank" href="#"><i class="feather-instagram"></i></a>
                                        <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Youtube" target="_blank" href="#"><i class="feather-youtube"></i></a>
                                        <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Twitter" target="_blank" href="#"><i class="feather-twitter"></i></a>
                                    </div>
                                </div>
                            </article>
                        </aside>
                    </div>

                </section>
            </div>

            <section class="footer-copyright border-top py-3 bg-light">
                <div class="container d-flex align-items-center">
                    <p class="mb-0"> © 2020 Company All rights reserved </p>
                    <p class="text-muted mb-0 ml-auto d-flex align-items-center"></p>
                </div>
            </section>
        </footer>
        <nav id="main-nav">
            <ul class="second-nav">
                <li><a href="{{url('front')}}"><i class="feather-home mr-2"></i> Homepage</a></li>
                <li><a href="{{url('front/my_order')}}"><i class="feather-list mr-2"></i> My Orders</a></li>

                <li><a href="{{url('front/checkout')}}"><i class="feather-list mr-2"></i> Checkout</a></li>


                <li><a href="{{url('front/profile/'.$user_id)}}"><i class="feather-user h6 mr-2 mb-0"></i>Profile</a></li>

                <li><a href="{{url('front/logout')}}">Logout</a></li>

            </ul>
        </nav>
        <script type="text/javascript" src="{{asset('front.assest/vendor/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front.assest/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <script type="text/javascript" src="{{asset('front.assest/vendor/slick/slick.min.js')}}"></script>

        <script type="text/javascript" src="{{asset('front.assest/vendor/sidebar/hc-offcanvas-nav.js')}}"></script>

        <script type="text/javascript" src="{{asset('front.assest/js/osahan.js')}}"></script>
    </body>
</html>
