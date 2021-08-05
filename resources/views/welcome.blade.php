@extends('front_includes')

@section('style_complementaire')
    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

    </style>
@endsection


@section('body')

    <!-- Start of Main -->
    <main class="main">

{{--        Categorie en evidence--}}
            <div class="row grid grid-float pt-2 banner-grid mb-9 appear-animate">
{{--                UN--}}
                @php
                    $bg1 = $mis_en_avant_un['image_illustration'];
                    if($bg1==null){
                        if($mis_en_avant_un->id_parent == null){
                            $bg1 = $infos_generales['banniere'];
                        }else{
                            $bg1 = $mis_en_avant_un->parent->image_illustration ;
                        }
                        if($bg1 == null){
                            $bg1 = $infos_generales['banniere'];
                        }
                    }

                @endphp
                <div class="grid-item col-lg-6 height-x2">
                    <div class="banner banner-fixed banner-lg br-sm">
                        <figure>
                            <img src="{{Storage::url($bg1)}}" alt="Banner" width="670"
                                 height="450" style="background-color: #fff;" />
                        </figure>
                        <div class="banner-content y-50" style="background-color: #28292daa;padding: 10%;border-radius: 5px">

                            <h3 class="banner-title text-capitalize text-white">{{$mis_en_avant_un['titre']}}</h3>
                            @if($mis_en_avant_un['etat_promotion'] =='true' && $mis_en_avant_un['reduction'] >0 )
                                <h5 class="banner-subtitle text-capitalize font-weight-normal mb-0 ls-25 text-white text-right">
                                    <small>jusqu'à</small> <strong class="text-secondary text-uppercase">-{{$mis_en_avant_un['reduction']}}%</strong>
                                </h5>
                            @endif
                            <br/>
                            <a href="{{route('boutique',[$mis_en_avant_un['slug']])}}" class="btn btn-white btn-outline btn-rounded btn-icon-right">
                                Decouvrir<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
{{--                DEUX--}}
                @php
                    $bg2 = $mis_en_avant_deux['image_illustration'];
                    if($bg2==null){
                        if($mis_en_avant_deux->id_parent == null){
                            $bg2 = $infos_generales['banniere'];
                        }else{
                            $bg2 = $mis_en_avant_deux->parent->image_illustration ;
                        }
                        if($bg2 == null){
                            $bg2 = $infos_generales['banniere'];
                        }
                    }

                @endphp
                <div class="grid-item col-lg-6 height-x1">
                    <div class="banner banner-fixed banner-md br-sm">
                        <figure>
                            <img src="{{Storage::url($bg2)}}" alt="Banner" width="670"
                                 height="450" style="background-color: #fff;" />
                        </figure>
                        <div class="banner-content" style="background-color: #28292daa;padding:4%;border-radius: 5px">
                            <h3 class="banner-title text-white ls-25">
                                {{$mis_en_avant_deux['titre']}}
                                    @if($mis_en_avant_deux['etat_promotion'] =='true' && $mis_en_avant_deux['reduction'] >0)
                                        <span  style="color: orange">( - {{$mis_en_avant_deux['reduction']}}% )</span>
                                    @endif
                            </h3>
                            <a href="{{route('boutique',[$mis_en_avant_deux['slug']])}}" class="btn btn-white btn-link btn-underline btn-icon-right">
                                Acheter maintenant<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
{{--                TROIS--}}
                @php
                    $bg3 = $mis_en_avant_trois['image_illustration'];
                    if($bg3==null){
                        if($mis_en_avant_trois->id_parent == null){
                            $bg3 = $infos_generales['banniere'];
                        }else{
                            $bg3 = $mis_en_avant_trois->parent->image_illustration ;
                        }
                        if($bg3 == null){
                            $bg3 = $infos_generales['banniere'];
                        }
                    }

                @endphp
                <div class="grid-item col-sm-6 col-lg-3 height-x1">
                    <div class="banner banner-fixed banner-sm br-sm" style="background-color: #fff">
                        <figure>
                            <img src="{{Storage::url($bg3)}}" alt="Banner" width="330"
                                 height="215" style="background-color: #fff;" />
                        </figure>
                        <div class="banner-content x-50 y-50 w-100 text-center" style="background-color: #28292daa;padding:4%;border-radius: 5px">
                            <h4 class="text-white">{{$mis_en_avant_trois['titre']}}</h4>
                            @if($mis_en_avant_trois['etat_promotion'] =='true'  && $mis_en_avant_trois['reduction'] >0)
                                <div class="banner-price-info font-weight-normal text-white mb-3">
                                    jusqu'a <strong class="text-uppercase text-danger" style="color: orange">{{$mis_en_avant_trois['reduction']}}% de reduction</strong>
                                </div>
                            @endif

                            <a href="{{route('boutique',[$mis_en_avant_trois['slug']])}}" class="btn btn-white btn-link btn-underline"> Decouvrir la Collection</a>
                        </div>
                    </div>
                </div>
{{--                QUATRE--}}
                @php
                    $bg4 = $mis_en_avant_quatre['image_illustration'];
                    if($bg4==null){
                        if($mis_en_avant_quatre->id_parent == null){
                            $bg4 = $infos_generales['banniere'];
                        }else{
                            $bg4 = $mis_en_avant_quatre->parent->image_illustration ;
                        }
                        if($bg4 == null){
                            $bg4 = $infos_generales['banniere'];
                        }
                    }

                @endphp
                <div class="grid-item col-sm-6 col-lg-3 height-x1">
                    <div class="banner banner-fixed banner-sm br-sm">
                        <figure>
                            <img src="{{Storage::url($bg4)}}" alt="Banner" width="330"
                                 height="215" style="background-color: #fff;" />
                        </figure>
                        <div class="banner-content" style="background-color: #28292daa;padding:4%;border-radius: 5px">

                            @if($mis_en_avant_quatre['etat_promotion'] =='true'  && $mis_en_avant_quatre['reduction'] >0)
                                <h6 class="banner-subtitle text-uppercase font-weight-bold" style="color: orange">
                                    [ {{$mis_en_avant_quatre['reduction']}}% de reduction ]
                                </h6>
                            @endif
                            <h3 class="banner-title text-capitalize ls-25 text-white"> {{$mis_en_avant_quatre['titre']}} </h3>
                            <a href="{{route('boutique',[$mis_en_avant_quatre['slug']])}}" class="btn btn-white btn-link btn-underline btn-icon-right">
                                Voir les articles <i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Banner Grid -->

