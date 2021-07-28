<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from www.bootstrapdash.com/demo/purple/jquery/template/demo_1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Jul 2021 00:27:36 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administration</title>
    <!-- plugins:css -->
{{--    mdi icons--}}
{{--    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">--}}

{{--    template--}}
    <link rel="stylesheet" href="{{asset('purple_template/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('purple_template/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('purple_template/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('purple_template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('purple_template/css/demo_1/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="data:image/png;base64,{{$infos_generales['logo']}}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            padding: 5px;
        }
        a:hover{
            text-decoration: none;
        }

         input,textarea,select{
             border-color: #222 !important;
         }
    </style>
    @yield('style_complementaire')
</head>

<body>

    <div class="container-scroller">

{{--=================================NAV BAR============================================--}}
{{--=================================NAV BAR============================================--}}
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="padding-top: 20px">
                <a class="navbar-brand brand-logo" href="{{route('dashboard')}}">
{{--                    <img src="{{asset('images_statique/logo.jpeg')}}" alt="logo" />--}}
                    <img src="data:image/jpeg;base64,{{$infos_generales['logo']}}" alt="logo" style="width: 90px;height: 90px" />
                </a>
                <a class="navbar-brand brand-logo-mini"  href="{{route('dashboard')}}" style="width: 90px;height: 90px">
                    <img src="data:image/jpeg;base64,{{$infos_generales['logo']}}" alt="logo" />
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">

                <ul class="navbar-nav navbar-nav-right">
{{--                    PROFIL--}}
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('profile.show') }}"> Profil  </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item"> Deconnexion </button>
                            </form>
                        </div>
                    </li>

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
{{--=================================SIDE BAR============================================--}}
{{--=================================SIDE BAR============================================--}}
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <span class="menu-title"> <br/><br/> Tableau de bord</span>
{{--                        <i class="mdi mdi-home menu-icon"></i>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('gestion_menus')}}">
                        <span class="menu-title">Gestion des Menus</span>
{{--                        <i class="mdi mdi-home menu-icon"></i>--}}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
                        <span class="menu-title">Pages <b style="font-size: 15px">&blacktriangledown;</b></span>
{{--                        <i class="fa fa-car"></i>--}}
{{--                        <i class="mdi mdi-apps menu-icon"></i>--}}
                    </a>
                    <div class="collapse" id="page-layouts">
                        <ul class="nav flex-column sub-menu">
                            @foreach($liste_menus_simple as $item_menu_simple)
                                <li class="nav-item"> <a class="nav-link"
                                                         href="{{route('gestion_article',[$item_menu_simple['id']])}}">
                                        {{$item_menu_simple['titre']}} ( {{sizeof($item_menu_simple->articles)}} )
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('gestion_page_accueil')}}">
                        <span class="menu-title">Page d'acceuil</span>
{{--                        <i class="mdi mdi-home menu-icon"></i>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('gestion_infos_generales')}}">
                        <span class="menu-title">Informations generales</span>
{{--                        <i class="mdi mdi-home menu-icon"></i>--}}
                    </a>
                </li>

            </ul>
        </nav>
{{--        //MAIN PANEL --}}
        <div class="main-panel">
            @yield("body")

            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                    Copyright © 2021 - Tous droits réservés.
                </span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                        Conception : <b> STRATON SYSTEM </b>
                </span>
                </div>
            </footer>
        </div>

        </div>
    </div>



    <!-- plugins:js -->
    <script src="{{asset('purple_template/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('purple_template/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('purple_template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('purple_template/js/off-canvas.js')}}"></script>
    <script src="{{asset('purple_template/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('purple_template/js/misc.js')}}"></script>
    <script src="{{asset('purple_template/js/settings.js')}}"></script>
    <script src="{{asset('purple_template/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('purple_template/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
    @yield('script_complementaire')
</body>

</html>
