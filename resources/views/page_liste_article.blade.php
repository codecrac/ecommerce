@extends('front_includes')

@section('body')
    <div class="main-content innerpagebg wf100">

        <div class="news-large">
            <div class="container">

                        <div class="container mt-4">
                            <div class="section-title">
                                <h2 > <span class="table-bordered p-3"> {{$la_categorie['titre']}} </span> </h2>
                            </div>
                            <div class="row">
                                @if(sizeof($la_categorie->articles)>0)
                                    @foreach($la_categorie->articles as $item_articles)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="ng-box">
                                                <div class="thumb">
                                                    <a href="{{route('lire_article',[$item_articles['id']])}}"><i
                                                            class="fas fa-link"></i></a>
{{--                                                    <img src="data:image/jpeg;base64,{{$item_articles['image']}}" alt="">--}}
                                                    <img src="{{Storage::url($item_articles['image'])}}" alt="">
                                                </div>
                                                <div class="ng-txt">
                                                    <h4>
                                                        <a href="{{route('lire_article',[$item_articles['id']])}}">
                                                            {{$item_articles['titre']}}
                                                        </a>
                                                    </h4>
                                                    <ul class="post-meta">
                                                        <li><i class="fas fa-calendar-alt"></i> {{date('d-m-Y',strtotime($item_articles['updated_at']))}}</li>
                                                    </ul>
                                                    <p> {{$item_articles['extrait']}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="container text-center">
{{--                                        <img src="data:image/png;base64,{{$infos_generales['logo']}}">--}}
                                        <img src="{{Storage::url($infos_generales['logo'])}}">
                                        <h3>Aucun articles pour le moment</h3>
                                    </div>
                                @endif
                           </div>
            </div>

        </div>
    </div>
    <!--End-->
    </div>
@endsection
