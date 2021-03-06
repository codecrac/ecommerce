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

        </div>

        <div class="card">
            <div class="card-header">
                {!! Session::get('message','') !!}
                <a href="{{route('gestion_article',[$larticle->categorie_parente->id])}}" class="btn btn-outline-primary">Retour</a>
                <h3> Modifier un article</h3>
            </div>
            <div class="card-body">


                <div class="row">
                    @foreach($larticle->photos_en_plus as $item_image)
                        <div style="border: 1px solid #ccc" class="col-md-3">
                            <form method="post" action="{{route('effacer_image_galerie',[$item_image['id']])}}">
                                <img src="{{Storage::url($item_image['image'])}}" width="100px" height="100px" />
                                <br/>
                                @method('delete')
                                @csrf
                                <button type="submit"> retirer </button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <form method="post" action="{{route('modifier_article',[$larticle['id']])}}" enctype="multipart/form-data">

                    <div class="row grid-margin">

                        <div class="form-group pt-3 col-12">
                            <div class="row">
                                <h4>Image Illustration <img src="{{Storage::url("$larticle->image")}}" width="100px" height="100px">  </h4>
                                <input type="file" name="image" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <div class="row">

                                <h4>Ajouter d'autre image</h4>
                                <input type="file" multiple name="gallerie[]" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group pt-3 col-12">
                            <div class="row">
                                <h4>Categorie</h4>
                                <select class="form-control" name="id_categorie" required>
                                    <option value="{{$larticle->categorie_parente->id}}" >{{$larticle->categorie_parente->titre}}</option>
                                    @foreach($liste_menus_simple as $item_menu_simple)
                                        <option value="{{$item_menu_simple['id']}}"> {{$item_menu_simple['titre']}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group pt-3 col-12">
                            <div class="row">
                                <h4>Titre</h4>
                                <input name="titre" class="form-control" value="{{$larticle['titre']}}" />
                            </div>
                        </div>

                        <div class="form-group pt-3 col-12">
                            <div class="row">
                                <h4>Extrait</h4>
                                <textarea name="extrait" class="form-control">{{$larticle['extrait']}}</textarea>
                            </div>
                        </div>

                        <div class="form-group col-12 pt-3">
                            <div class="row">
                                <h4>Prix</h4>
                                <input name="prix" class="form-control" value="{{$larticle['prix']}}" required />
                            </div>
                        </div>

                        <div class="form-group col-12 pt-3">
                            <div class="row">
                                <h4>Prix promo</h4>
                                <input type="number" name="prix_promo" value="{{$larticle['prix_promo']}}" class="form-control"  />
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <h4 class="card-title">Corps de l'article</h4>
                            <textarea id="summernote" name="contenu">{!! $larticle['contenu'] !!}</textarea>
                        </div>
                    </div>
                    @if( Auth::user()->modifier =='true' )
                        @method('put')
                        @csrf
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    @endif
                </form>
            </div>
        </div>

    </div>
@endsection


@section('script_complementaire')

    <script src="{{asset('purple_template/js/vendor.bundle.base.js')}}"></script>

    <script src="{{asset('purple_template/js/editorDemo.js')}}"></script>
    <script src="{{asset('purple_template/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('purple_template/vendors/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('purple_template/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('purple_template/vendors/simplemde/simplemde.min.js')}}"></script>



    <script src="{{asset('purple_template/js/off-canvas.js')}}"></script>
    <script src="{{asset('purple_template/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('purple_template/js/misc.js')}}"></script>
    <script src="{{asset('purple_template/js/settings.js')}}"></script>
    <script src="{{asset('purple_template/js/todolist.js')}}"></script>


    <script src="{{asset('purple_template/js/editorDemo.js')}}"></script>
@endsection
