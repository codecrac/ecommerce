@extends('front_includes')

@section('body')

   <div class="main-content innerpagebg wf100 p80">

{{--===============================Espace publicitaire==============================--}}
    <div class="container text-center mb-4">
        <a href="{{$pub_1['lien']}}">
            <img src="data:image/gif;base64,{{$pub_1['image']}}" style="max-height: 250px">
        </a>
    </div>
{{--==============================FIN Espace publicitaire=====================================--}}

       <!--News Large Page Start-->
       <!--Start-->
       <div class="news-details">
           <div class="container">
               <div class="row">
                   <!--News Start-->
                   <div class="col-lg-8">
                       <div class="news-details-wrap">
                           <div class="news-large-post">
                               <div class="post-thumb">
                                   <img src="data:image/jpeg;base64,{{$infos_generales['logo']}}" alt="">
                               </div>
                               <div class="post-txt">
{{--                                   <h3>{{$larticle['titre']}}</h3>--}}
                                   <div class="control-group">
                                       <h3> {{$infos_generales['organisation']}} </h3>
                                   </div>

                                   {!! $infos_generales['apropos_complet'] !!}

                                   <h6>  {{$infos_generales['afficher_auteur_article'] =='oui' ? 'Auteur : '.$larticle->auteur->name : '' }}</h6>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!--News End-->
                   <!--Sidebar Start-->
                   <div class="col-lg-4">
                       <div class="sidebar">
                           <h4 style="background-color: orange;color: white;padding: 5px;text-align: center">Recommandations</h4>

                           <div class="col-12 mt-1>
                               <div class="ng-box">
                                   <div class="thumb">
                                       <a href="{{$pub_2['lien']}}">
                                           <img src="data:image/gif;base64,{{$pub_2['image']}}"
                                                style="max-height: 200px" alt="">
                                       </a>
                                   </div>
                               </div>
                           </div>

                           @foreach($cinq_au_hasard as $item_au_hasard)
                               <div class="col-12">
                                   <div class="ng-box">
                                       <div class="thumb">
                                           <a href="{{route('lire_article',[$item_au_hasard['id']])}}">
                                               <img src="data:image/jpeg;base64,{{$item_au_hasard['image']}}"
                                                    style="max-height: 200px" alt="">
                                           </a>
                                       </div>
                                       <div class="ng-txt">
                                           <h5><a href="{{route('lire_article',[$item_au_hasard['id']])}}" style="color: #222">{{$item_au_hasard['titre']}}</a>
                                           </h5>
                                           {{--  <ul class="post-meta">
                                                 <li><i class="fas fa-calendar-alt"></i> {{$item_au_hasard['updated_at']}}</li>
                                             </ul>--}}
                                           {{--                                                    <p> {{$item_au_hasard['extrait']}} </p>--}}
                                           {{--                                                    <a href="#" class="rm">En savoir plus </a>--}}
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
        <h4 > <span class="table-bordered p-4"> De la meme categorie </span></h4>
        <br/>
        <div class="row">
            <div class="col-md-4">
                <div class="ng-box">
                    <div class="thumb">
                        <a href="{{$pub_3['lien']}}">
                            <img src="data:image/gif;base64,{{$pub_3['image']}}" style="max-height: 200px"
                                 alt="">
                        </a>
                    </div>
                </div>
            </div>
            @foreach($trois_de_la_meme_categorie as $item_de_la_meme_categorie)
                <div class="col-md-4">
                    <div class="ng-box">
                        <div class="thumb">
                            <a href="{{$item_de_la_meme_categorie['lien']}}">
                                <img src="data:image/jpeg;base64,{{$item_de_la_meme_categorie['image']}}"
                                 style="max-height: 200px" alt="">
                            </a>
                        </div>
                        <div class="ng-txt">
                            <h5><a href="{{route('lire_article',[$item_de_la_meme_categorie['id']])}}" style="color: #222">{{$item_de_la_meme_categorie['titre']}}</a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
