<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Meta forms -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Backoffice - Panell administrador</title>

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{!! asset('plugins/fontawesome-free/css/all.min.css') !!}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!! asset('dist/css/adminlte.min.css') !!}">

  <!-- CSS pages -->
  @yield('css')

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            @if ($totalContacts > 0)
              <span class="badge badge-warning navbar-badge">1</span>
            @endif
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              @if ($totalContacts > 0)
                <i class="fas fa-envelope mr-2"></i> 1 nou/s contacte/s
                <span class="float-right text-muted text-sm">Ara</span>
              @else
                <i class="fas fa-envelope mr-2"></i> No hi ha cap contacte
              @endif
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
              class="fas fa-th-large"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('/home') }}" class="brand-link">
        <span class="brand-text font-weight-light">Panell Administrador</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Nom usuari logejat</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Home -->
            <li class="nav-item has-treeview" id="home-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p> Portada <i class="right fas fa-angle-left"></i> </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/home') }}" class="nav-link" id="home">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/general-info') }}" class="nav-link" id="general-info">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Informació genèrica</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/services') }}" class="nav-link" id="services">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Serveis</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/success-cases') }}" class="nav-link" id="success-case">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Casos d'èxit</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- ./Home -->
            <!-- About -->
            <li class="nav-item has-treeview" id="about-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p> Sobre nosaltres <i class="right fas fa-angle-left"></i> </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/company') }}" class="nav-link" id="company">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Nostra empresa</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/team') }}" class="nav-link" id="team">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Equip professional</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/clients') }}" class="nav-link" id="clients">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Clients</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- ./About -->
            <!-- Blog -->
            <li class="nav-item">
              <a href="{{ url('/blog') }}" class="nav-link" id="blog">
                <i class="nav-icon fas fa-blog"></i>
                <p>Blog</p>
              </a>
            </li>
            <!-- ./Blog -->
            <!-- Contact -->
            <li class="nav-item">
              <a href="{{ url('/contact') }}" class="nav-link" id="contact">
                <i class="nav-icon fas fa-mail-bulk"></i>
                <p>Contacte 
                  @if ($totalContacts > 0)
                    <span class="right badge badge-danger">Nous</span>
                  @endif
                </p>
              </a>
            </li>
            <!-- Contact -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.Page content -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Backoffice jhernandezch
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{!! asset('plugins/jquery/jquery.min.js') !!}"></script>
  <!-- Bootstrap 4 -->
  <script src="{!! asset('plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
  <!-- AdminLTE App -->
  <script src="{!! asset('dist/js/adminlte.min.js') !!}"></script>

  @yield('script')
</body>
</html>
