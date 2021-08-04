{{--<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>--}}
@extends('admin.includes2')

@section('style_complementaire')
    <style>
        a{
            text-decoration: none;
            color: #fff;
        }
    </style>
@endsection

@section('body')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-5 col-lg-6">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Categories</h5>
                                <h3 class="mt-3 mb-3">{{$nb_menus_simples}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2"></span>
                                    <span class="text-nowrap"></span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Articles</h5>
                                <h3 class="mt-3 mb-3">{{$nb_article}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2"></span>
                                    <span class="text-nowrap"></span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-currency-usd widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Commandes en attentes </h5>
                                <h2 class="mt-3 mb-3" style="color: {{$nb_commandes>0?'red':''}}">{{$nb_commandes}}</h2>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2"></span>
                                    <span class="text-nowrap"></span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-pulse widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Growth">Client.e.s</h5>
                                <h3 class="mt-3 mb-3">{{$nb_client}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"></span>
                                    <span class="text-nowrap"></span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

            </div> <!-- end col -->

            <div class="col-xl-7 col-lg-6">
                <div class="card card-h-100">
                    <div class="card-body">
                        <h4 class="header-title mb-3 text-center">STATISTIQUES [ {{$periode_statistique}} ] </h4>

                        <form method="get" class="mt-2 mb-2">
                            <div class="row">
                                <div class="col-md-5">
                                    <h4>Debut</h4>
                                    <input type="date" name="date_debut" value="{{date('Y-m-d',strtotime($date_debut))}}" max="{{date('Y-m-d')}}" required class="form-control">
                                </div>
                                <div class="col-md-5">
                                    <h4>Fin</h4>
                                    <input type="date" name="date_fin" value="{{date('Y-m-d',strtotime($date_fin))}}" max="{{date('Y-m-d')}}" required class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <br/><br/>
                                    <button type="submit" href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-check-bold"></i></button>
                                </div>
                            </div>
                        </form>

                        <h5 class="mb-1 mt-0 fw-normal">Revenus ( commandes livrées ) </h5>
                        <div class="progress-w-percent">
                            @php $pourcentage = $nb_commande_periode_stat * $stat_cmd_liver /100 @endphp
                            <span class="progress-value fw-bold"> {{ number_format($stat_chiffre_affaire,0,'',' ') }} F</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar" role="progressbar" style="width: {{$pourcentage}}%;"
                                     aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <h5 class="mb-1 mt-0 fw-normal">Commandes</h5>
                        <div class="progress-w-percent">
                            <span class="progress-value fw-bold"> {{ number_format($nb_commande_periode_stat,0,'',' ') }} </span>
                            <div class="progress progress-sm">
                                <div class="progress-bar"
                                     role="progressbar" style="width: 100%;" aria-valuenow="72"
                                     aria-valuemin="0" aria-valuemax="100">

                                </div>
                            </div>
                        </div>

                        @php $pourcentage = $nb_commande_periode_stat * $stat_cmd_liver /100 @endphp
                        <h5 class="mb-1 mt-0 fw-normal">Livrée ({{$pourcentage}}%) </h5>
                        <div class="progress-w-percent">
                            <span class="progress-value fw-bold"> {{ number_format($stat_cmd_liver,0,'',' ') }}  </span>
                            <div class="progress progress-sm">
                                <div class="progress-bar" role="progressbar" style="width: {{$pourcentage}}%;" aria-valuenow="39"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>


                        @php $pourcentage = $nb_commande_periode_stat * $stat_cmd_annuler /100 @endphp
                        <h5 class="mb-1 mt-0 fw-normal">Annuler ({{$pourcentage}}%)</h5>
                        <div class="progress-w-percent">
                            <span class="progress-value fw-bold"> {{ number_format($stat_cmd_annuler,0,'',' ') }}  </span>
                            <div class="progress progress-sm">
                                <div class="progress-bar" role="progressbar" style="width: {{$pourcentage}}%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        @php $pourcentage = $nb_commande_periode_stat * $stat_cmd_echec_de_livraison /100 @endphp
                        <h5 class="mb-1 mt-0 fw-normal">Echec de livraisonAnnuler ({{$pourcentage}}%)</h5>
                        <div class="progress-w-percent">
                            <span class="progress-value fw-bold"> {{ number_format($stat_cmd_echec_de_livraison,0,'',' ')  }}  </span>
                            <div class="progress progress-sm">
                                <div class="progress-bar" role="progressbar" style="width: {{$pourcentage}}%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>



                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>

{{--TOP VENTES--}}
        <div class="offset-md-1 col-md-10">
            <div class="card card-h-100">
                <div class="card-body">
                    <h4 class="header-title mb-3 text-center">
                        Top 10 articles les plus demandés
                        <br/>
                        [ {{$periode_statistique}} ]
                    </h4>
                        <table class="table mb-0">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Produit</th>
                                        <th>Nombre commandes</th>
                                        <th>Valeur Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($top_10_ventes as $item_stat_achat )
                                        @php $id =$item_stat_achat['id_article']; $larticle = \App\Models\Article::find($id); @endphp
                                        <tr>
                                            <td> <img src="{{Storage::url($larticle['image'])}}" width="50" height="50" /></td>
                                            <td>{{$larticle->titre}}</td>
                                            <td>{{$item_stat_achat->nb_commande}}</td>
                                            <td> <b>{{number_format($item_stat_achat->revenu,0,'',' ')}} F</b> </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
{{--MESSAGE EQUIPE--}}
        <div class="offset-md-2 col-md-8">
            <div class="card card-h-100">
                <div class="card-body">
                    <h4 class="header-title mb-3 text-center">Message de l'equipe</h4>

                    <div dir="ltr">
                        <div class="apex-charts" data-colors="#727cf5,#e3eaef">
                            <h5 class="text-left">
                                En cas de :
                                <br/><br/>
                                <ul>
                                    <li class="mb-2">Dysfonctionnement de cette application,</li>
                                    <li class="mb-2">Necessité d'amelioration</li>
                                    <li class="mb-2">Besoin de nouvelle application web ou mobile,</li>
                                </ul>
                            </h5>

                            <h4 class="text-center">Contactez-nous <a target="_blank" style="color: #FFC74E" href="https://straton-system.com">ici</a> <h5>
                                    <br/>

                                    <h4 class="text-center">
                                        "La reconnaissance du travail bien fais est une récompense bien plus appreciée qu'un salaire."
                                    </h4>

                                    {{--<h4 class="text-center">
                                        "Il semble que la perfection soit atteinte non quand il n’y a plus
                                        rien à ajouter, mais quand il n’y a plus rien à retrancher."
                                    </h4>--}}

                                    <br/>
                                    <h6>STRATON SYSTEM</h6>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end row -->

    </div>
@endsection
