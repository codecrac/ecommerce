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
                <a href="{{route('gestion_publicite')}}" class="btn btn-outline-primary">Retour</a>
                <h3> Nouvelle publicite </h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('enregistrer_publicite')}}" enctype="multipart/form-data">

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
                                <h4>lien</h4>
                                <input name="lien" type="url" class="form-control" required />
                            </div>
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

