@extends('admin.includes2')

@section('style_complementaire')

    <style>
        input,textarea{
            border-color: #222 !important;
        }
    </style>
@endsection

@section('body')

    <div class="content-wrapper">
        <div class="page-header">

        </div>

        <div class="card">
            <div class="card-header">
                {!! Session::get('message','') !!}
                <a href="{{route('gestion_article',[$le_menu->id])}}" class="btn btn-outline-primary">Retour</a>
                <h3> Nouvel article dans : {{$le_menu->parent['titre']}}/{{$le_menu['titre']}} </h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('enregistrer_article',[$le_menu['id']])}}" enctype="multipart/form-data">

                    <div class="row grid-margin">

                        <div class="form-group col-12">
                            <div class="row">
                                <h4>Image Illustration</h4>
                                <input type="file" name="image" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group col-12 pt-3">
                            <div class="row">
                                <h4>Titre</h4>
                                <input name="titre" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group col-12 pt-3">
                            <div class="row">
                                <h4>Prix</h4>
                                <input type="number" name="prix" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group col-12 pt-3">
                            <div class="row">
                                <h4>Prix Promo (facultatif) </h4>
                                <input type="number" name="prix_promo" class="form-control"  />
                            </div>
                        </div>

                        <div class="form-group col-12 pt-3">
                            <div class="row">
                                <h4>Extrait</h4>
                                <textarea name="extrait" class="form-control" maxlength="250" required></textarea>
                            </div>
                        </div>


                        <div class="col-lg-12 pt-3">
                            <h4 class="card-title">Corps de l'article</h4>
                            <textarea id="summernote" name="contenu" required></textarea>
                        </div>
                    </div>
                    @if( Auth::user()->ajouter =='true' )
                        @csrf
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    @endif
                </form>
            </div>
        </div>

    </div>
@endsection

