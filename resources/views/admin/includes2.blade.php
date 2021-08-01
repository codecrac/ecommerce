<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Jul 2021 00:19:50 GMT -->
<head>
    <meta charset="utf-8" />
    <title>{{$infos_generales['organisation']}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="administration du site de l'organisation {{$infos_generales['organisation']}}" name="description" />
    <meta content="yves Ladde | Straton System" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{Storage::url($infos_generales['logo'])}}">

    <!-- third party css -->
    <link href="{{asset('assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />

    <link href="{{asset('summernote/summernote-lite.min.css')}}" rel="stylesheet">


    <style>
        .content-page{
            overflow-x: auto !important;
        }
    </style>

    @yield('style_complementaire')
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="leftside-menu">

        <!-- LOGO -->
        <a href="{{route('dashboard')}}" class="logo text-center logo-light text-white p-2">
            <span class="logo-lg">
                <h3>{{$infos_generales['organisation']}}</h3>
            </span>
            <span class="logo-sm">
                <h3>{{$infos_generales['organisation']}}</h3>
            </span>
        </a>

        <!-- LOGO -->
        <a href="{{route('dashboard')}}" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <h3>{{$infos_generales['organisation']}}</h3>
                    </span>
            <span class="logo-sm">
                <h3>{{$infos_generales['organisation']}}</h3>
            </span>
        </a>

        <div class="h-100" id="leftside-menu-container" data-simplebar>

            <!--- Sidemenu -->
            <ul class="side-nav">

                <li class="side-nav-title side-nav-item">Frais ou pas ?</li>

                <li class="side-nav-item">
                    <a href="{{route('dashboard')}}" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span> Tableau de bord </span>
                    </a>
                </li>

                <li class="side-nav-title side-nav-item">Section publique</li>

                <li class="side-nav-item">
                    <a href="{{route('chat_admin')}}" class="side-nav-link">
                        <i class="uil-align-center"></i>
                        <span> Chats (3) </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{route('gestion_menus')}}" class="side-nav-link">
                        <i class="uil-align-center"></i>
                        <span> Rubriques (Menus) </span>
                    </a>
                </li>

                @if( Auth::user()->articles =='true' )
                    <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                        <i class="uil-copy-alt"></i>
                        <span> Articles </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPages">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('promo_categorie')}}"> Promotion sur categories </a>
                            </li>
                            @foreach($liste_menus_simple as $item_menu_simple)
                            <li>
                                <a href="{{route('gestion_article',[$item_menu_simple['id']])}}">{{$item_menu_simple['titre']}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @endif

{{--                @if( Auth::user()->publicite =='true' )--}}
                    <li class="side-nav-item">
                        <a href="{{route('gestion_commande')}}" class="side-nav-link">
                            <i class="uil-cell"></i>
                            <span> Commandes </span>
                        </a>
                    </li>
{{--                @endif--}}

                @if( Auth::user()->evenement =='true' )
                    <li class="side-nav-item">
                        <a href="{{route('newsletter')}}" class="side-nav-link">
                            <i class="uil-calendar-alt"></i>
                            <span> Newsletter </span>
                        </a>
                    </li>
                @endif

                <li class="side-nav-item">
                    <a href="{{route('gestion_page_accueil')}}" class="side-nav-link">
                        <i class="uil-list-ui-alt"></i>
                        <span> Page d'Accueil </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{route('gestion_infos_generales')}}" class="side-nav-link">
                        <i class="uil-cog"></i>
                        <span> Infos generales </span>
                    </a>
                </li>

                <li class="side-nav-title side-nav-item mt-1">Section Administration</li>


                @if( Auth::user()->creer_utilisateurs =='true' )
                   {{-- <li class="side-nav-item">
                        <a href="{{route('register')}}" class="side-nav-link">
                            <i class="uil-user-plus"></i>
                            <span> Ajouter administrateur </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{route('gestion_utilisateur')}}" class="side-nav-link">
                            <i class="uil-users-alt"></i>
                            <span> Liste Administrateurs </span>
                        </a>
                    </li>--}}
                @endif
            </ul>

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topbar-menu float-end mb-0">
                    <li class="notification-list">
                        <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                            <i class="dripicons-gear noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                           aria-expanded="false">
                            <span class="account-user-avatar">
                                        <img src="{{Storage::url($infos_generales['logo'])}}" alt="user-image" class="rounded-circle">
                                    </span>
                            <span>
                                <br/>
                                <span class="account-user-name">{{Auth::user()->name}}</span>
{{--                                <span class="account-position">Super Admin</span>--}}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Bienvenue !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{ route('profile.show') }}" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span>Profil</span>
                            </a>
                            <!-- item-->
                            <a href="#" class="dropdown-item notify-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <i class="mdi mdi-logout me-1" style="display: inline"></i>
                                    <button type="submit" class="dropdown-item text-left" style="display: inline">
                                        Deconnexion
                                    </button>
                                </form>
                            </a>
                        </div>
                    </li>

                </ul>
                <button class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu"></i>
                </button>
            </div>
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">
                @yield('body')
            </div>


        </div>
        <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            STRATON SYSTEM
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>

<!-- bundle -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>

<!-- third party js -->
<script src="{{asset('assets/js/vendor/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{asset('assets/js/pages/demo.dashboard.js')}}"></script>
<!-- end demo js-->

<script src="{{asset('summernote/summernote-lite.min.js')}}"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Tapez votre article ici',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
@yield('script_complementaire')

</body>

<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Jul 2021 00:21:13 GMT -->
</html>