{{--        TOPS DEALS--}}
            <div class="row appear-animate" style="padding: 8px">
                <div class="col-lg-4 col-md-5 mb-6">
                    <div class="product-lg br-sm">
                        <h2 class="title title-underline mb-4"> Tops Deals </h2>
                        <div class="owl-carousel owl-theme owl-nav-top owl-nav-md row cols-1" data-owl-options="{
                                'nav': true,
                                'dots': false,
                                'margin': 20
                            }">
                            @foreach($avec_promo as $item_avec_promo)
                                <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{route('lire_article',[$item_avec_promo['slug']])}}">
                                        <img src="{{Storage::url($item_avec_promo['image'])}}" alt="Product"
                                             width="800" height="900" />
                                        <img src="{{Storage::url($item_avec_promo['image'])}}" alt="Product"
                                             width="800" height="900" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"  onclick="ajouter_au_panier({{$item_avec_promo['id']}})"
                                           title="Ajouter au panier"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a class="product-title" href="{{route('boutique',[$item_avec_promo['id']])}}">{{$item_avec_promo['titre']}}</a>
                                    </h3>
                                    <div class="product-price">

                                        @if( $item_avec_promo['prix_promo'] !=null &&  !empty($item_avec_promo['prix_promo']) )

                                            @if($item_avec_promo->categorie_parente->etat_promotion =='false')
                                                <ins class="new-price"> {{number_format($item_avec_promo['prix_promo'],0,'',' ' )}} F </ins>
                                            @else
                                                <ins class="new-price"> {{number_format( round($item_avec_promo['prix_promo']  - ($item_avec_promo['prix_promo'] * $item_avec_promo->categorie_parente->reduction/100) ),0,'',' ') }} F </ins>
                                            @endif
                                            <del class="old-price">  {{number_format($item_avec_promo['prix'],0,'',' ' )}} F </del>
                                        @else
                                            @if($item_avec_promo->categorie_parente->etat_promotion =='false')
                                                <ins class="new-price"> {{number_format( $item_avec_promo['prix'],0,'',' ' )}} F </ins>
                                            @else
                                                <ins class="new-price"> {{ number_format( round( $item_avec_promo['prix']  - ($item_avec_promo['prix'] * $item_avec_promo->categorie_parente->reduction/100) ),0,'',' ') }} F </ins>

                                                <del class="old-price">  {{number_format($item_avec_promo['prix'],0,'',' ' ) }} F </del>
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="text-center hidden-md">
                                    <h5 style="border: 1px solid #ccc;padding: 5px;" class="btn-cart" onclick="ajouter_au_panier({{$item_avec_promo['id']}})"
                                        title="Ajouter au panier"> Ajouter au panier</h5>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- End of Owl Carousel -->
                        <div class="product-countdown-container">
                            <div class="countdown-lable mr-3 mb-2">
                                <h4 class="font-weight-bold ls-10">Depechez vous!</h4>
                                <label class="text-dark">Expiration dans:</label>
                            </div>

                            @php
                                $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
                                $jour = date('d', strtotime($date .' +2 day'));
                                $mois = date('m', strtotime($date .' +2 day'));
                                $annee = date('Y', strtotime($date .' +2 day'));
                            @endphp

                            <div class="product-countdown countdown-compact mb-2" data-until="{{$annee}}, {{$mois}}, {{$jour}}"
                                 data-format="DHMS" data-compact="false" data-labels-short="Jours, Heures, Mins, Secs">
                                00:00:00:00
                            </div>
                        </div>
                    </div>
                </div>


