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

<body >
    <div class="login-page vh-100">
        <video loop autoplay muted id="vid">
        <source src="{{asset('front.assest/img/bg.mp4')}}" type="video/mp4">
        <source src="{{asset('front.assest/img/bg.mp4')}}" type="video/ogg">
        Your browser does not support the video tag.
        </video>
        <div class="d-flex align-items-center justify-content-center vh-100">

        <div class="px-5 col-md-6 ml-auto">
            @if (session()->has('error'))
            <div class="alert alert-danger alert-outline" role="alert">
              {{session('error')}}
             </div>
              @endif
              @if (session()->has('message'))
              <div class="alert alert-success alert-outline" role="alert">
                {{session('message')}}
               </div>
                @endif
        <div class="px-5 col-10 mx-auto">
        <h2 class="text-dark my-0">Welcome</h2>
        <p class="text-50">Sign in to have a wonderfull meals and desserts</p>
        <form class="mt-5 mb-4" action="{{route('user_auth')}}" method="post">
            @csrf
        <div class="form-group">
        <label  class="text-dark">Email</label>
        <input type="email" name="email" placeholder="Enter Email" class="form-control" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
        <label  class="text-dark">Password</label>
        <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
        </div>
        <input type="submit" class="btn btn-primary btn-lg btn-block" value="SIGN IN"/>

        </form>

        <div class="d-flex align-items-center justify-content-center">
        <a href="signup">
        <p class="text-center m-0">Don't have an account? Sign up</p>
        </a>
        </div>

        </div>
        </div>
        </div>
        </div>
  <script type="text/javascript" src="{{asset('front.assest/vendor/jquery/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('front.assest/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script type="text/javascript" src="{{asset('front.assest/vendor/slick/slick.min.js')}}"></script>

  <script type="text/javascript" src="{{asset('front.assest/vendor/sidebar/hc-offcanvas-nav.js')}}"></script>

  <script type="text/javascript" src="{{asset('front.assest/js/osahan.js')}}"></script>
</body>
</html>
