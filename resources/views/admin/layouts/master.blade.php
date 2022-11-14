<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }} - {{ env('BUSINESS_NAME') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/admin/img/favicon.png" rel="icon">
  <link href="/admin/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/admin/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/admin/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/admin/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/admin/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/admin/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">{{ env('BUSINESS_NAME') }}</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/admin/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('home')) ? '' : 'collapsed' }}" href="{{ route('home') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
            </a>
        </li>
        @php 
          $currentRoute = Route::currentRouteName();
        @endphp

        <li class="nav-item">
        @if($currentRoute == 'program.index' or $currentRoute == 'program.create')
          <a class="nav-link " data-bs-target="#components-program" data-bs-toggle="collapse" href="#" aria-expanded="true">
        @else
          <a class="nav-link collapsed" data-bs-target="#components-program" data-bs-toggle="collapse" href="#" aria-expanded="false">
        @endif
            <i class="bi bi-window"></i><span>Program</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          @if($currentRoute == 'program.index' or $currentRoute == 'program.create')
          <ul id="components-program" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          @else
          <ul id="components-program" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @endif
            <li>
              <a href="{{ route('program.index') }}" class="nav-link {{ $currentRoute == 'program.index' ? '' : 'collapsed' }}">
                <i class="bi bi-circle"></i><span>Lihat Semua</span>
              </a>
            </li>
            <li>
              <a href="{{ route('program.create') }}" class="nav-link {{ $currentRoute == 'program.create' ? '' : 'collapsed' }}">
                <i class="bi bi-circle"></i><span>Tambah</span>
              </a>
            </li>
      
          </ul>
        </li>

        <li class="nav-item">
        @if($currentRoute == 'teacher.index' or $currentRoute == 'teacher.create')
          <a class="nav-link " data-bs-target="#components-teacher" data-bs-toggle="collapse" href="#" aria-expanded="true">
        @else
          <a class="nav-link collapsed" data-bs-target="#components-teacher" data-bs-toggle="collapse" href="#" aria-expanded="false">
        @endif
            <i class="bi bi-person"></i><span>Guru</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          @if($currentRoute == 'teacher.index' or $currentRoute == 'teacher.create')
          <ul id="components-teacher" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          @else
          <ul id="components-teacher" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @endif
            <li>
              <a href="{{ route('teacher.index') }}" class="nav-link {{ $currentRoute == 'teacher.index' ? '' : 'collapsed' }}">
                <i class="bi bi-circle"></i><span>Lihat Semua</span>
              </a>
            </li>
            <li>
              <a href="{{ route('teacher.create') }}" class="nav-link {{ $currentRoute == 'teacher.create' ? '' : 'collapsed' }}">
                <i class="bi bi-circle"></i><span>Tambah</span>
              </a>
            </li>
      
          </ul>
        </li>
        
        <!-- End Dashboard -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    
    @yield('header')

    

    <section class="section dashboard">
      <div class="row">
        @yield('content')
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/admin/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/vendor/chart.js/chart.min.js"></script>
  <script src="/admin/vendor/echarts/echarts.min.js"></script>
  <script src="/admin/vendor/quill/quill.min.js"></script>
  <script src="/admin/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/admin/vendor/tinymce/tinymce.min.js"></script>
  <script src="/admin/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/admin/js/main.js"></script>

</body>

</html>