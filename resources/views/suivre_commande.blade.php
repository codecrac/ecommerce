@extends('front_includes')


@section('style_complementaire')
    <style>
        .bordure_couper{
            border: 1px dashed #ccc;
            padding: 8px;
        }
        .cadre_orange{
            text-transform: uppercase;
            padding: 9px;
            background-color: #FFC74E;
            color: #000;
        }
    </style>
@endsection
@section('body')

    <!-- Start of Main -->
    <main class="main cart">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li></li>
                    <li>
                        <b class="amount cadre_orange">{{str_replace('_',' ',$resultat_commande['etat'])}}</b>
                    </li>
                    <li> </li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg mb-10">
                    <div class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar">
                            <div class="cart-summary mb-4">
                                <h3 class="cart-title text-uppercase">Resumée</h3>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between bordure_couper">
                                    <label class="ls-25">Commande :</label>
                                    <h6 class="product-subtotal">
                                        <br/>
                                        <b class="amount">#{{$mot_cle}}</b>
                                    </h6>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between bordure_couper">
                                    <label class="ls-25">Nombre article : </label>
                                    <h6 class="product-subtotal">
                                        <br/>
                                        <b class="amount">{{$resultat_commande['nb_article']}}</b>
                                    </h6>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between bordure_couper">
                                    <label class="ls-25">Grand total : </label>
                                    <h6 class="product-subtotal">
                                        <br/>
                                        <b class="amount">{{number_format($resultat_commande['valeur_total'],0,'',' ')}} F</b>
                                    </h6>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between bordure_couper">
                                    <label class="ls-25">Etat : </label>
                                    <h6 class="product-subtotal">
                                        <br/>
                                        <b class="amount cadre_orange">{{str_replace('_',' ',$resultat_commande['etat'])}}</b>
                                    </h6>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between bordure_couper">
                                    <label class="ls-25">Client : </label>
                                    <h6 class="product-subtotal">
                                        <br/>
                                        <b class="amount">{{$resultat_commande->client->nom}}</b>
                                    </h6>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between bordure_couper">
                                    <label class="ls-25">Adresse : </label>
                                    <h6 class="product-subtotal">
                                        <br/>
                                        <b class="amount">{{$resultat_commande->client->adresse}}</b>
                                    </h6>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 pr-lg-4 mb-6">
                        <table class="shop-table cart-table text-center">
                            <thead>
                            <tr>
                                <th class="product-name"><span>#</span></th>
                                <th>Produit</th>
                                <th class="product-price"><span>Prix</span></th>
                                <th class="product-quantity"><span>Quantite</span></th>
                                <th class="product-subtotal"><span>Sous total</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $contenu_panier = json_decode($resultat_commande->panier); @endphp
                                @foreach( $contenu_panier as $item_article)
                                    <tr style="border: 1px solid #ccc;padding: 2px">
                                        <td class="product-thumbnail">
                                            <div class="p-relative">
                                                <a href="product-default.html">
                                                    <figure>
                                                        <img src="{{Storage::url($item_article->image)}}" alt="product"
                                                             width="60" height="60">
                                                    </figure>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            {{$item_article->titre}}
                                        </td>
                                        <td class="product-subtotal"><span class="amount">{{number_format($item_article->prix,0,'',' ')}} F</span></td>
                                        <td class="product-quantity">
                                            <br/><h4>{{$item_article->qte}}</h4>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">{{number_format($item_article->prix_total,0,'',' ')}} F</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection
