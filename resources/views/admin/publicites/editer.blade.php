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
                <a href="{{route('gestion_publicite')}}" class="btn btn-outline-primary">Retour</a>

                <h3> Modifier un publicite</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('modifier_publicite',[$lpublicite['id']])}}" enctype="multipart/form-data">

                    <div class="row grid-margin">

                        <div class="form-group col-12">
                            <div class="row">
{{--                                <h4>Image Illustration <img src="data:image/jpeg;base64,{{$lpublicite['image']}}" width="100px" height="100px">  </h4>--}}
                                <h4>Image Illustration <img src="{{Storage::url($lpublicite['image'])}}" width="100px" height="100px">  </h4>
                                <input type="file" name="image" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <div class="row">
                                <h4>Titre</h4>
                                <input name="titre" class="form-control" value="{{$lpublicite['titre']}}" />
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <div class="row">
                                <h4>Lien</h4>
                                <input name="lien" class="form-control" value="{{$lpublicite['lien']}}" />
                            </div>
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
