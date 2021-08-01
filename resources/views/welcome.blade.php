@extends('front_includes')

@section('body')

    <!-- Start of Main -->
    <main class="main">

{{--        Categorie en evidence--}}
            <div class="row grid grid-float pt-2 banner-grid mb-9 appear-animate">
{{--                UN--}}
                <div class="grid-item col-lg-6 height-x2">
                    <div class="banner banner-fixed banner-lg br-sm">
                        <figure>
                            <img src="{{Storage::url($mis_en_avant_un['image_illustration'])}}" alt="Banner" width="670"
                                 height="450" style="background-color: #E3E7EA;" />
                        </figure>
                        <div class="banner-content y-50" style="background-color: #28292daa;padding: 10%;border-radius: 5px">

                            <h3 class="banner-title text-capitalize text-white">{{$mis_en_avant_un['titre']}}</h3>
                            @if($mis_en_avant_un['etat_promotion'] =='true' )
                                <h5 class="banner-subtitle text-capitalize font-weight-normal mb-0 ls-25 text-white text-right">
                                    <small>Vente flash</small> <strong class="text-secondary text-uppercase">-{{$mis_en_avant_un['reduction']}}%</strong>
                                </h5>
                            @endif
                            <br/>
                            <a href="demo9-shop.html" class="btn btn-white btn-outline btn-rounded btn-icon-right">
                                Decouvrir<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
{{--                DEUX--}}
                <div class="grid-item col-lg-6 height-x1">
                    <div class="banner banner-fixed banner-md br-sm">
                        <figure>
                            <img src="{{Storage::url($mis_en_avant_deux['image_illustration'])}}" alt="Banner" width="670"
                                 height="450" style="background-color: #2D2E32;" />
                        </figure>
                        <div class="banner-content" style="background-color: #28292daa;padding:4%;border-radius: 5px">
                            <h3 class="banner-title text-white ls-25">
                                {{$mis_en_avant_deux['titre']}}
                                    @if($mis_en_avant_deux['etat_promotion'] =='true' )
                                        ( {{$mis_en_avant_deux['reduction']}}% )
                                    @endif
                            </h3>
                            <a href="demo9-shop.html" class="btn btn-white btn-link btn-underline btn-icon-right">
                                Acheter maintenant<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
{{--                TROIS--}}
                <div class="grid-item col-sm-6 col-lg-3 height-x1">
                    <div class="banner banner-fixed banner-sm br-sm">
                        <figure>
                            <img src="{{Storage::url($mis_en_avant_trois['image_illustration'])}}" alt="Banner" width="330"
                                 height="215" style="background-color: #181818;" />
                        </figure>
                        <div class="banner-content x-50 y-50 w-100 text-center" style="background-color: #28292daa;padding:4%;border-radius: 5px">
                            <h4 class="text-white">{{$mis_en_avant_trois['titre']}}</h4>
                            @if($mis_en_avant_trois['etat_promotion'] =='true' )
                                <div class="banner-price-info font-weight-normal text-white mb-3">
                                    jusqu'a <strong class="text-uppercase">{{$mis_en_avant_trois['reduction']}}% de reduction</strong>
                                </div>
                            @endif

                            <a href="demo9-shop.html" class="btn btn-white btn-link btn-underline"> Decouvrir la Collection</a>
                        </div>
                    </div>
                </div>
{{--                QUATRE--}}
                <div class="grid-item col-sm-6 col-lg-3 height-x1">
                    <div class="banner banner-fixed banner-sm br-sm">
                        <figure>
                            <img src="{{Storage::url($mis_en_avant_quatre['image_illustration'])}}" alt="Banner" width="330"
                                 height="215" style="background-color: #A3A8A6;" />
                        </figure>
                        <div class="banner-content" style="background-color: #28292daa;padding:4%;border-radius: 5px">
                            @if($mis_en_avant_deux['etat_promotion'] =='true' )
                                <h5 class="banner-subtitle text-uppercase font-weight-bold">
                                    {{$mis_en_avant_deux['reduction']}}% de reduction
                                </h5>
                            @endif
                            <h3 class="banner-title text-capitalize ls-25 text-white"> {{$mis_en_avant_quatre['titre']}} </h3>
                            <a href="#" class="btn btn-white btn-link btn-underline btn-icon-right">
                                Voir les articles <i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Banner Grid -->

            <div class="row appear-animate">
                <div class="col-lg-4 col-md-5 mb-6">
                    <div class="product-lg br-sm">
                        <h2 class="title title-underline mb-4">Deals Of The Week</h2>
                        <div class="owl-carousel owl-theme owl-nav-top owl-nav-md row cols-1" data-owl-options="{
                                'nav': true,
                                'dots': false,
                                'margin': 20
                            }">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="/front_template/images/demos/demo9/product/5-1-1.jpg" alt="Product"
                                             width="800" height="900" />
                                        <img src="/front_template/images/demos/demo9/product/5-1-2.jpg" alt="Product"
                                             width="800" height="900" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="product-default.html">Mobile Electronic Recorder</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">$95.72</ins><del class="old-price">$97.15</del>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product -->
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="/front_template/images/demos/demo9/product/5-2-1.jpg" alt="Product"
                                             width="800" height="900" />
                                        <img src="/front_template/images/demos/demo9/product/5-2-2.jpg" alt="Product"
                                             width="800" height="900" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="product-default.html">USB Charger</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">$129.62</ins><del class="old-price">$133.36</del>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product -->
                        </div>
                        <!-- End of Owl Carousel -->
                        <div class="product-countdown-container">
                            <div class="countdown-lable mr-3 mb-2">
                                <h4 class="font-weight-bold ls-10">Hurry up!</h4>
                                <label class="text-dark">Offer end in:</label>
                            </div>
                            <div class="product-countdown countdown-compact mb-2" data-until="2021, 9, 9"
                                 data-format="DHMS" data-compact="false" data-labels-short="Days, Hours, Mins, Secs">
                                00:00:00:00
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Col -->
                <div class="col-lg-8 col-md-7 mb-6">
                    <div class="tab tab-nav-underline tab-nav-center">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab-1">Featured</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-2">On Sale</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-3">Top Rated</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-1">
                            <div class="owl-carousel owl-theme row cols-lg-4 cols-sm-3 cols-2" data-owl-options="{
                                    'nav': false,
                                    'dots': true,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 2
                                        },
                                        '576': {
                                            'items': 3
                                        },
                                        '992': {
                                            'items': 4
                                        }
                                    }
                                }">
                                <div class="product-col">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-3.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Gold Watch</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$41.36</ins><del
                                                    class="old-price">$48.82</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-7.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Comfortable Backpack</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$138.05</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                </div>
                                <div class="product-col">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-4.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Brown Leather Shoes</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$70.28</ins><del
                                                    class="old-price">$75.32</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-8.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Comfortable Armchair</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$290.05</ins><del
                                                    class="old-price">$302.74</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                </div>
                                <div class="product-col">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-5.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Men's Suede Belt</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$37.19</ins><del
                                                    class="old-price">$40.57</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-9.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Prtable Torch</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$10.73</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                </div>
                                <div class="product-col">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-6.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Wooden Chair</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$40.21</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-10.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Top Men's Hiking Hat</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$20.84</ins><del
                                                    class="old-price">$25.92</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                </div>
                            </div>
                        </div>
                        <!-- End of Tab Pane -->
                        <div class="tab-pane" id="tab-2">
                            <div class="owl-carousel owl-theme row cols-xl-4 cols-lg-3 cols-md-2" data-owl-options="{
                                    'nav': false,
                                    'dots': true,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 2
                                        },
                                        '576': {
                                            'items': 3
                                        },
                                        '992': {
                                            'items': 4
                                        }
                                    }
                                }">
                                <div class="product-col">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-9.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Prtable Torch</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$10.73</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-7.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Comfortable Backpack</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$138.05</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                </div>
                                <div class="product-col">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-4.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Brown Leather Shoes</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$70.28</ins><del
                                                    class="old-price">$75.32</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-5.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Men's Suede Belt</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$37.19</ins><del
                                                    class="old-price">$40.57</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                </div>
                                <div class="product-col">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-10.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Top Men's Hiking Hat</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$20.84</ins><del
                                                    class="old-price">$25.92</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-8.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Comfortable Armchair</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$290.05</ins><del
                                                    class="old-price">$302.74</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                </div>
                                <div class="product-col">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-6.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Wooden Chair</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$40.21</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-3.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Gold Watch</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$41.36</ins><del
                                                    class="old-price">$48.82</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                </div>
                            </div>
                        </div>
                        <!-- End of Tab Pane -->
                        <div class="tab-pane" id="tab-3">
                            <div class="owl-carousel owl-theme row cols-xl-4 cols-lg-3 cols-md-2" data-owl-options="{
                                    'nav': false,
                                    'dots': true,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 2
                                        },
                                        '576': {
                                            'items': 3
                                        },
                                        '992': {
                                            'items': 4
                                        }
                                    }
                                }">
                                <div class="product-col">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-8.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Comfortable Armchair</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$290.05</ins><del
                                                    class="old-price">$302.74</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-7.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Comfortable Backpack</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$138.05</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                </div>
                                <div class="product-col">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-9.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Prtable Torch</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$10.73</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-3.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Gold Watch</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$41.36</ins><del
                                                    class="old-price">$48.82</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                </div>
                                <div class="product-col">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-5.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Men's Suede Belt</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$37.19</ins><del
                                                    class="old-price">$40.57</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-6.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Wooden Chair</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$40.21</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                </div>
                                <div class="product-col">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-10.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Top Men's Hiking Hat</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$20.84</ins><del
                                                    class="old-price">$25.92</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/front_template/images/demos/demo9/product/5-4.jpg" alt="Product"
                                                     width="800" height="900" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                   title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="product-default.html">Brown Leather Shoes</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">$70.28</ins><del
                                                    class="old-price">$75.32</del>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Product -->
                                </div>
                            </div>
                        </div>
                        <!-- End of Tab Pane -->
                    </div>
                </div>
                <!-- End of Col -->
            </div>
            <!-- End of Row -->


