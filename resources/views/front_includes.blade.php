<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title> {{$infos_generales['oragnisation']}} </title>

    <meta name="keywords" content="E-commerce, {{$infos_generales['organisation']}} " />
    <meta name="description" content="{{$infos_generales['organisation']}} - {{$infos_generales['apropos']}}">
    <meta name="author" content="STRATON SYSTEM | YVES LADDE">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href=" {{Storage::url($infos_generales['logo'])}}">


    <link rel="preload" href="/front_template/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="/front_template/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="/front_template/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="/front_template/fonts/wolmart87d5.ttf?png09e" as="font" type="font/ttf" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="/front_template/vendor/fontawesome-free/css/all.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="/front_template/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/front_template/vendor/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/front_template/vendor/magnific-popup/magnific-popup.min.css">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="/front_template/css/demo9.min.css">

    <style>
        @media only screen and (min-width: 600px) {
            .hidden-md{
                display: none;
            }
        }
    </style>
    @yield('style_complementaire')

</head>

<body class="home">
<div class="page-wrapper">
    <!-- Start of Header -->
    <header class="header">

        <div class="header-middle">
            <div class="container">
                <div class="header-left mr-md-4">
                    <a href="#" class="mobile-menu-toggle  w-icon-hamburger">
                    </a>
                    <a href="{{route('accueil')}}" class="logo ml-lg-0">
                        <img src="{{Storage::url($infos_generales['logo'])}}" alt="logo" width="144" height="45" />
                    </a>
                    <form method="post" action="{{route('resultat_recherche')}}" class="input-wrapper header-search hs-expanded hs-round d-none d-md-flex">
                        <div class="select-box">
                            <select id="category" name="id_categorie" required>
                                <option value>Choisissez</option>
                                <option value="-1">Suivre commande</option>
                                <option value="0">Toutes Categories</option>
                                @foreach($liste_categories as $item_categorie)
                                    <option value="{{$item_categorie['slug']}}">{{$item_categorie['titre']}}</option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                        <input type="text" class="form-control" name="mot_cle" id="search"
                               placeholder="Suivre commande ou Rechercher dans la categorie..." required />
                        <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                        </button>
                    </form>
                </div>
                <div class="header-right ml-4">
                    <div class="header-call d-xs-show d-lg-flex align-items-center">
                        <a href="tel:#" class="w-icon-call"></a>
                        <div class="call-info d-lg-show">
                            <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                <a href="mailto:{{$infos_generales['email']}}" class="text-capitalize">Ecrivez Nous</a> ou :</h4>
                            <a href="tel:{{$infos_generales['telephones']}}" class="phone-number font-weight-bolder ls-50"> {{$infos_generales['telephones']}}</a>
                        </div>
                    </div>