{{--                J'AI DE LA CHANCE--}}
                <!-- End of Col -->
                <div class="col-lg-8 col-md-7 mb-6">
                    <div class="tab tab-nav-underline tab-nav-center">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " href="#tab-1"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">J'ai de la chance</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-3"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane " id="tab-1">
                            <div class="owl-carousel owl-theme row cols-lg-4 cols-sm-3 cols-2" data-owl-options=""></div>
                        </div>
                        <!-- End of Tab Pane -->
                        <div class="tab-pane active" id="tab-2">
                            <div class="owl-carousel owl-theme row cols-xl-4 cols-lg-3 cols-md-2" data-owl-options="">
                                <div class="product-col">
                                    @php $i=0; @endphp
                                    @foreach($huit_au_hasard as $item_huit)
                                        @php $i++; @endphp
                                        <div class="product text-center">
                                                <figure class="product-media">
                                                    <a href="{{route('lire_article',[$item_huit['slug']])}}">
                                                        <img src="{{Storage::url($item_huit['image'])}}" alt="Product"
                                                             width="800" height="900" />
                                                    </a>
                                                    <div class="product-action-vertical">
                                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                           title="Ajouter au panier" onclick="ajouter_au_panier({{$item_huit['id']}})" ></a>
                                                    </div>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-name">
                                                        <a class="product-title"href="{{route('lire_article',[$item_huit['slug']])}}">{{$item_huit['titre']}}</a>
                                                    </h3>
                                                    <div class="product-price">
    {{--                                                    <ins class="new-price">$10.73</ins>--}}

                                                        @if( $item_huit['prix_promo'] !=null &&  !empty($item_huit['prix_promo']) )

                                                            @if($item_huit->categorie_parente->etat_promotion =='false')
                                                                <ins class="new-price"> {{number_format($item_huit['prix_promo'],0,'',' ' )}} F </ins>
                                                            @else
                                                                <ins class="new-price"> {{number_format( round($item_huit['prix_promo']  - ($item_huit['prix_promo'] * $item_huit->categorie_parente->reduction/100) ),0,'',' ') }} F </ins>
                                                            @endif
                                                            <del class="old-price">  {{number_format($item_huit['prix'],0,'',' ' )}} F </del>
                                                        @else
                                                            @if($item_huit->categorie_parente->etat_promotion =='false')
                                                                <ins class="new-price"> {{number_format( $item_huit['prix'],0,'',' ' )}} F </ins>
                                                            @else
                                                                <ins class="new-price"> {{ number_format( round( $item_huit['prix']  - ($item_huit['prix'] * $item_huit->categorie_parente->reduction/100) ),0,'',' ') }} F </ins>

                                                                <del class="old-price">  {{number_format($item_huit['prix'],0,'',' ' ) }} F </del>
                                                            @endif
                                                        @endif
                                                    </div>


                                                    <div class="text-center hidden-md">
                                                        <h5 style="border: 1px solid #ccc;padding: 5px;" class="btn-cart" onclick="ajouter_au_panier({{$item_huit['id']}})"
                                                            title="Ajouter au panier"> Ajouter au panier</h5>
                                                    </div>
                                                </div>

                                            </div>
                                        @if( $i>0 && $i%2==0)
                                            </div>
                                            <div class="product-col">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- End of Tab Pane -->
                        <div class="tab-pane" id="tab-3">
                            <div class="owl-carousel owl-theme row cols-xl-4 cols-lg-3 cols-md-2" data-owl-options="">
                            </div>
                        </div>
                        <!-- End of Tab Pane -->
                    </div>
                </div>
                <!-- End of Col -->
            </div>
            <!-- End of Row -->

        <div class="container mt-3">

                @foreach($menu_present_sur_accueil as $item_menu_parent)

                    @if($item_menu_parent['type']=='parent')
                        <div class="filter-with-title title-underline mb-4 pb-2 appear-animate">
                            <h2 class="title"> {{$item_menu_parent['titre']}} </h2>

                            <ul class="nav-filters" data-target="#products-{{$item_menu_parent['id']}}">
                                <li><a href="#" class="nav-filter " data-filter="*"> Tous </a></li>
                                @php $i=0; @endphp
                                @foreach($item_menu_parent->enfants as $item_categorie)
                                    <li>
                                        <a href="#" class="nav-filter" data-filter=".1-{{$item_categorie['id']}}">
                                            {{$item_categorie['titre']}}
                                            @if($item_categorie->etat_promotion =='true')
                                                [ -{{$item_categorie->reduction}}% ]
                                            @endif
                                        </a>
                                    </li>
                                    @if($i++ ==5 ) @break  @endif
                                @endforeach
                            </ul>
                        </div>
                       <div class="row grid cols-xl-5 cols-md-4 cols-sm-3 cols-2 appear-animate" id="products-{{$item_menu_parent['id']}}">

                            @foreach($item_menu_parent->enfants as $item_categorie)
                                @foreach($item_categorie->articles as $item_article)
                                    <div class="grid-item 1-{{$item_categorie['id']}}">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="{{route('lire_article',[$item_article['slug']])}}">
                                                    <img src="{{Storage::url($item_article['image'])}}" alt="Product" width="600"
                                                         height="675" />
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Ajouter au panier" onclick="ajouter_au_panier({{$item_article['id']}})"></a>
                                                    {{-- <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>
                                                     <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                                     <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                        title="Quick View"></a>--}}
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a class="product-title" href="{{route('lire_article',[$item_article['slug']])}}"> {{$item_article['titre']}} </a>
                                                </h3>
                                                <div class="product-price">
                                                    @if( $item_article['prix_promo'] !=null &&  !empty($item_article['prix']) )

                                                        @if($item_categorie->etat_promotion =='false')
                                                            <ins class="new-price"> {{number_format($item_article['prix_promo'],0,'',' ' )}} F </ins>
                                                        @else
                                                            <ins class="new-price"> {{number_format( round($item_article['prix_promo']  - ($item_article['prix_promo'] * $item_categorie->reduction/100) ),0,'',' ') }} F </ins>
                                                        @endif

                                                        <del class="old-price">  {{number_format($item_article['prix'],0,'',' ' )}} F </del>
                                                    @else
                                                        @if($item_categorie->etat_promotion =='false')
                                                            <ins class="new-price"> {{number_format( $item_article['prix'],0,'',' ' )}} F </ins>
                                                        @else
                                                            <ins class="new-price"> {{ number_format( round( $item_article['prix']  - ($item_article['prix'] * $item_categorie->reduction/100) ),0,'',' ') }} F </ins>

                                                            <del class="old-price">  {{number_format($item_article['prix'],0,'',' ' ) }} F </del>
                                                        @endif

                                                    @endif

                                                </div>


                                                <div class="text-center hidden-md">
                                                    <h5 style="border: 1px solid #ccc;padding: 5px;" class="btn-cart" onclick="ajouter_au_panier({{$item_article['id']}})"
                                                        title="Ajouter au panier"> Ajouter au panier</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Product -->
                                    </div>
                                @endforeach
                            @endforeach

                            <div class="grid-space col-xl-5col col-1"></div>
                        </div>
                        <!-- End of Grid -->
                    @else
                        @php $nb_article = sizeof($item_menu_parent->articles); @endphp
                        @if($nb_article >0)
                            <div class="filter-with-title title-underline mb-4 pb-2 appear-animate">
                                <h2 class="title"> {{$item_menu_parent['titre']}} </h2>
                            </div>
                        <div class="row grid cols-xl-5 cols-md-4 cols-sm-3 cols-2 appear-animate" id="products-{{$item_menu_parent['id']}}">
                            @foreach($item_menu_parent->articles as $item_article)
                                <div class="grid-item 1-1">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{route('lire_article',[$item_article['slug']])}}">
                                            <img src="{{Storage::url($item_article['image'])}}" alt="Product" width="250"
                                                 height="140" />
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Ajouter au panier"
                                               onclick="ajouter_au_panier({{$item_article['id']}})"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-name">
                                            <a class="product-title" href="{{route('lire_article',[$item_article['slug']])}}">
                                                {{$item_article['titre']}} </a>
                                        </h3>
                                        <div class="product-price">
                                            @if( $item_article['prix_promo'] !=null &&  !empty($item_article['prix']) )

                                                @if($item_article->categorie_parente->etat_promotion =='false')
                                                    <ins class="new-price"> {{number_format($item_article['prix_promo'],0,'',' ' )}} F </ins>
                                                @else
                                                    <ins class="new-price"> {{number_format( round($item_article['prix_promo']  - ($item_article['prix_promo'] * $item_article->categorie_parente->reduction/100) ),0,'',' ') }} F </ins>
                                                @endif

                                                <del class="old-price">  {{number_format($item_article['prix'],0,'',' ' )}} F </del>
                                            @else
                                                @if($item_article->categorie_parente->etat_promotion =='false')
                                                    <ins class="new-price"> {{number_format( $item_article['prix'],0,'',' ' )}} F </ins>
                                                @else
                                                    <ins class="new-price"> {{ number_format( round( $item_article['prix']  - ($item_article['prix'] * $item_article->categorie_parente->reduction/100) ),0,'',' ') }} F </ins>

                                                    <del class="old-price">  {{number_format($item_article['prix'],0,'',' ' ) }} F </del>
                                                @endif

                                            @endif

                                        </div>

                                        <div class="text-center hidden-md">
                                            <h5 style="border: 1px solid #ccc;padding: 5px;" class="btn-cart" onclick="ajouter_au_panier({{$item_article['id']}})"
                                                title="Ajouter au panier"> Ajouter au panier</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product -->
                            </div>
                            @endforeach
                                <div class="grid-space col-xl-5col col-1"></div>
                        </div>
                    @endif
                    @endif
               @endforeach

        </div>

{{--        Categorie presente sur accueil--}}
        <div class="container mt-3">
            @if(sizeof($les_plus_demande)>0)
                <div class="filter-with-title title-underline mb-4 pb-2 appear-animate">
                    <h2 class="title"> Les plus demandés </h2>
                </div>
                <!-- End of Filter With Title -->
                <div class="row grid cols-xl-5 cols-md-4 cols-sm-3 cols-2 appear-animate">

                    @foreach($les_plus_demande as $item_article_top_10)
                        @php $item_article_top_10 = \App\Models\Article::find($item_article_top_10['id_article']); @endphp
                        <div class="grid-item 1">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{route('lire_article',[$item_article_top_10['slug']])}}">
                                            <img src="{{Storage::url($item_article_top_10['image'])}}" alt="Product" width="600"
                                                 height="675" />
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Ajouter au panier" onclick="ajouter_au_panier({{$item_article_top_10['id']}})"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-name">
                                            <a class="product-title" href="{{route('lire_article',[$item_article_top_10['slug']])}}"> {{$item_article_top_10['titre']}} </a>
                                        </h3>
                                        <div class="product-price">
                                            @if( $item_article_top_10['prix_promo'] !=null &&  !empty($item_article_top_10['prix']) )

                                                @if($item_article_top_10->categorie_parente->etat_promotion =='false')
                                                    <ins class="new-price"> {{number_format($item_article_top_10['prix_promo'],0,'',' ' )}} F </ins>
                                                @else
                                                    <ins class="new-price"> {{number_format( round($item_article_top_10['prix_promo']  - ($item_article_top_10['prix_promo'] * $item_article_top_10->categorie_parente->reduction/100) ),0,'',' ') }} F </ins>
                                                @endif

                                                <del class="old-price">  {{number_format($item_article_top_10['prix'],0,'',' ' )}} F </del>
                                            @else
                                                @if($item_article_top_10->categorie_parente->etat_promotion =='false')
                                                    <ins class="new-price"> {{number_format( $item_article_top_10['prix'],0,'',' ' )}} F </ins>
                                                @else
                                                    <ins class="new-price"> {{ number_format( round( $item_article_top_10['prix']  - ($item_article_top_10['prix'] * $item_article_top_10->categorie_parente->reduction/100) ),0,'',' ') }} F </ins>

                                                    <del class="old-price">  {{number_format($item_article_top_10['prix'],0,'',' ' ) }} F </del>
                                                @endif

                                            @endif

                                        </div>

                                        <div class="text-center hidden-md">
                                            <h5 style="border: 1px solid #ccc;padding: 5px;" class="btn-cart" onclick="ajouter_au_panier({{$item_article_top_10['id']}})"
                                                title="Ajouter au panier"> Ajouter au panier</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product -->
                        </div>
                    @endforeach

                    <div class="grid-space col-xl-5col col-1"></div>
                </div>
                <!-- End of Grid -->
                @endif
        </div>
    </main>
    <!-- End of Main -->


    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span id="btn_close" class="close">&times;</span>
                <h2 class="text-center"> {{$infos_generales['organisation']}} </h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="text-center">Souscrivez a notre newsletter et soyez informez de nos promotions et autres evenements </h6>
                    </div>
                    <div  class="text-center col-md-12">
                            <input type="email" class="form-control mr-2 bg-white" name="email" id="email_client"
                                   placeholder="Entrer votre adresse e-mail" />
                            <button class="btn btn-dark btn-rounded" id="reponse_newsletter" type="button" onclick="inscrire_a_la_newsletter()" >
                                Souscrire <i class="w-icon-long-arrow-right"></i>
                            </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
{{--                <h3>Modal Footer</h3>--}}
            </div>
        </div>

    </div>

@endsection


@section('script_complementaire')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js"></script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        setTimeout(function (){
            if ($.cookie('popup_email_ok') == null) {
                modal.style.display = "block";
            }
        },200);
    </script>
@endsection
