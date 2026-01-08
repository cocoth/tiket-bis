<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin - BusTraveller</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Admin Panel" name="description" />

    <script type="module" src="{{ asset('urbix/urbix/assets/js/layout-setup.js') }}"></script>

    <link rel="shortcut icon" href="{{ asset('urbix/urbix/assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('urbix/urbix/assets/libs/simplebar/simplebar.min.css') }}">
    <link href="{{ asset('urbix/urbix/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('urbix/urbix/assets/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('urbix/urbix/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="{{ asset('urbix/urbix/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('urbix/urbix/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="layout-wrapper">
        <!-- Header (disederhanakan dari Urbix) -->
        <header class="app-header" id="appHeader">
            <div class="container-fluid w-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-flex align-items-center gap-2">
                        <a href="{{ route('admin.dashboard') }}" class="align-items-end logo-main d-none d-md-flex me-3 text-decoration-none">
                            <img height="35" width="34" class="logo-dark" alt="Logo" src="{{ asset('urbix/urbix/assets/images/logo-md.png') }}">
                            <h3 class="text-body-emphasis fw-bolder mb-0 ms-1">BusTraveller Admin</h3>
                        </a>
                    </div>
                    <div class="shrink-0 d-flex align-items-center gap-2">
                        <span class="badge bg-primary-subtle text-primary">Admin</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Sidebar utama mengikuti struktur Urbix -->
        <aside class="pe-app-sidebar" id="sidebar">
            <div class="pe-app-sidebar-logo px-6 d-flex align-items-center position-relative">
                <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-end logo-main text-decoration-none">
                    <img height="35" width="34" class="logo-dark" alt="Dark Logo" src="{{ asset('urbix/urbix/assets/images/logo-md.png') }}">
                    <img height="35" width="34" class="logo-light" alt="Light Logo" src="{{ asset('urbix/urbix/assets/images/logo-md-light.png') }}">
                    <h3 class="text-body-emphasis fw-bolder mb-0 ms-1">BusTraveller</h3>
                </a>
            </div>
            <nav class="pe-app-sidebar-menu nav nav-pills" data-simplebar id="sidebar-simplebar">
                <div class="d-flex align-items-start flex-column w-100">
                    <ul class="pe-main-menu list-unstyled">
                        <li class="pe-menu-title">Main</li>
                        <li class="pe-slide">
                            <a href="{{ route('admin.dashboard') }}" class="pe-nav-link">
                                <i class="ri-dashboard-line pe-nav-icon"></i>
                                <span class="pe-nav-content">Dashboard</span>
                            </a>
                        </li>

                        <li class="pe-menu-title">Manajemen</li>
                        <li class="pe-slide">
                            <a href="{{ route('admin.rutes.index') }}" class="pe-nav-link">
                                <i class="ri-bus-line pe-nav-icon"></i>
                                <span class="pe-nav-content">Rute</span>
                            </a>
                        </li>
                        <li class="pe-slide">
                            <a href="{{ route('admin.pemesanans.index') }}" class="pe-nav-link">
                                <i class="ri-ticket-2-line pe-nav-icon"></i>
                                <span class="pe-nav-content">Pemesanan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>

        <!-- Konten utama mengikuti struktur app-wrapper Urbix -->
        <main class="app-wrapper">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>

            <footer class="footer mt-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center gap-2">
                            <p class="mb-0 text-muted">
                                <script>document.write(new Date().getFullYear())</script> &copy; BusTraveller Admin.
                        </p>
                        <div class="text-sm-end d-none d-sm-block">
                            <span class="text-muted">Template by Urbix</span>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </div>

    <script src="{{ asset('urbix/urbix/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('urbix/urbix/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('urbix/urbix/assets/js/app.js') }}"></script>
</body>
</html>
