
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
            <div class="offset-md-3 col-md-6 grid-margin stretch-card">
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
                                <button class="btn btn-outline-dark" type="submit">Enregistrer les modifications</button>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

