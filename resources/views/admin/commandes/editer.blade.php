@extends('admin.includes2')

@section('style_complementaire')

    <link rel="stylesheet" href="{{asset('assets/vendors/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/quill/quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/simplemde/simplemde.min.css')}}">

    <style>
        input,textarea{
            border-color: #222 !important;
        }
    </style>
@endsection

@section('body')


    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Details de la commande </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 col-sm-11">

                <div class="horizontal-steps mt-4 mb-4 pb-5" id="tooltip-container">
                    <div class="horizontal-steps-content">

                        <div class="step-item {{ ($la_commande->etat =='annuler' ) ? 'current' : '' }}  ">
                            <span>Annuler</span>
                        </div>
                        <div class="step-item {{ ($la_commande->etat =='echec_de_livraison' ) ? 'current' : '' }} ">
                            <span >Echec de Livraison</span>
                        </div>
                        <div class="step-item {{ ($la_commande->etat =='attente' ) ? 'current' : '' }} ">
                            <span>En Attente</span>
                        </div>
                        <div class="step-item {{ ($la_commande->etat =='emballer' ) ? 'current' : '' }}  ">
                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip"
                                  data-bs-placement="bottom" title="21/08/2018 11:32 AM">Emballer</span>
                        </div>
                        <div class="step-item {{ ($la_commande->etat =='livraison_en_cours' ) ? 'current' : '' }} ">
                            <span>Livraison en cours</span>
                        </div>
                        <div class="step-item {{ ($la_commande->etat =='livrer' ) ? 'current' : '' }}  ">
                            <span>Livrer</span>
                        </div>
                    </div>

                    <div class="process-line" style="width: 33%;"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        {!! Session::get('message','') !!}

        <a href="{{route('gestion_commande')}}" class="btn btn-outline-primary">Retour</a>

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3"> Information de Livraison </h4>

                        <h5>{{$la_commande->client->nom}}</h5>

                        <address class="mb-0 font-14 address-lg">
                            Adresse : {{$la_commande->client->adresse}}<br>
                            <abbr title="Telephone">Tel:</abbr> {{$la_commande->client->telephone}} <br/>
                            <abbr title="Email">Email:</abbr> {{$la_commande->client->email}}
                        </address>

                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-8">
                <form action="{{route('modifier_etat_commande',[$la_commande['id']])}}" method="post">
                    <div class="row pt-5">
                        <h3>Etat de la commande</h3>
                        <div class="col-md-4">
                            <select class="form-control text-capitalize" name="etat">
                                <option value="{{$la_commande['etat']}}"> {{str_replace('_',' ',$la_commande['etat'])}} </option>
                                <option value="attente"> Attente </option>
                                <option value="emballer"> Emballer </option>
                                <option value="livraison_en_cours"> Livraison en cours  </option>
                                <option value="livrer"> Livrer </option>
                                <option value="annuler"> Annuler </option>
                                <option value="echec_de_livraison"> Echec de livraison </option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            @csrf
                            <button type="submit" class="btn btn-warning"> <i class="mdi mdi-check-bold"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>




        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Produits Pour cette Commande #{{$la_commande['id']}}</h4>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>Produit</th>
                                    <th>Quantite</th>
                                    <th>Prix</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php  if($la_commande['panier']!=null){ $contenu_panier = json_decode($la_commande['panier']);}else{ $contenu_panier=[]; }   @endphp
                                    @foreach($contenu_panier as $item_article )
                                        <tr>
                                            <td>{{$item_article->titre}}</td>
                                            <td>{{$item_article->qte}}</td>
                                            <td> {{$item_article->prix}} </td>
                                            <td> <b> {{number_format( $item_article->prix_total,0,'',' ' ) }} F</b> </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->

                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Resumé de la Commande</h4>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>Description</th>
                                    <th>Valeur</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Nombre d'articles :</td>
                                    <td>{{$la_commande['nb_article']}}</td>
                                </tr>
                                <tr>
                                    <td>Grand Total :</td>
                                    <td> <b> {{number_format( $la_commande['valeur_total'],0,'',' ' ) }} F </b> </td>
                                </tr>
                                {{--<tr>
                                    <td>Estimated Tax : </td>
                                    <td>$19.22</td>
                                </tr>
                                <tr>
                                    <th>Total :</th>
                                    <th>$1683.22</th>
                                </tr>--}}
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->
@endsection


@section('script_complementaire')

    <script src="{{asset('assets/js/vendor.bundle.base.js')}}"></script>

    <script src="{{asset('assets/js/editorDemo.js')}}"></script>
    <script src="{{asset('assets/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendors/simplemde/simplemde.min.js')}}"></script>



    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <script src="{{asset('assets/js/settings.js')}}"></script>
    <script src="{{asset('assets/js/todolist.js')}}"></script>


    <script src="{{asset('assets/js/editorDemo.js')}}"></script>
@endsection
