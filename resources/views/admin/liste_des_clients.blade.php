@extends('admin.includes2')

@section('body')

    <div class="content-wrapper">
        <div class="page-header">

        </div>
        <div class="card">
            <div class="card-body">
                {!! Session::get('message','') !!}
                <h2 class="card-title"> Liste des clients </h2>

                <div class="row">
                    <div class="col-12 mt-4">
                        <table id="basic-datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Nom complet</th>
                                <th>email</th>
                                <th>Telephones</th>
                                <th>Adresse</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($liste_des_clients as $item)
                                <tr>
{{--                                    <td><img src="data:image/jpeg;base64,{{$item_article['image']}}" width="50px" height="50px" /></td>--}}
                                    <td>{{$item['nom']}}</td>
                                    <td>{{$item['email']}}</td>
                                    <td>{{$item['telephone']}}</td>
                                    <td>{{$item['adresse']}}</td>
                                </tr>
                                <!-- Modal SUPPRIMER-->
                           {{--     <div class="modal fade" id="supprimer-article-{{$item_article['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                </div>--}}

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