{{--        Categorie presente sur accueil--}}
        <div class="container">
            @foreach($menus_pricipaux as $item_menu_parent)
                <div class="filter-with-title title-underline mb-4 pb-2 appear-animate">
                    <h2 class="title"> {{$item_menu_parent['titre']}} </h2>

                        <ul class="nav-filters" data-target="#products-{{$item_menu_parent['id']}}">
                            <li><a href="#" class="nav-filter active" data-filter="*"> Tous </a></li>
                            @foreach($item_menu_parent->enfants as $item_categorie)
                                <li>
                                    <a href="#" class="nav-filter" data-filter=".1-{{$item_categorie['id']}}">
                                        {{$item_categorie['titre']}}
                                        @if($item_categorie->etat_promotion =='true')
                                            [ -{{$item_categorie->reduction}}% ]
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                </div>
                <!-- End of Filter With Title -->
                <div class="row grid cols-xl-5 cols-md-4 cols-sm-3 cols-2 appear-animate" id="products-{{$item_menu_parent['id']}}">

                    @foreach($item_menu_parent->enfants as $item_categorie)
                            @foreach($item_categorie->articles as $item_article)
                            <div class="grid-item 1-{{$item_categorie['id']}}">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{route('lire_article',[$item_article['id']])}}">
                                            <img src="{{Storage::url($item_article['image'])}}" alt="Product" width="600"
                                                 height="675" />
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart" onclick="ajouter_au_panier({{$item_article['id']}})"></a>
                                           {{-- <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                               title="Quick View"></a>--}}
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-name">
                                            <a class="product-title" href="{{route('lire_article',[$item_article['id']])}}"> {{$item_article['titre']}} </a>
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
                                    </div>
                                </div>
                                <!-- End of Product -->
                            </div>
                        @endforeach
                    @endforeach

                    <div class="grid-space col-xl-5col col-1"></div>
                </div>
                <!-- End of Grid -->
                @endforeach
        </div>
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
                    // alert (response);
                    // $('.btn-cart').click();
                }
            })
        }
    </script>

@endsection
