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
                <h3> Nouvel evenement </h3>
                <a href="{{route('gestion_evenement')}}" class="btn btn-outline-primary">Retour</a>

            </div>
            <div class="card-body">
                <form method="post" action="{{route('enregistrer_evenement')}}" enctype="multipart/form-data">

                    <div class="row grid-margin">

                        <div class="form-group pt-3 col-12">
                            <div class="row">
                                <h4>Image Illustration</h4>
                                <input type="file" name="image" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group pt-3 col-12 pt-3">
                            <div class="row">
                                <h4>Titre</h4>
                                <input name="titre" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group pt-3 col-12 pt-3">
                            <div class="row">
                                <h4>Date</h4>
                                <input name="date_evenement" type="date" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group pt-3 col-12 pt-3">
                            <div class="row">
                                <h4>Auteur</h4>
                                <select class="form-control" name="auteur">
                                    @foreach($liste_utilisateur as $item)
                                        <option value="{{$item['id']}}"> {{$item['name']}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 pt-3">
                            <h4 class="card-title">Corps de l'evenement</h4>
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

