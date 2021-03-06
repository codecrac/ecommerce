@extends('front_includes')

@section('body')

    <!-- Start of Main -->
    <main class="main mt-5">

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">


                <!-- Start of Shop Banner -->
                <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
                     style="
                         background-image: url({{Storage::url($infos_generales['banniere']) }});
                         background-color: #FFC74E;
                         ">
                    <div class="banner-content" style="background-color: #28292daa;padding:25px;border-radius: 5px">
                        <h6 class="text-white font-weight-bold">Resultat de recherche pour</h6>
                        <h3 class="banner-title text-white
                         text-uppercase font-weight-bolder ls-normal">
                            {{$mot_cle}}
                        </h3>
                    </div>
                </div>
                <!-- End of Shop Banner -->

            {{--                =======================================--}}
            <!-- Start of Shop Content -->
                <div class="shop-content row gutter-lg mb-10">
                    <!-- Start of Sidebar, Shop Sidebar -->
                    <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                        <!-- Start of Sidebar Overlay -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                        <!-- Start of Sidebar Content -->
                        <div class="sidebar-content scrollable">
                            <!-- Start of Sticky Sidebar -->
                            <div class="sticky-sidebar">
                                <div class="filter-actions">
                                    <label>Filtrer :</label>
                                </div>
                                <!-- Start of Collapsible widget -->
                                @foreach($menus_principaux as $item_principal)
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title"><span>{{$item_principal['titre']}}</span></h3>
                                        <ul class="widget-body filter-items search-ul">
                                            @foreach($item_principal->enfants as $item_categorie)
                                                <li><a href="{{route('boutique',[$item_categorie['id']])}}">{{$item_categorie['titre']}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                            @endforeach
                            <!-- End of Collapsible Widget -->


                            </div>
                            <!-- End of Sidebar Content -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>
                    <!-- End of Shop Sidebar -->

                    <!-- Start of Shop Main Content -->
                    <div class="main-content">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                        btn-icon-left d-block d-lg-none"><i
                                        class="w-icon-category"></i><span>Filtrer</span></a>
                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                    <label>Trier :</label>
                                    <select name="orderby" class="form-control">
                                        <option value="default" selected="selected">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by latest</option>
                                        <option value="price-low">Sort by pric: low to high</option>
                                        <option value="price-high">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="toolbox-right">
                            </div>
                        </nav>



                        @if(sizeof($resultat_article) >0)
                            <div class="product-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-2">
                                @foreach($resultat_article as $item_article)
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="{{route('lire_article',[$item_article['id']])}}">
                                                    <img src="{{Storage::url($item_article['image'])}}" alt="Product" width="300"
                                                         height="338" style="max-height: 338px;max-width: 300px" />
                                                </a>
                                                <div class="product-action-horizontal text-center">
                                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" onclick="ajouter_au_panier({{$item_article['id']}})"
                                                       title="Ajouter au panier"></a>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <div class="product-cat">
                                                    <a href="{{route('boutique',[$item_article->categorie_parente->id])}}">{{$item_article->categorie_parente->titre}}</a>
                                                </div>
                                                <h3 class="product-name">
                                                    <a href="{{route('lire_article',[$item_article['id']])}}">{{$item_article['titre']}}</a>
                                                </h3>
                                                <div class="product-pa-wrapper">
                                                    <div class="product-price">

                                                        @if( $item_article['prix_promo'] !=null &&  !empty($item_article['prix_promo']) )

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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <h6 class="text-center">Aucun article dans cette categorie pour le moment, <a href="{{route('accueil')}}"> retour a l'accueil </a> </h6>
                        @endif
                    </div>
                    <!-- End of Shop Main Content -->
                </div>
                <!-- End of Shop Content -->
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->

    <script>
        function ajouter_au_panier(id){
            let id_article = id;

            let quantite = 1;

            $.ajax({
                method : "GET",
                url: "/ajouter_au_panier/"+id_article+"/"+quantite,
                success : function (response){
                    let taille_panier = $('#taille_panier').text();
                    let nv_taille = taille_panier*1 + 1;
                    $('#taille_panier').text(nv_taille);
                }
            })
        }
    </script>
@endsection
