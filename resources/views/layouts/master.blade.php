<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="shortcut icon" href="image/NLogoIcon.png">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/css/app.css">

  <style type="text/css">
    .uploadImage {
      width: 0.1px;
      height: 0.1px;
      opacity: 0;
      overflow: hidden;
      position: absolute;
      z-index: -1;
    }

    .uploadImage + label {
      font-size: 1.0em;
      font-weight: 700;
      color: black;
      display: inline-block;
    }

    .uploadImage:focus + label, .uploadImage + label:hover {
      background-color: #c0c0c0;
    }

    .uploadImage + label {
      cursor: pointer; /* "hand" cursor */
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">

  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars fa-lg"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ url('home') }}" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fa fa-search fa-lg"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large fa-lg"></i></a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="shadow-none main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('home') }}" class="brand-link">
          <img src="/image/NeoxLogo.jpg" alt="NeoxLogo" class="shadow-none brand-image img-circle elevation-3"
          style="opacity: .8">
          <span class="brand-text font-weight-light">Neox Indonesia</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ url('/avatar/'.Auth::user()->image) }}" class="shadow-none img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-flat nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder"></i>
              <p>
                INPUT DATA
                <i class="right fa fa-angle-double-left fa-lg"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('Post.create') }}" class="nav-link {{ Request::path() == 'Post/create' ? 'active' : '' }}">
                  <i class="fa fa-pencil fa-md"></i>
                  <p>Create Post</p>
                </a>
              </li>
              <li class="nav-item {{ Request::path() == 'Tag/create' ? 'nav-item active' : '' }}">
                <a href="{{ route('Tag.create') }}" class="nav-link {{ Request::path() == 'Tag/create' ? 'active' : '' }}">
                  <i class="fa fa-pencil fa-md"></i>
                  <p>Create Tag</p>
                </a>
              </li>
              <li class="nav-item {{ Request::path() == 'Kategori/create' ? 'nav-item active' : '' }}">
                <a href="{{ route('Kategori.create') }}" class="nav-link {{ Request::path() == 'Kategori/create' ? 'active' : '' }}">
                  <i class="fa fa-pencil fa-md"></i>
                  <p>Create Kategori</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- Sidebar Menu -->
          <nav class="mt-1">
            <ul class="nav nav-flat nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder"></i>
              <p>
                VIEW DATA
                <i class="right fa fa-angle-double-left fa-lg"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('Post.index') }}" class="nav-link {{ Request::path() == 'Post' ? 'active' : '' }}">
                  <i class="fa fa-eye fa-md"></i>
                  <p>View Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Tag.index') }}" class="nav-link {{ Request::path() == 'Tag' ? 'active' : '' }}">
                  <i class="fa fa-eye fa-md"></i>
                  <p>View Tag</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Kategori.index') }}" class="nav-link {{ Request::path() == 'Kategori' ? 'active' : '' }}">
                  <i class="fa fa-eye fa-md"></i>
                  <p>View Kategori</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>

      <!-- Sidebar Menu -->
          <nav class="mt-1">
            <ul class="nav nav-flat nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder"></i>
              <p>
                VIEW PIVOT DATA
                <i class="right fa fa-angle-double-left fa-lg"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('KategoriPost') }}" class="nav-link {{ Request::path() == 'KategoriPost' ? 'active' : '' }}">
                  <i class="fa fa-database"></i>
                  <p>Kategori Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('TagPost') }}" class="nav-link {{ Request::path() == 'TagPost' ? 'active' : '' }}">
                  <i class="fa fa-database"></i>
                  <p>Tag Post</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('subtitle')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            @yield('subpage')
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            @yield('content')
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </h5>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Firman Aprilian Sugiharto
    </div>
    <!-- Default to the left -->
    <strong>Blog System &copy 2020</strong> All Rights Reserved.
  </footer>
</div>
<!-- ./wrapper -->

  </div>

  <!-- REQUIRED SCRIPTS -->

  <script src="/js/app.js"></script>

</body>
</html>