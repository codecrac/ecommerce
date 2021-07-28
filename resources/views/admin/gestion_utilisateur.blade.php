@extends('admin.includes2')

@section('style_complementaire')
    <style>
        a {
            text-decoration: none;
            color: #fff;
        }
    </style>
@endsection

@section('body')
    <h3>Gestion des utilisateurs</h3>

    {!! Session::get('message','') !!}

    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Autorisations section</th>
            <th>Autorisation action</th>
            <th>Actif</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        @foreach($liste_utilisateur as $item_utilisateur)
            <tr>
                <form method="post" action="{{route('modifier_permissions_utilisateur',[$item_utilisateur['id']])}}">
                    <td class="table-user">
                        {{$item_utilisateur['name']}}
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td><b>Page [ gestion d'articles ]</b> </td>
                                <td>
                                    <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                            required name="articles">
                                        <option value="{{$item_utilisateur['articles']}}">{{ $item_utilisateur['articles'] == 'true' ? 'Oui' : 'Non' }}</option>
                                        <option value="true">Oui</option>
                                        <option value="false">Non</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Publicite</b></td>
                                <td>
                                    <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                            required name="publicite">
                                        <option
                                            value="{{$item_utilisateur['publicite']}}">{{ $item_utilisateur['publicite'] == 'true' ? 'Oui' : 'Non' }}</option>
                                        <option value="true">Oui</option>
                                        <option value="false">Non</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Evenement</b> </td>
                                <td>
                                    <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                            required name="evenement">
                                        <option
                                            value="{{$item_utilisateur['evenement']}}">{{ $item_utilisateur['evenement'] == 'true' ? 'Oui' : 'Non' }}</option>
                                        <option value="true">Oui</option>
                                        <option value="false">Non</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Utilisateurs</b></td>
                                <td>
                                    <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                            required name="creer_utilisateurs">
                                        <option
                                            value="{{$item_utilisateur['creer_utilisateurs']}}">{{ $item_utilisateur['creer_utilisateurs'] == 'true' ? 'Oui' : 'Non' }}</option>
                                        <option value="true">Oui</option>
                                        <option value="false">Non</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td> <b>Ajouter</b></td>
                                <td>
                                    <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                            required name="ajouter">
                                        <option value="{{$item_utilisateur['ajouter']}}">{{ $item_utilisateur['ajouter'] == 'true' ? 'Oui' : 'Non' }}</option>
                                        <option value="true">Oui</option>
                                        <option value="false">Non</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <b>Modifier</b> </td>
                                <td>
                                    <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                            required name="modifier">
                                        <option value="{{$item_utilisateur['modifier']}}">{{ $item_utilisateur['modifier'] == 'true' ? 'Oui' : 'Non' }}</option>
                                        <option value="true">Oui</option>
                                        <option value="false">Non</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <b>Supprimer</b> </td>
                                <td>
                                    <select class="shadow-none pr-7 border-0 form-control-line searchable-select"
                                            required name="effacer">
                                        <option value="{{$item_utilisateur['effacer']}}">{{ $item_utilisateur['effacer'] == 'true' ? 'Oui' : 'Non' }}</option>
                                        <option value="true">Oui</option>
                                        <option value="false">Non</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#centermodal_{{$item_utilisateur['id']}}">
                            {{$item_utilisateur['actif'] =='true' ? 'Oui' : "Non" }}
                        </button>
                    </td>
                    <td class="table-action">
                        @if( Auth::user()->effacer =='true' )
                            @method('put')
                            @csrf
                            <button type="submit" href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-check-bold"></i></button>
                        @endif
                    </td>
                </form>
            </tr>

            <!-- Center modal content -->
            <div class="modal fade" id="centermodal_{{$item_utilisateur['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myCenterModalLabel">Effacer</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('desactiver_utilisateur',[$item_utilisateur['id']])}}">

                                <h3 class="text-capitalize">{{$item_utilisateur['name']}} </h3> a toujours le droit de se connecter ?
                                <div class="col-md-10">
                                    <select name="actif" class="form-control m-4">
                                        <option value="true"> Oui </option>
                                        <option value="false"> Non </option>
                                    </select>
                                </div>

                                <div class="text-right">
                                    @if( Auth::user()->modifier =='true' )
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Enregistrer</button>
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        @endforeach
        </tbody>
    </table>
@endsection
