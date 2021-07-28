@extends('admin.includes2')

@section('body')

    <div class="content-wrapper">
        <div class="page-header">

        </div>
        <div class="card">
            <div class="card-body">
                {!! Session::get('message','') !!}
                <h2 class="card-title"> publicites </h2>
                @if( Auth::user()->ajouter =='true' )
{{--                    <a href="{{route('ajouter_publicite')}}" class="btn btn-primary">Nouvelle publicite</a>--}}
                @endif
                <div class="row">
                    <div class="col-12">
                        <table id="order-listing" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($liste_publicite_menu as $item_publicite)
                                <tr>
{{--                                    <td><img src="data:image/jpeg;base64,{{$item_publicite['image']}}" width="50px" height="50px" /></td>--}}
                                    <td><img src="{{Storage::url($item_publicite['image'])}}" width="50px" height="50px" /></td>
                                    <td>{{$item_publicite['titre']}}</td>
                                    <td>
                                        @if( Auth::user()->modifier =='true' )
                                            <a href="{{route('editer_publicite',[$item_publicite['id']])}}" class="btn btn-outline-primary">Gerer</a>
                                        @endif
                                        @if( Auth::user()->effacer =='true' )
                                            {{--<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimer-menu-{{$item_publicite['id']}}">
                                                x
                                            </button>--}}
                                        @endif
                                    </td>
                                </tr>
                                <!-- Modal SUPPRIMER-->
                                <div class="modal fade" id="supprimer-menu-{{$item_publicite['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{route('supprimer_publicite',[$item_publicite['id']])}}" method="post">
                                                <div class="modal-body">
                                                    <h3>Confirmez la suppression du menu <br/> <b>{{$item_publicite['titre']}}</b> ? </h3>
                                                </div>
                                                <div class="modal-footer">
                                                    @if( Auth::user()->effacer =='true' )
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                    @endif
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
    </div>
@endsection

@section('script_complementaire')
    <script src="{{asset('purple_template/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('purple_template/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('purple_template/js/data-table.js')}}"></script>
@endsection