{{--                    PANIER======--}}
                    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                        <div class="cart-overlay"></div>
                        <a href="#" class="cart-toggle label-down link">
                            <i class="w-icon-cart">
                                <span class="cart-count" id="taille_panier">{{sizeof($le_panier['contenu'])}}</span>
                            </i>
                            <span class="cart-label">Panier</span>
                        </a>
                        <div class="dropdown-box">
                            <div class="cart-header">
                                <span>PANIER</span>
                                <a href="#" class="btn-close">Fermer<i class="w-icon-long-arrow-right"></i></a>
                            </div>

                            <div class="products">
                                @foreach($le_panier['contenu'] as $item_article)
                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="product-default.html" class="product-name">
                                                {{$item_article['titre']}}
                                            </a>
                                            <div class="price-box">
                                                <span class="product-quantity">{{$item_article['qte']}}</span>
                                                <span class="product-price"> {{ number_format($item_article['prix'] ,0,'',' ')}} </span>
                                            </div>
                                        </div>

                                        <figure class="product-media">
                                            <a href="{{route('lire_article',[$item_article['id_article']])}}">
                                                <img src="{{Storage::url($item_article['image'])}} " alt="product" height="84"
                                                     width="94" />
                                            </a>
                                        </figure>
                                    </div>
                                @endforeach

                            </div>

                            <div class="cart-total">
                                <label>Total:</label>
                                <span class="price">{{number_format($le_panier['grand_total'],0,'',' ')}} F</span>
                            </div>

                            <div class="cart-action">
                                <a href="{{route('voir_le_panier')}}" class="btn btn-dark btn-outline btn-rounded">Voir Panier</a>
                                <a href="{{route('voir_le_panier')}}" class="btn btn-primary  btn-rounded">Finaliser</a>
                            </div>
                        </div>
                        <!-- End of Dropdown Box -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Header Middle -->

        <div class="header-bottom sticky-content fix-top sticky-header">
            <div class="container">
                <div class="inner-wrap" style="padding: 9px">
                    <div class="header-left">
                        <nav class="main-nav ml-0">

                            <ul class="menu">
                                <li class="active">
                                    <a href="{{route('accueil')}}">Accueil</a>
                                </li>
                                @foreach($menus_principaux as $item_categorie_parente)
                                    @if($item_categorie_parente['type']=='parente')
                                    <li>
                                        <a href="{{route('boutique',[$item_categorie_parente['slug']])}}">{{$item_categorie_parente['titre']}}</a>
                                        <ul>
                                            @foreach($item_categorie_parente->enfants as $item_categorie)
                                                <li><a href="{{route('boutique',[$item_categorie['slug']])}}">{{$item_categorie['titre']}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                        <li><a href="{{route('boutique',[$item_categorie_parente['slug']])}}">{{$item_categorie_parente['titre']}}</a></li>
                                    @endif
                                @endforeach

                            </ul>
                        </nav>
                    </div>
                    <div class="header-right">
                        <a href="{{route('boutique',[$item_categorie['slug']])}}" class="d-xl-show"> Toutes categories</a>
{{--                        <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Header Bottom -->

        <!-- End of Container -->
    </header>
    <!-- End of Header -->
{{--===============================  CONTENU  =================================================--}}
            @yield('body')

{{--    //LIVE CHAT--}}
{{--===============================  //CONTENU  =================================================--}}

<!-- Start of Footer -->
    <footer class="footer footer-dark appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">
        <div class="footer-newsletter bg-primary">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="icon-box icon-box-side text-white">
                            <div class="icon-box-icon d-inline-flex">
                                <i class="w-icon-envelop3"></i>
                            </div>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Souscrivez a notre newsletter</h4>
                                <p class="text-white"> Soyez informer de toutes nos promotions </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                        <form action="#" method="get"
                              class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                            <input type="email" class="form-control mr-2 bg-white" name="email" id="email_client"
                                   placeholder="Entrer votre adresse e-mail" />
                            <button class="btn btn-dark btn-rounded" id="reponse_newsletter" type="button" onclick="inscrire_a_la_newsletter()" >
                                Souscrire <i class="w-icon-long-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="footer-top">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget widget-about">
                            <a href="demo1.html" class="logo-footer">
                                <img src="{{Storage::url($infos_generales['logo'])}}" alt="logo-footer" width="144"
                                     height="45" />
                            </a>
                            <div class="widget-body">
                                <p class="widget-about-title">Des Question? Appelez nous 24/7</p>
                                <a href="tel:18005707777" class="widget-about-call">{{$infos_generales['telephones']}}</a>
                                <p class="widget-about-desc">Souscrivez a la newsletter pour ne pas manquer les prochaines promotions.
                                </p>

                                <div class="social-icons social-icons-colored">
                                    @if($infos_generales['lien_fb'] !=null && $infos_generales['lien_fb']!='')
                                        <a href="{{$infos_generales['lien_fb']}}" class="social-icon social-facebook w-icon-facebook"></a>
                                    @endif
                                    @if($infos_generales['lien_twitter'] !=null && $infos_generales['lien_twitter']!='')
                                        <a href="{{$infos_generales['lien_twitter']}}" class="social-icon social-twitter w-icon-twitter"></a>
                                    @endif
                                    @if($infos_generales['lien_insta'] !=null && $infos_generales['lien_insta']!='')
                                        <a href="{{$infos_generales['lien_insta']}}" class="social-icon social-instagram w-icon-instagram"></a>
                                    @endif
                                    @if($infos_generales['lien_linkedin'] !=null && $infos_generales['lien_linkedin']!='')
                                        <a href="{{$infos_generales['lien_linkedin']}}" class="social-icon social-linkedin w-icon-linkedin"></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-8 col-md-8 footer-middle">
                        @foreach($menus_principaux as $item)
                            <div>
                               <div class="category-box mt-3">
                                    <h6 class="category-name">{{$item['titre']}}</h6>
{{--                                   <div class="container">--}}
                                        @php $i=0; @endphp
                                        @foreach($item->enfants as $sous_item)
                                            <a href="{{route('boutique',[$sous_item['slug']])}}">{{$sous_item['titre']}}</a>
                                            @if($i++ == 4 )
                                                @break
                                            @endif
                                        @endforeach
                                        <a href="{{route('boutique',[$item['slug']])}}">Voir tous</a>
{{--                                   </div>--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-left">
                    <p class="copyright">Copyright © {{$infos_generales['organisation']}} - 2021.</p>
                </div>
                <div class="footer-right">
                    <span class="payment-label mr-lg-8">CONCEPTION : <a href="https://straton-sytem.com" class="text-warning">STRATON SYSTEM</a>.</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>
<!-- End of Pgge-wrapper -->

<!-- Start of Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
<!-- End of Scroll Top -->

<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">

        <form action="{{route('resultat_recherche')}}" method="post" class="input-wrapper">
            <input type="hidden" class="form-control" value="0" required name="id_categorie" />
            <input type="text" class="form-control" name="mot_cle" autocomplete="off" placeholder="Rechercher... "
                   required />
            @csrf
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>

        <form action="{{route('resultat_recherche')}}" method="post" class="input-wrapper">
            <input type="hidden" class="form-control" value="-1" required name="id_categorie" />
            <input type="text" class="form-control" name="mot_cle" autocomplete="off" placeholder="Suivre ma commande... "
                   required />
            @csrf
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
     {{--   <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>--}}
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="{{route('accueil')}}">Accueil</a></li>
                    @foreach($menus_principaux as $item_categorie_parente)
                        @if($item_categorie_parente['type']=='parent')
                            <li>
                                <a href="{{route('boutique',$item_categorie_parente['slug'])}}">{{$item_categorie_parente['titre']}}</a>
                                <ul>
                                    @foreach($item_categorie_parente->enfants as $item_categorie)
                                        <li><a href="{{route('boutique',[$item_categorie['slug']])}}">{{$item_categorie['titre']}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="{{route('boutique',[$item_categorie_parente['slug']])}}">{{$item_categorie_parente['titre']}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->


<script>
    function inscrire_a_la_newsletter(){

        let email = $("#email_client").val()
        let route = "/inscrire_a_la_newsletter/"+email;
        if(email.length <5){
            alert('entrez une adresse email valide');
            return false;
        }

        $('#reponse_newsletter').text('...');
        $.ajax({
            method : "GET",
            url: route,
            success : function (reponse){
                $('#reponse_newsletter').html(reponse);
            },
            error: function(error){
                alert(error.responseText.message);
                console.log(error);
            }
        })
    }
</script>

<!-- Plugin JS File -->
<script src="/front_template/vendor/jquery/jquery.min.js"></script>
<script src="/front_template/vendor/parallax/parallax.min.js"></script>
<script src="/front_template/vendor/jquery.plugin/jquery.plugin.min.js"></script>
<script src="/front_template/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="/front_template/vendor/isotope/isotope.pkgd.min.js"></script>
<script src="/front_template/vendor/owl-carousel/owl.carousel.min.js"></script>
<!-- <script src="/front_template/vendor/magnific-popup/jquery.magnific-popup.min.js"></script> -->
<script src="/front_template/vendor/skrollr/skrollr.min.js"></script>
<script src="/front_template/vendor/jquery.countdown/jquery.countdown.min.js"></script>
<script src="/front_template/vendor/isotope/isotope.pkgd.min.js"></script>

<!-- Main JS -->
<script src="/front_template/js/main.min.js"></script>


@yield('script_complementaire');
</body>
</html>


