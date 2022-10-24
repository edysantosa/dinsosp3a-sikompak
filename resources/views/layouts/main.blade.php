<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sikompak</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Main App CSS -->
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>

    <body class="hold-transition sidebar-mini layout-navbar-fixed">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    @include('layouts.top_message')
                    @include('layouts.top_notification')

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <a href="#" class="dropdown-item dropdown-footer">Logout</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">Edit Profil</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="../../index3.html" class="brand-link">
                    <img src="{{ asset('dist/images/sikompak_logo.png') }}" alt="Logo Sikompak" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">SIKOMPAK</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('dist/images/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Natalia Sihombing</a>
                        </div>
                    </div>
                    @include('layouts.menu')
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Blank Page {{ Request::route()->uri()  }}</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Blank Page</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Title</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            Start creating your amazing application!
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Footer
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 0.0.1
                </div>
                <strong>Copyright &copy; 2022 <a href="https://dissosp3a@baliprov.go.id">Dinas Sosial P3A Prov. Bali</a>.</strong>
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- javascript -->    
        <!-- 
            Tolong jangan dibuka-buka bli!
              ____  _                       ____ _____   _      ____                   ____        _ _ 
             |  _ \(_)_ __  ___  ___  ___  |  _ \___ /  / \    |  _ \ _ __ _____   __ | __ )  __ _| (_)
             | | | | | '_ \/ __|/ _ \/ __| | |_) ||_ \ / _ \   | |_) | '__/ _ \ \ / / |  _ \ / _` | | |
             | |_| | | | | \__ \ (_) \__ \ |  __/___) / ___ \  |  __/| | | (_) \ V /  | |_) | (_| | | |
             |____/|_|_| |_|___/\___/|___/ |_|  |____/_/   \_\ |_|   |_|  \___/ \_/   |____/ \__,_|_|_|
         -->    
        <script src="{{ asset('dist/js/app.js') }}"></script>
        @yield('pagescript')
    </body>
</html>
