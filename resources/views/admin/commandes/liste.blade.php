@extends('admin.includes2')

@section('style_complementaire')
    <!-- Datatables css -->
    <link href="/assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
@endsection

@section('body')

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Commandes</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       {{-- <div class="row mb-2">
                            <div class="col-xl-8">
                                <form
                                    class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                    <div class="col-auto">
                                        <label for="inputPassword2" class="visually-hidden">Rechercher</label>
                                        <input type="search" class="form-control" id="inputPassword2"
                                               placeholder="Search...">
                                    </div>
                                    <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                            <label for="status-select" class="me-2">Statut</label>
                                            <select class="form-select" id="status-select">
                                                <option selected>Trier...</option>
                                                <option value="emballer"> Emballer </option>
                                                <option value="livraison_en_cours"> Livraison en cours  </option>
                                                <option value="livrer"> Livrer </option>
                                                <option value="annuler"> Annuler </option>
                                                <option value="echec_de_livraison"> Echec de livraison </option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>--}}

                        <div class="table-responsive">
                            <table id="basic-datatable" class="table table-centered mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Nombre articles</th>
                                    <th>Valeur Total</th>
                                    <th>Statut Commande</th>
                                    <th style="width: 125px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($liste_commande as $item_commande)
                                        <tr>
                                            <td>
                                                <span class="text-body fw-bold">#{{$item_commande['id']}}</span>
                                            </td>
                                            <td>
                                                {{date('d-m-Y'),strtotime($item_commande['created_at'])}} <small class="text-muted">{{date('H:m'),strtotime($item_commande['created_at'])}}</small>
                                            </td>
                                            <td class="text-center">
                                                <h5><span class="badge badge-success-lighten"><i class="mdi mdi-coin"></i> {{$item_commande['nb_article']}}</span>
                                                </h5>
                                            </td>
                                            <td>
                                                {{ number_format($item_commande['valeur_total'],0,'',' ') }} F
                                            </td>
                                            <td>
                                                @php
                                                    $color = ($item_commande['etat'] == 'annuler' || $item_commande['etat'] =='echec_de_livraison') ? 'danger' : 'info';
                                                     if($item_commande['etat'] == 'livrer'){$color = 'success';}
                                                @endphp
                                                <h5><span class="p-1 badge badge-{{$color}}-lighten text-capitalize ">{{str_replace('_',' ',$item_commande['etat'])}}</span></h5>
                                            </td>
                                            <td>
                                                <a href="{{route('details_commande',[$item_commande['id']])}}" class="action-icon"> <i
                                                        class="mdi mdi-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

@endsection

@section('script_complementaire')
    <script src="{{asset('assets/js/vendor/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.bootstrap4.js')}}"></script>
{{--    <script src="{{asset('assets/js/data-table.js')}}"></script>--}}
@endsection
