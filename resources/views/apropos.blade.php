@extends('front_includes')

@section('body')

    <img src="{{Storage::url($infos_generales['banniere'])}}" width="100%" />

   <div class="main-content innerpagebg wf100 p80 container p-4">
       {!! $infos_generales['apropos_complet'] !!}
   </div>

@endsection
