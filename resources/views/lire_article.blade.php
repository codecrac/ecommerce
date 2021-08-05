@extends('front_includes')

@section('style_complementaire')

    <link rel="stylesheet" type="text/css" href="/front_template/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/front_template/vendor/photoswipe/photoswipe.min.css">
        <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="/front_template/css/style.min.css">
@endsection

@section('body')

<body>
<div class="page-wrapper">
    <!-- Start of Main -->
    <main class="main mb-10 pb-1">
        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <div>
                        <div class="product product-single row">
                            <div class="col-md-6 mb-6">
                                <div class="product-gallery product-gallery-sticky product-gallery-vertical">
                                    <div
                                        class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                                        <figure class="product-image">
                                            <img src="{{Storage::url($larticle['image'])}}"
                                                 data-zoom-image="{{Storage::url($larticle['image'])}}"
                                                 width="800" height="900">
                                        </figure>


                                        @foreach($larticle->photos_en_plus as $item_photo)
                                            <div class="product-image">
                                                <img src="{{Storage::url($item_photo['image'])}}"
                                                     data-zoom-image="{{Storage::url($item_photo['image'])}}"
                                                      width="488" height="549">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="product-thumbs-wrap">
                                        <div class="product-thumbs">
                                            <div class="product-thumb active">
                                                <img src="{{Storage::url($larticle['image'])}}"
                                                     alt="Product Thumb" width="800" height="900">
                                            </div>

                                            @foreach($larticle->photos_en_plus as $item_photo)
                                            <div class="product-thumb">
                                                <img src="{{Storage::url($item_photo['image'])}}"
                                                     alt="Product Thumb" width="800" height="900">
                                            </div>
                                            @endforeach

                                        </div>
                                        <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                                        <button class="thumb-down disabled"><i
                                                class="w-icon-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 sticky-sidebar-wrapper mb-4 mb-md-6">
                                <div class="product-details sticky-sidebar" data-sticky-options="{'minWidth': 767}">
                                    <h1 class="product-title">{{$larticle['titre']}}</h1>
                                    <div class="product-bm-wrapper">
                                        <div class="product-meta">
                                            <div class="product-categories">
                                                Categorie:
                                                <span class="product-category"><a href="{{route('boutique',[$larticle->categorie_parente->slug])}}"> {{$larticle->categorie_parente->titre}} </a> </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="product-divider">

                                    <div class="product-price">
                                        @if( $larticle['prix_promo'] !=null &&  !empty($larticle['prix_promo']) )

                                            @if($larticle->categorie_parente->etat_promotion =='false')
                                                <ins class="new-price"> {{number_format($larticle['prix_promo'],0,'',' ' )}} F </ins>
                                            @else
                                                <ins class="new-price"> {{number_format( round($larticle['prix_promo']  - ($larticle['prix_promo'] * $larticle->categorie_parente->reduction/100) ),0,'',' ') }} F </ins>
                                            @endif

                                            <del class="old-price">  {{number_format($larticle['prix'],0,'',' ' )}} F </del>
                                        @else
                                            @if($larticle->categorie_parente->etat_promotion =='false')
                                                <ins class="new-price"> {{number_format( $larticle['prix'],0,'',' ' )}} F </ins>
                                            @else
                                                <ins class="new-price"> {{ number_format( round( $larticle['prix']  - ($larticle['prix'] * $larticle->categorie_parente->reduction/100) ),0,'',' ') }} F </ins>

                                                <del class="old-price">  {{number_format($larticle['prix'],0,'',' ' ) }} F </del>
                                            @endif

                                        @endif
                                    </div>

                                    <div class="product-short-desc lh-2">
                                        {{$larticle['extrait']}}
                                    </div>

                                    <div class="fix-bottom product-sticky-content sticky-content">

                                        <div class="product-form container">
                                            <div class="product-qty-form">
                                                <div class="input-group">
                                                    <input class="quantity form-control" id="quantite_{{$larticle['id']}}" type="number" min="1"
                                                           max="10000000">
                                                    <button class="quantity-plus w-icon-plus"></button>
                                                    <button class="quantity-minus w-icon-minus"></button>
                                                </div>
                                            </div>
{{--                                            <button class="btn btn-primary btn-cart">--}}
                                            <button class="btn btn-primary btn-cart"  onclick="ajouter_au_panier({{$larticle['id']}})" >
                                                <i class="w-icon-cart"></i>
                                                <a href="#"style="color: #fff">Ajouter au panier</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab tab-nav-boxed tab-nav-underline product-tabs mt-3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#product-tab-description" class="nav-link active">Details</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="product-tab-description">
                                    {!! $larticle['contenu'] !!}
                                </div>
                            </div>
                        </div>
                        <section class="related-product-section">
                            <div class="title-link-wrapper mb-4">
                                <h4 class="title">Dans la meme categorie</h4>
                                <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">plus<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <div class="owl-carousel owl-theme row cols-lg-3 cols-md-4 cols-sm-3 cols-2"
                                 data-owl-options="{
                                    'nav': false,
                                    'dots': false,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 2
                                        },
                                        '576': {
                                            'items': 3
                                        },
                                        '768': {
                                            'items': 4
                                        },
                                        '992': {
                                            'items': 3
                                        }
                                    }
                                }">

                                @foreach($de_la_meme_categorie as $item)
                                    <div class="product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{Storage::url($item['image'])}}" alt="Product"
                                                 width="300" height="338" />
                                        </a>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart btn-quickview" onclick="ajouter_au_panier($item['id'])"> Ajouter au panier </a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{route('lire_article',[$item['slug']])}}">{{$item['titre']}}</a></h4>
                                        <div class="product-pa-wrapper">

                                            @if( $item['prix_promo'] !=null &&  !empty($item['prix_promo']) )

                                                @if($item->categorie_parente->etat_promotion =='false')
                                                    <h4 class="product-price"> {{number_format($item['prix_promo'],0,'',' ' )}} F </h4>
                                                @else
                                                    <h4 class="product-price"> {{number_format( round($item['prix_promo']  - ($item['prix_promo'] * $item->categorie_parente->reduction/100) ),0,'',' ') }} F </h4>
                                                @endif
                                                <del class="old-price">  {{number_format($item['prix'],0,'',' ' )}} F </del>
                                            @else
                                                @if($item->categorie_parente->etat_promotion =='false')
                                                    <h4 class="product-price"> {{number_format( $item['prix'],0,'',' ' )}} F </h4>
                                                @else
                                                    <h4 class="product-price"> {{ number_format( round( $item['prix']  - ($item['prix'] * $item->categorie_parente->reduction/100) ),0,'',' ') }} F </h4>

                                                    <del class="old-price"> &nbsp;&nbsp; {{number_format($item['prix'],0,'',' ' ) }} F </del>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="text-center hidden-md">
                                            <h5 style="border: 1px solid #ccc;padding: 5px;" class="btn-cart" onclick="ajouter_au_panier({{$item['id']}})"
                                                title="Ajouter au panier"> Ajouter au panier</h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->

