@extends('admin.includes2')

@section('body')

    <div class="content-wrapper">
        <div class="page-header">

        </div>
        <div class="card">
            <div class="card-body">
                {!! Session::get('message','') !!}
                <h2 class="card-title"> {{$le_menu['titre']}} </h2>

                @if( Auth::user()->ajouter =='true' )
                    <a href="{{route('ajouter_article',[$le_menu['id']])}}" class="btn btn-primary">Nouvel article</a>
                @endif

                <div class="row">
                    <div class="col-12">
                        <table id="order-listing" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Prix</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($liste_article_menu as $item_article)
                                <tr>
{{--                                    <td><img src="data:image/jpeg;base64,{{$item_article['image']}}" width="50px" height="50px" /></td>--}}
                                    <td><img src="{{Storage::url($item_article['image'])}}" width="50px" height="50px" /></td>
                                    <td>{{$item_article['titre']}}</td>
                                    <td>
                                        @if( $item_article['prix_promo'] !=null && !empty($item_article['prix_promo']) )
                                            <strike > {{$item_article['prix']}} </strike>
                                            <h5>{{$item_article['prix_promo']}} F</h5>
                                        @else
                                            <h5>{{$item_article['prix']}} F</h5>
                                        @endif
                                    </td>
                                    <td>
                                        @if( Auth::user()->modifier =='true' )
                                            <a href="{{route('editer_article',[$item_article['id']])}}" class="btn btn-outline-primary">Editer</a>
                                        @endif
                                        @if( Auth::user()->effacer =='true' )
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimer-article-{{$item_article['id']}}">
                                                x
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Modal SUPPRIMER-->
                                <div class="modal fade" id="supprimer-article-{{$item_article['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{route('supprimer_article',[$item_article['id']])}}" method="post">
                                                <div class="modal-body">
                                                    <h3>Supprimer l'article : <br/> <b>{{$item_article['titre']}}</b> ? </h3>
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
    </div>
@endsection

@section('script_complementaire')
    <script src="{{asset('purple_template/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('purple_template/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('purple_template/js/data-table.js')}}"></script>
@endsection
