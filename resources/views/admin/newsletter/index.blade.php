@extends('admin.includes2')

@section('body')

    <div class="content-wrapper">
        <div class="page-header">

        </div>

        <div class="card">
            <div class="card-header">
                {!! Session::get('message','') !!}
                <h3> Newsletter </h3>

            </div>
            <div class="card-body">
                <form method="post" action="{{route('envoyer_message_au_client')}}" enctype="multipart/form-data">

                    <div class="row grid-margin">

                        <div class="form-group pt-3 col-12 pt-3">
                            <div class="row">
                                <h4>Email</h4>
                                <input name="email_expediteur" class="form-control" required/>
                            </div>
                        </div>

                        <div class="form-group pt-3 col-12 pt-3">
                            <div class="row">
                                <h4>Sujet</h4>
                                <input name="sujet" type="text" class="form-control" required/>
                            </div>
                        </div>

                        <div class="col-lg-12 pt-3">
                            <h4 class="card-title">Corps du message</h4>
                            <textarea id="summernote" name="message" required></textarea>
                        </div>
                    </div>

                    <h3 class="text-center">
                        @csrf
                        <button type="submit" class="btn btn-primary"> Diffuser le message </button>
                    </h3>
                </form>
            </div>
        </div>

    </div>
@endsection
