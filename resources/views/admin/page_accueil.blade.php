
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
{{--        <div class="page-header">--}}
{{--            <h3 class="page-title text-center table-bordered"> Cocher les Section qui doivent appraitre sur la page d'accueil </h3>--}}
{{--        </div>--}}

        {{--        MENU--}}
        {!! Session::get('message','')!!}
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h3 class="page-title text-center"> Categorie mise en evidence  </h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('categorie_mise_en_avant_page_accueil')}}">
                            <h5>Ordre de mise en evidence</h5>
                            <div class="container">
                                <br/>
                                <h5>Premiere position</h5>
                                <select class="form-control" name="un" required>
                                    <option value="{{$mis_en_avant_un['id']}}" > {{$mis_en_avant_un['titre']}} </option>
                                    <option value > ---------Categorie parente-------- </option>
                                        @foreach($menus_pricipaux as $item_categorie_parente)
                                            <option value="{{$item_categorie_parente['id']}}" > {{$item_categorie_parente['titre']}} </option>
                                        @endforeach
                                    <option value > --------- Sous-Categorie -------- </option>

                                    @foreach($liste_menus_simple as $item_categorie)
                                        <option value="{{$item_categorie['id']}}" > {{$item_categorie['titre']}} </option>
                                    @endforeach
                                </select>
                                <br/>
                                <h5>Deuxieme position</h5>
                                <select class="form-control" name="deux" required>
                                    <option value="{{$mis_en_avant_deux['id']}}" > {{$mis_en_avant_deux['titre']}} </option>
                                    <option value > ---------Categorie parente-------- </option>
                                    @foreach($menus_pricipaux as $item_categorie_parente)
                                        <option value="{{$item_categorie_parente['id']}}" > {{$item_categorie_parente['titre']}} </option>
                                    @endforeach
                                    <option value > --------- Sous-Categorie -------- </option>

                                    @foreach($liste_menus_simple as $item_categorie)
                                        <option value="{{$item_categorie['id']}}" > {{$item_categorie['titre']}} </option>
                                    @endforeach
                                </select>
                                <br/>
                                <h5>Troiseme position</h5>
                                <select class="form-control" name="trois" required>
                                    <option value="{{$mis_en_avant_trois['id']}}" > {{$mis_en_avant_trois['titre']}} </option>
                                    <option value > ---------Categorie parente-------- </option>
                                    @foreach($menus_pricipaux as $item_categorie_parente)
                                        <option value="{{$item_categorie_parente['id']}}" > {{$item_categorie_parente['titre']}} </option>
                                    @endforeach
                                    <option value > --------- Sous-Categorie -------- </option>

                                    @foreach($liste_menus_simple as $item_categorie)
                                        <option value="{{$item_categorie['id']}}" > {{$item_categorie['titre']}} </option>
                                    @endforeach
                                </select>
                                <br/>
                                <h5>Quatrieme position</h5>
                                <select class="form-control" name="quatre" required>
                                    <option value="{{$mis_en_avant_quatre['id']}}" > {{$mis_en_avant_quatre['titre']}} </option>

                                    <option value > ---------Categorie parente-------- </option>
                                    @foreach($menus_pricipaux as $item_categorie_parente)
                                        <option value="{{$item_categorie_parente['id']}}" > {{$item_categorie_parente['titre']}} </option>
                                    @endforeach
                                    <option value > --------- Sous-Categorie -------- </option>

                                    @foreach($liste_menus_simple as $item_categorie)
                                        <option value="{{$item_categorie['id']}}" > {{$item_categorie['titre']}} </option>
                                    @endforeach
                                </select>
                            </div>

                            @if( Auth::user()->modifier =='true' )
                                @csrf
                                <h3 class="text-center">
                                    <button class="btn btn-outline-dark" type="submit">Enregistrer les modifications</button>
                                </h3>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
            <div class="offset-md-1 col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h3 class="page-title text-center"> Cocher les sections dont les derniers articles apparaitront sur la page d'accueil </h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('enregistrer_page_accueil')}}">
                            @foreach($liste_menus_simple as $item_sous_menu)

                                <div>
                                    <input name="present[]" id="{{$item_sous_menu['id']}}" value="{{$item_sous_menu['id']}}" type="checkbox" {{$item_sous_menu['present_sur_accueil'] ? 'checked' : ''  }} >
                                    &nbsp; <label for="{{$item_sous_menu['id']}}">{{$item_sous_menu['titre']}}</label>
                                </div>

                            @endforeach

                            @if( Auth::user()->modifier =='true' )
                                @csrf
                                <h3 class="text-center">
                                    <button class="btn btn-outline-dark" type="submit">Enregistrer les modifications</button>
                                </h3>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

