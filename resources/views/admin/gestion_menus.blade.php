
@extends('admin.includes2')

@section('style_complementaire')

    <link rel="stylesheet" href="{{asset('purple_template/vendors/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('purple_template/vendors/quill/quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('purple_template/vendors/simplemde/simplemde.min.css')}}">

    <style>
        input,textarea{
            border-color: #222 !important;
        }
    </style>
@endsection

@section('body')
    <div class="content-wrapper">
        <div class="page-header">
            <h3>Gestions de la barre de menu </h3>
        </div>

        {{--        MENU--}}
        {!! Session::get('message','')!!}
        <div class="row">
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-capitalize table-bordered p-3">Menu principal</h4>

{{--                        <h4 class="bold"> Menu Principale</h4>--}}

                        <!--************a cloner*************-->
                        <div class="hidden" style="display: none">
                            <table>
                                <tbody>
                                <tr id="la_ligne_ensemble">
                                    <td>
                                         <input required type="text" class="form-control" name="titre_menu[]" required>
                                    </td>
                                    <td>
                                        <select name="type[]" class="form-control" required>
                                            <option value>Type</option>
                                            <option value="parent">Menu parent</option>
                                            <option value="menu_simple">Menu simple</option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <form  method="post" action="{{route('ajouter_menu')}}">
                            <table class="text-center table table-striped table-bordered">
                                <thead>
                                    <th>Titre</th>
                                    <th>Type</th>
                                </thead>
                                <tbody id="le_corps_de_la_table_ensemble">
                                <tr>
                                    <td>
                                         <input required type="text" name="titre_menu[]" class="form-control" required>
                                    </td>
                                    <td>
                                        <select name="type[]" class="form-control" required>
                                            <option value>Type</option>
                                            <option value="parent">Menu parent</option>
                                            <option value="menu_simple">Menu simple</option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            <button type="button" class="btn btn-outline-dark"
                                                    onclick="addNewRow('ensemble')">+
                                            </button>
                                        </th>
                                        <th>
                                            <button type="button" class="btn btn-outline-dark"
                                                    onclick="removeLastRow('ensemble')">-
                                            </button>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>


                            <br/>
                             <input required type="hidden" value name="id_parent">

                            @if( Auth::user()->ajouter =='true' )
                                <h3 class="text-center">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Enregistrer</button>
                                </h3>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-capitalize">Liste menu principaux</h4>
                        <table class="table table-bordered">
                            <thead>
                            <th> Titre</th>
                            <th> Type</th>
                            <th> #</th>
                            </thead>
                            <tbody>
                            @foreach($liste_menus_principaux as $item_menus)
                                <tr>
                                    <td>{{$item_menus['titre']}}</td>
                                    <td>{{$item_menus['type']}}</td>
                                    <td>

                                        <!-- Button trigger modal -->
                                        @if( Auth::user()->modifier =='true' )
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editer-menu-{{$item_menus['id']}}">
                                                Editer
                                            </button>
                                        @endif

                                        @if( Auth::user()->effacer =='true' )
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimer-menu-{{$item_menus['id']}}">
                                                x
                                            </button>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Modal EDITER  -->
                                <div class="modal fade" id="editer-menu-{{$item_menus['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <form method="post" action="{{route('modifier_menu',[$item_menus['id']])}}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                     <input required class="form-control" type="text" name="titre_menu" value="{{$item_menus['titre']}}">
                                                </div>
                                                <div class="modal-footer">
                                                    @if( Auth::user()->modifier =='true' )
                                                        @method('put')
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Modal SUPPRIMER-->
                                <div class="modal fade" id="supprimer-menu-{{$item_menus['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{route('supprimer_menu',[$item_menus['id']])}}" method="post">
                                                <div class="modal-body">
                                                    <h3>Confirmez la suppression du menu <br/> <b>{{$item_menus['titre']}}</b> ? </h3>
                                                </div>
                                                <div class="modal-footer">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

{{--        SOUS MENU=======================================================--}}
{{--        SOUS MENU=======================================================--}}
        <div class="row">
            <div class="offset-md-3 col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-capitalize">Gestion des sous-menus</h4>


