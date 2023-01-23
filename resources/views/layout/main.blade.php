
@inject('controller', 'App\Http\Controllers\Controller')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Persuratan Kodiklatal Pusdiklek</title>
    <!-- Favicon -->
    <link rel="icon" href="https://kevin-rifo.web.app/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ URL::asset('/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/css/argon.css?v=1.2.0') }}" type="text/css">
</head>

<body>
    <script src="{{ URL::asset('/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ URL::asset('/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ URL::asset('/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ URL::asset('/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ URL::asset('/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ URL::asset('/js/argon.js?v=1.2.0') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Sidenav -->


    <script src="{{ URL::asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- <script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> -->


    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <!--      <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                  <img src="{{ URL::asset('/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
                </a>
            </div>-->
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Beranda</span>
                            </a>
                        </li>
                    </ul>
                    <h6 class="navbar-heading p-0 text-muted mt-3">
                        <span class="docs-normal">Surat</span>
                    </h6>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="kirim_surat">
                                <i class="ni ni-ruler-pencil text-primary"></i>
                                <span class="nav-link-text">Kirim Surat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="surat_masuk">
                                <i class="ni ni-ruler-pencil text-primary"></i>
                                <span class="nav-link-text">Surat Masuk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="surat_keluar">
                                <i class="ni ni-ruler-pencil text-primary"></i>
                                <span class="nav-link-text">Surat Keluar</span>
                            </a>
                        </li>
                    </ul>
                    <h6 class="navbar-heading p-0 text-muted  mt-3">
                        <span class="docs-normal">Telegram</span>
                    </h6>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="kirim_telegram">
                                <i class="ni ni-ruler-pencil text-primary"></i>
                                <span class="nav-link-text">Kirim Telegram</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="telegram_masuk">
                                <i class="ni ni-ruler-pencil text-primary"></i>
                                <span class="nav-link-text">Telegram Masuk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="telegram_keluar">
                                <i class="ni ni-ruler-pencil text-primary"></i>
                                <span class="nav-link-text">Telegram Keluar</span>
                            </a>
                        </li>
                    </ul>
                    @if(!Auth::guest())
                    <h6 class="navbar-heading p-0 text-muted  mt-3">
                        <span class="docs-normal">Disposisi</span>
                    </h6>
                    @if($controller::getCurrentRoleID()==2)
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="kirim_disposisi">
                                <i class="ni ni-ruler-pencil text-primary"></i>
                                <span class="nav-link-text">Kirim Disposisi</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="disposisi_keluar">
                                <i class="ni ni-ruler-pencil text-primary"></i>
                                <span class="nav-link-text">Disposisi Keluar</span>
                            </a>
                        </li>
                    </ul>
           
                    @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="disposisi_masuk">
                                <i class="ni ni-ruler-pencil text-primary"></i>
                                <span class="nav-link-text">Disposisi Masuk</span>
                            </a>
                        </li>
                    </ul>

                    @endif
                    @endif
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">User</span>
                    </h6>
                    @if(!Auth::guest())
                    @if($controller::getCurrentRoleID()==3)
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="user_management">
                                <i class="ni ni-ruler-pencil text-primary"></i>
                                <span class="nav-link-text">User Management</span>
                            </a>
                        </li>
                    </ul>
                    @endif
                    @endif
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">


                        @if (Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">
                                <i class="ni ni-single-02 text-primary"></i>
                                <span class="nav-link-text">Login</span>
                            </a>
                        </li>
                        @else

 


                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}">
                                <i class="ni ni-user-run text-primary"></i>
                                <span class="nav-link-text">Logout</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
                <div class="copyright text-center  text-lg-left  text-muted">
                    &copy; 2021
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">

                </ul>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->


</body>

</html>