<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Admin Dashboard</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{asset('admin.assest/vendors/iconic-fonts/font-awesome/css/all.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('admin.assest/vendors/iconic-fonts/flat-icons/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('admin.assest/vendors/iconic-fonts/cryptocoins/cryptocoins.css')}}">
  <link rel="stylesheet" href="{{asset('admin.assest/vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css')}}">

  <link href="{{asset('admin.assest/assets/css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{asset('admin.assest/assets/css/jquery-ui.min.css')}}" rel="stylesheet">

  <link href="{{asset('admin.assest/assets/css/slick.css')}}" rel="stylesheet">
  <link href="{{asset('admin.assest/assets/css/datatables.min.css')}}" rel="stylesheet">

  <link href="{{asset('admin.assest/assets/css/style.css')}}" rel="stylesheet">

  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('admin.assest/favicon.ico')}}">
</head>

<body class="ms-body ms-primary-theme ms-logged-out">

  <main class="body-content">
    <div class="ms-content-wrapper ms-auth">
      <div class="ms-auth-container">
        <div class="ms-auth-col">
          <div class="ms-auth-form">
            <form action="{{route('auth')}}" method="post">
                @csrf
              <h3>Login to Dashboard</h3>
              <p>Please enter your user and password to continue</p>
              <div class="mb-3">
                <label>Admin Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="User Name" name="name" required="">
                  <div class="invalid-feedback">Please provide a valid email.</div>
                </div>
              </div>
              <div class="mb-2">
                <label>Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" placeholder="Password" name="password" required="">
                  <div class="invalid-feedback">Please provide a password.</div>
                </div>
              </div>
              <button class="btn btn-primary mt-4 d-block w-100" type="submit">Sign In</button>
              <p class="mb-0 mt-3 text-center"><a class="btn-link" href="default-register.html">Click here To Go Back</a>
              </p>
              @if (session()->has('error'))
              <div class="alert alert-danger alert-outline" role="alert">
                {{session('error')}}
               </div>
                @endif
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
 <script src="{{asset('admin.assest/assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('admin.assest/assets/js/popper.min.js')}}"></script>
  <script src="{{asset('admin.assest/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin.assest/assets/js/perfect-scrollbar.js')}}">
  </script>
  <script src="{{asset('admin.assest/assets/js/jquery-ui.min.js')}}">
  </script>
  <script src="{{asset('admin.assest/assets/js/framework.js')}}"></script>
  <script src="{{asset('admin.assest/assets/js/settings.js')}}"></script>
  @include('sweetalert::alert')
</body>
</html>