{{--                        <h4 class="bold"> Sous-Menu</h4>--}}

                        <!--************a cloner*************-->
                        <div class="hidden" style="display: none">
                            <table class="table table-bordered">
                                <tbody>
                                <tr id="la_ligne_sous_menus">
                                    <td>
                                         <input required type="text" name="titre_menu[]" class="form-control">
                                         <input required type="hidden" value="menu_simple" name="type[]">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

{{--                        {!! Session::get('message','')!!}--}}
                        <form  method="post" action="{{route('ajouter_menu')}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <br/>
                                    <h4 class="text-right">Menu parent</h4>
                                </div>
                                <div class="col-md-6">
                                    <select name="id_parent" class="form-control" required>
                                        <option value>choisissez</option>
                                        @foreach($liste_menus_parent as $item_menus_parent)
                                            <option value="{{$item_menus_parent['id']}}"> {{$item_menus_parent['titre']}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>Titre sous-menu</th>
                                </thead>

                                <tbody id="le_corps_de_la_table_sous_menus">
                                    <tr>
                                        <td>
                                             <input required type="text" name="titre_menu[]" class="form-control">
                                             <input required type="hidden" value="menu_simple" name="type[]" class="form-control">
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-outline-dark" onclick="addNewRow('sous_menus')">+</button>
                                            <button type="button" class="btn btn-outline-dark" onclick="removeLastRow('sous_menus')">-</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <br/>

                            @if( Auth::user()->ajouter =='true' )
                                @csrf
                                <h3 class="text-center">
                                    <button type="submit" class="btn btn-success">Enregistrer</button>
                                </h3>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-1 col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-capitalize">Liste sous-menu</h4>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <th> Parent</th>
                            <th> Sous-menu</th>
                            </thead>
                            <tbody>
                            @foreach($liste_menus_parent as $item_menus_parent)
                                <tr>
                                    <td>{{$item_menus_parent['titre']}}</td>
                                    <td>
                                        @foreach($item_menus_parent->enfants as $item_sous_menu)
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td class="col-6"> {{$item_sous_menu['titre']}} </td>
                                                    <td class="col-6">
                                                        @if( Auth::user()->modifier =='true' )
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editer-menu-{{$item_sous_menu['id']}}">
                                                                Editer
                                                            </button>
                                                        @endif

                                                        @if( Auth::user()->effacer =='true' )
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimer-menu-{{$item_sous_menu['id']}}">
                                                                x
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>



                                            <!-- Modal EDITER  -->
                                            <div class="modal fade" id="editer-menu-{{$item_sous_menu['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <form method="post" action="{{route('modifier_menu',[$item_sous_menu['id']])}}">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Edition</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input required class="form-control" type="text" name="titre_menu" value="{{$item_sous_menu['titre']}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                @if( Auth::user()->modifier =='true' )
                                                                    @method('put')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Modal SUPPRIMER-->
                                            <div class="modal fade" id="supprimer-menu-{{$item_sous_menu['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('supprimer_menu',[$item_sous_menu['id']])}}" method="post">
                                                            <div class="modal-body">
                                                                <h3>Confirmez la suppression du sous menu <br/> <b>{{$item_sous_menu['titre']}}</b> ? </h3>
                                                            </div>
                                                            <div class="modal-footer">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_complementaire')

    <script>

        function addNewRow(id) {
            var la_ligne = document.getElementById("la_ligne_" + id);
            // alert(la_ligne);
            var le_corps_de_la_table = document.getElementById("le_corps_de_la_table_" + id);
            var le_clone = la_ligne.cloneNode(true);
            le_clone.id = "";
            le_corps_de_la_table.appendChild(le_clone);

        }

        function removeLastRow(id) {
            var le_corps_de_la_table = document.getElementById("le_corps_de_la_table_" + id);
            var rowCount = le_corps_de_la_table.rows.length;
            if (rowCount > 1) {
                le_corps_de_la_table.deleteRow(rowCount - 1);
            }
        }
    </script>
@endsection
