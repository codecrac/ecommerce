@extends('front_includes')

@section('body')
    <div class="main-content innerpagebg wf100">

        <div class="news-large">

            <div class="container">
                <h3 class="text-center p-4"> Resultats de recherche pour : <b> {{$mot_cle}} </b> </h3>
            </div>

            <div class="container mt-4">
                @if(sizeof($resultat_article)>0)
                    <div class="container">
                        <div class="section-title">
                            <h2 > <span class="table-bordered p-3"> Articles </span> </h2>
                        </div>
                        <div class="row">
                            @foreach($resultat_article as $item_articles)
                                <div class="col-lg-4 col-md-6">
                                    <div class="ng-box">
                                        <div class="thumb">
                                            <a href="{{route('lire_article',[$item_articles['id']])}}"><i
                                                    class="fas fa-link"></i></a>
{{--                                            <img src="data:image/jpeg;base64,{{$item_articles['image']}}" alt="">--}}
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
                       </div>
                    </div>
                @endif

                @if(sizeof($resultat_evenement) >0)
                    <div class="container">
                        <div class="section-title">
                            <h2 > <span class="table-bordered p-3"> Evenements </span> </h2>
                        </div>
                        <div class="row">
                            @foreach($resultat_evenement as $item)

                                <div class="col-lg-4 col-md-6">
                                    <div class="ng-box">
                                        <div class="thumb">
                                            <a href="{{route('details_evenement',[$item['id']])}}">

{{--                                                <img src="data:image/jpeg;base64,{{$item['image']}}" style="max-height: 280px;" alt="">--}}
                                                <img src="{{Storage::url($item['image'])}}" style="max-height: 280px;" alt="">

                                                <h6 style="text-align: center;position: absolute;bottom:0;width:100%;padding:10px;color: #fff;background-color:rgba(0,0,0,0.7)">
                                                    {{$item['titre']}}
                                                </h6>
                                            </a>
                                        </div>
                                        <div class="ng-txt">
                                            <div class="post-meta row">
                                                {{--   <div class="col-md-4">
                                                       <b> {{date('d-m-Y',strtotime($item['date_evenement']))}}</b>
                                                   </div>--}}
                                                <div class="col-md-12 text-center">
                                                    <a target="_blank"
                                                       alt="{{date('Y-m-d',strtotime($item['date_evenement']))}}"
                                                       style="font-weight: bold;color:#222" href="https://logwork.com/countdown-qqqv" class="countdown-timer"
                                                       onclick="return false;" data-timezone="Africa/Lagos" data-language="fr" data-date="{{date('Y-m-d',strtotime($item['date_evenement']))}} 00:00">Bientot</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                       </div>
                    </div>
                @endif

        </div>
    </div>
    <!--End-->
    </div>
@endsection
