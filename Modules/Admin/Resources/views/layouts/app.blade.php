<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name')}}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="{{ asset('images/bismillah1_kecil.png') }}" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/admin/font-awesome.min.css')}}">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="{{asset('css/admin/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/admin/skin-green.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.25.6/sweetalert2.min.css">
  <link rel="stylesheet" href="{{asset('css/admin/custom.css')}}">
  @yield('header_styles')
</head>
<body class="skin-green sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="{{route('admin')}}" class="logo">
      <span class="logo-mini"><img src="{{asset('images/bismillah1_kecil.png')}}" style="width:70%"></span>
      <span class="logo-lg"><b>App</b>&nbsp;Masjid Al-Husna</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- <div class="navbar-brand" style="padding-top:13px">
      <p style="margin-top:0px;font-weight:800;">  
        Assalamualaikum  {{Auth::user()->name}}, anda login sebagai : {{Auth::user()->getRoleNames()->first()}}
      </p>
      </div> -->
      <!-- <div class="navbar-custom-menu">
      <h3 style="margin-top:0px;font-weight:800;">  
        
      </h3>
      
      </div> -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- /.messages-menu -->
          <!-- User Account Menu -->
          <li style="background-color:green">
          <a href="{{route('home')}}" target="_blank" rel="noopener"><b>Website Masjid Al-Husna</b></a>
          </li>
          <li>
          &nbsp;&nbsp;&nbsp;&nbsp;
          </li>
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset('/images/picture.jpg')}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{asset('/images/picture.jpg')}}" class="img-circle" alt="User Image">
                <p>
                {{Auth::user()->name}}
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit()"; class="btn btn-default btn-flat">Sign out</a>
                  <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


	@include('admin::layouts.sidebarmenu')

      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

	

    </section>

    <!-- Main content -->
    <section class="content">
      @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
      @endif
      @if (session('warning'))
            <div class="alert alert-warning">
                <strong>{{ session('warning') }}</strong>
            </div>
      @endif  
      @yield('content')
      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright {{date("Y")}}  &copy; Masjid Al-Husna, </strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 & Bootstrap-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/validator/10.4.0/validator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.25.6/sweetalert2.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" ></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js" ></script>
@yield('footer_scripts')
<script type="text/javascript" src="{{asset('js/admin/appLTE.min.js')}}"></script>
</body>
</html>