</div>

<!-- APERCU DE PRODUIT SIMILAIRE -->
<div class="product product-single product-popup">
    <div class="row gutter-lg">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="product-gallery product-gallery-sticky mb-0">
                <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                    <figure class="product-image">
                        <img src="/front_template/images/products/popup/1-440x494.jpg"
                             data-zoom-image="/front_template/images/products/popup/1-800x900.jpg"
                             alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                    <figure class="product-image">
                        <img src="/front_template/images/products/popup/2-440x494.jpg"
                             data-zoom-image="/front_template/images/products/popup/2-800x900.jpg"
                             alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                    <figure class="product-image">
                        <img src="/front_template/images/products/popup/3-440x494.jpg"
                             data-zoom-image="/front_template/images/products/popup/3-800x900.jpg"
                             alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                    <figure class="product-image">
                        <img src="/front_template/images/products/popup/4-440x494.jpg"
                             data-zoom-image="/front_template/images/products/popup/4-800x900.jpg"
                             alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                </div>
                <div class="product-thumbs-wrap">
                    <div class="product-thumbs">
                        <div class="product-thumb active">
                            <img src="/front_template/images/products/popup/1-103x116.jpg" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb">
                            <img src="/front_template/images/products/popup/2-103x116.jpg" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb">
                            <img src="/front_template/images/products/popup/3-103x116.jpg" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb">
                            <img src="/front_template/images/products/popup/4-103x116.jpg" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                    </div>
                    <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                    <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-6 overflow-hidden p-relative">
            <div class="product-details scrollable pl-0">
                <h2 class="product-title">Electronics Black Wrist Watch</h2>
                <div class="product-bm-wrapper">
                    <figure class="brand">
                        <img src="/front_template/images/products/brand/brand-1.jpg" alt="Brand" width="102" height="48" />
                    </figure>
                    <div class="product-meta">
                        <div class="product-categories">
                            Category:
                            <span class="product-category"><a href="#">Electronics</a></span>
                        </div>
                        <div class="product-sku">
                            SKU: <span>MS46891340</span>
                        </div>
                    </div>
                </div>

                <hr class="product-divider">

                <div class="product-price">$40.00</div>

                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 80%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="#" class="rating-reviews">(3 Reviews)</a>
                </div>

                <div class="product-short-desc">
                    <ul class="list-type-check list-style-none">
                        <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                        <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                        <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                    </ul>
                </div>

                <hr class="product-divider">

                <div class="product-form product-variation-form product-color-swatch">
                    <label>Color:</label>
                    <div class="d-flex align-items-center product-variations">
                        <a href="#" class="color" style="background-color: #ffcc01"></a>
                        <a href="#" class="color" style="background-color: #ca6d00;"></a>
                        <a href="#" class="color" style="background-color: #1c93cb;"></a>
                        <a href="#" class="color" style="background-color: #ccc;"></a>
                        <a href="#" class="color" style="background-color: #333;"></a>
                    </div>
                </div>
                <div class="product-form product-variation-form product-size-swatch">
                    <label class="mb-1">Size:</label>
                    <div class="flex-wrap d-flex align-items-center product-variations">
                        <a href="#" class="size">Small</a>
                        <a href="#" class="size">Medium</a>
                        <a href="#" class="size">Large</a>
                        <a href="#" class="size">Extra Large</a>
                    </div>
                    <a href="#" class="product-variation-clean">Clean All</a>
                </div>

                <div class="product-variation-price">
                    <span></span>
                </div>

                <div class="product-form">
                    <div class="product-qty-form">
                        <div class="input-group">
                            <input class="quantity form-control" type="number" min="1" max="10000000">
                            <button class="quantity-plus w-icon-plus"></button>
                            <button class="quantity-minus w-icon-minus"></button>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cart">
                        <i class="w-icon-cart"></i>
                        <span>Add to Cart</span>
                    </button>
                </div>

                <div class="social-links-wrapper">
                    <div class="social-links">
                        <div class="social-icons social-no-color border-thin">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                            <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                        </div>
                    </div>
                    <span class="divider d-xs-show"></span>
                    <div class="product-link-wrapper d-flex">
                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                        <a href="#"
                           class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Quick view -->

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
