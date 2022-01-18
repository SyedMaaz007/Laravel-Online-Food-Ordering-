

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>@yield('page_title')</title>

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

<body class="ms-body ms-primary-theme ms-has-quickbar ms-aside-left-open">
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>

  <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>

  <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">

    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="{{url('res_admin/dashboard')}}">
        <img src="{{asset('admin.assest/assets/img/costic/costic-logo-216x62.png')}}" alt="logo">
      </a>
    </div>
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">

      <li class="menu-item">
        <a href="{{url('res_admin/dashboard')}}"> <span><i class="fa fa-briefcase fs-16"></i>Dashboard </span>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{url('res_admin/menus')}}"> <span> <i class="fas fa-indent"></i>Menu Deatils</span>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{url('res_admin/restaurant/'.$res_id)}}"> <span><i class="fas fa-clipboard-list fs-16"></i>Restaurants Deatils</span>
        </a>
      </li>

      <hr>
      <div class="col-md-12 text-left mb-5">
        <h4 class="section-title bold">Customize</h4>
      <div>
        <div class="col-md-12 text-left mb-5">
            <h2 class="section-title bold">Dark Mode</h2>
        <label class="ms-switch">
            <input type="checkbox" id="dark-mode">
            <span class="ms-switch-slider round"></span>
          </label>
        </div>


    </ul>
  </aside>

  <main class="body-content">

    <nav class="navbar ms-navbar">
      <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft"> <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>
      <div class="logo-sn logo-sm ms-d-block-sm">
        <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="dashboard"><img src="{{asset('assets/img/costic/costic-logo-84x41.png')}}" alt="logo"> </a>
      </div>
      <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
        <li class="ms-nav-item ms-nav-user dropdown">
            <a class="media fs-14 p-2" href="{{url('res_admin/logout')}}"> <span><i class="flaticon-shut-down mr-2"></i> Logout</span>
          </a>

        </li>
      </ul>
    </nav>
    <div class="ms-content-wrapper">
        @section('container')
        @show
    </div>
  </main>

  <script src="{{asset('admin.assest/assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('admin.assest/assets/js/popper.min.js')}}"></script>
  <script src="{{asset('admin.assest/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin.assest/assets/js/perfect-scrollbar.js')}}">
  </script>
  <script src="{{asset('admin.assest/assets/js/jquery-ui.min.js')}}">
  </script>

  <script src="{{asset('admin.assest/assets/js/datatables.min.js')}}">
  </script>
  <script src="{{asset('admin.assest/assets/js/data-tables.js')}}">
  </script>
  <script src="{{asset('admin.assest/assets/js/framework.js')}}"></script>

  <script src="{{asset('admin.assest/assets/js/settings.js')}}"></script>
  @include('sweetalert::alert')
  <script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
                responsive: true
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#dataTable_2').DataTable({
                responsive: true,
                pageLength: 5
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#dataTable_3').DataTable({
                responsive: true,
                pageLength: 5
        });
    });
</script>
</body>

</html>
