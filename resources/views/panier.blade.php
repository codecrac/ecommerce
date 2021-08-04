@extends('front_includes')

@section('body')

    <!-- Start of Main -->
    <main class="main cart">
        <!-- Start of Breadcrumb -->

        {!! Session::get('message','') !!}

        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li></li>
                    <li>
                        <b class="amount cadre_orange">Mon Panier</b>
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
                    <div class="col-md-12 pr-lg-4 mb-6">
                        <form method="post" action="{{route('update_panier')}}">
                            <table class="table table-bordered text-center">
                                <thead class="mb-7">
                                <tr>
                                    <th class="product-price"><span>Produit</span></th>
                                    <th class="product-name"><span>Prix</span></th>
                                    <th class="product-name"><span>Quantite</span></th>
                                    <th class="product-subtotal"><span>Sous-total</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $contenu_panier = $le_panier['contenu']; $i=0; @endphp
                                    @foreach($contenu_panier as $item_article)
                                         <tr style="border-top: 1px solid #ccc">
                                            <td class="product-thumbnail" style="padding:10px 0px">
                                                <div class="row">

                                                    <div class="col-md-3">
                                                        <a href="{{route('retirer_du_panier',[$i++])}}" class="btn btn-close"><i class="fas fa-times"></i></a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="#">
                                                            <figure>
                                                                <img src="{{Storage::url($item_article['image'])}}" alt="product" width="80" height="80">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <br/>
                                                        <span class="amount">{{$item_article['titre']}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product-name">
                                                <span class="amount"> {{number_format($item_article['prix'],0,'',' ')}} F </span>
                                            </td>
                                            <td class="">
                                                <div class="input-group">
                                                    <input class="form-control" name="qte[]" type="number" min="1" value="{{$item_article['qte']}}" max="100000">
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">{{number_format($item_article['prix_total'],0,'',' ')}} F</span>
                                            </td>
                                         </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="cart-action row mt-4">
                                <div class="col-md-5 text-right">
                                    <a href="{{route('accueil')}}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i
                                            class="w-icon-long-arrow-left"></i>Continuer mes achats</a>
                                </div>
                                <div class="offset-md-1 col-md-5 text-right">
                                    @csrf
                                    <a href="{{route('vider_le_panier')}}" class="btn btn-rounded btn-danger" name="update_cart"
                                            value="Update Cart">Vider le panier
                                    </a>

                                    <button type="submit" class="btn btn-rounded btn-update" name="update_cart"
                                            value="Update Cart">Metter à jour le panier
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="col-md-5 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar">
                            <div class="cart-summary mb-4">
                                <h3 class="cart-title text-uppercase">Finaliser ma commande</h3>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Total</label>
                                    <span class="product-price"> {{number_format($le_panier['grand_total'],0,'',' ')}} F </span>
                                </div>

                                <hr class="divider">
                                <h3 class="cart-title text-uppercase">Mes Informations</h3>

                                <form method="post" action="{{route('enregistrer_commande')}}">
                                        <h5> Nom complet </h5>
                                        <input class="form-control" type="text" name="nom_complet" value="{{$infos_client->nom}}" required>
                                    <br/>
                                        <h5> Telephone </h5>
                                        <input class="form-control" type="number" name="telephone" required value="{{$infos_client->telephone}}">
                                    <br/>
                                        <h5> Ou souhaitez-vous être livrer ? </h5>
                                        <input class="form-control" type="text" name="adresse" required  value="{{$infos_client->adresse}}">
                                    <br/>
                                        <h5> Email </h5>
                                        <input class="form-control" type="email" name="email" required  value="{{$infos_client->email}}">
                                    <br/>
                                        <h5 style="display: none"> Mot de passe </h5>
                                        <input style="display: none" class="form-control" type="password" name="mot_de_passe" value="djd" required>



                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Total</label>
                                        <span class="product-price"> {{number_format($le_panier['grand_total'],0,'',' ')}} F </span>
                                    </div>


                                    @csrf
                                    <button type="submit" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                        Confirmer ma commande
                                        <i class="w-icon-long-arrow-right"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->


@endsection

@section('script_complementaire')
    <script src="/front_template/vendor/sticky/sticky.min.js"></script>
@endsection
