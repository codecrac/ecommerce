@extends('front_includes')

@section('body')

   <div class="main-content innerpagebg wf100 p80">

       {{--===============================Espace publicitaire==============================--}}
       <div class="container text-center mb-4">
           <a href="{{$pub_1['lien']}}">
{{--               <img src="data:image/gif;base64,{{$pub_1['image']}}" style="max-height: 250px">--}}
               <img src="{{Storage::url($pub_1['image'])}}" style="max-height: 250px">
           </a>
       </div>
   {{--==============================FIN Espace publicitaire=====================================--}}

   <!--Start-->
       <div class="news-details">
           <div class="container">
               <div class="row">
                   <!--News Start-->
                   <div class="col-lg-8">
                       <div class="news-details-wrap">
                           <div class="news-large-post">
                               <div class="post-thumb">
{{--                                   <img src="data:image/jpeg;base64,{{$levenement['image']}}" alt="">--}}
                                   <img src="{{Storage::url($levenement['image'])}}" alt="">

                                   <h3 style="position: absolute;bottom:0;width:100%;padding:10px;color: #fff;background-color:rgba(0,0,0,0.7)">
                                       {{$levenement['titre']}}
                                   </h3>
                               </div>
                               <div class="post-txt">
{{--                                   <h3>{{$levenement['titre']}}</h3>--}}
                                   <div class="container">
                                       <h3> Date : {{date('d-m-Y',strtotime($levenement['date_evenement']))}} </h3>
                                       <a target="_blank" style="font-size: 18px;color: #2d3748; font-weight: bold;margin: 5px" href="https://logwork.com/countdown-qqqv" class="countdown-timer"
                                          onclick="return false;" data-timezone="Africa/Lagos" data-language="fr"
                                          data-date="{{date('Y-m-d',strtotime($levenement['date_evenement']))}} 18:15">Bientot</a>
                                   </div>

                                   {!! $levenement['contenu'] !!}
                               </div>
                           </div>
                       </div>
                   </div>
                   <!--News End-->
                   <!--Sidebar Start-->
                   <div class="col-lg-4">
                       <div class="sidebar">
                           <h4 style="background-color: orange;color: white;padding: 5px;text-align: center">Recommandations</h4>

                           <div class="col-12">
                               <div class="ng-box">
                                   <div class="thumb">
                                       <a href="{{$pub_2['lien']}}">
                                           <img src="data:image/gif;base64,{{$pub_2['image']}}" style="max-height: 200px" alt="">
                                           <img src="{{Storage::url($pub_2['image'])}}" style="max-height: 200px" alt="">
                                       </a>
                                   </div>
                               </div>
                           </div>

                       @foreach($cinq_au_hasard as $item_au_hasard)
                               <div class="col-12">
                                   <div class="ng-box">
                                       <div class="thumb">
                                           <a href="{{route('lire_article',[$item_au_hasard['id']])}}">
{{--                                            <img src="data:image/jpeg;base64,{{$item_au_hasard['image']}}" style="max-height: 200px" alt="">--}}
                                            <img src="{{Storage::url($item_au_hasard['image'])}}" style="max-height: 200px" alt="">
                                           </a>
                                       </div>
                                       <div class="ng-txt">
                                           <h5><a href="{{route('lire_article',[$item_au_hasard['id']])}}" style="color: #222">{{$item_au_hasard['titre']}}</a>
                                           </h5>
                                           {{--  <ul class="post-meta">
                                                 <li><i class="fas fa-calendar-alt"></i> {{$item_au_hasard['updated_at']}}</li>
                                             </ul>--}}
                                           {{--                                                    <p> {{$item_au_hasard['extrait']}} </p>--}}
                                           <br/>
                                           <h3 class="text-center">
                                            <a href="#" class="rm mt-2">En savoir plus </a>
                                           </h3>
                                       </div>
                                   </div>
                               </div>
                           @endforeach
                       </div>
                   </div>
                   <!--Sidebar End-->
               </div>
           </div>
       </div>
       <!--End-->
   </div>
    <div class="container">
        <h4 > <span class="table-bordered p-4"> Autres evenements </span></h4>
        <br/>
        <div class="row">

            <div class="col-md-4">
                <div class="ng-box">
                    <div class="thumb">
                        <a href="{{$pub_3['lien']}}">
{{--                            <img src="data:image/gif;base64,{{$pub_3['image']}}" style="max-height: 200px" alt="">--}}
                            <img src="{{Storage::url($pub_3['image'])}}" style="max-height: 200px" alt="">
                        </a>
                    </div>
                </div>
            </div>
            @foreach($trois_evenement as $item)
                <div class="col-md-4">
                    <div class="ng-box">
                        <div class="thumb">
                            <a href="#"><i class="fas fa-link"></i></a>
{{--                            <img src="data:image/jpeg;base64,{{$item['image']}}" style="max-height: 200px" alt="">--}}
                            <img src="{{Storage::url($item['image'])}}" style="max-height: 200px" alt="">
                        </div>
                        <div class="ng-txt">
                            <h5><a href="{{route('details_evenement',[$item['id']])}}" style="color: #222">{{$item['titre']}}</a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
