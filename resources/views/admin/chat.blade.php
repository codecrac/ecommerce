
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

        <!-- Start Content-->
            <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Chat</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <!-- start chat users-->
                        <div class="col-md-4 order-xl-1">
                            <div class="card">
                                <div class="card-body p-0">
                                    <ul class="nav nav-tabs nav-bordered">
                                        <li class="nav-item">
                                            <a href="#allUsers" data-bs-toggle="tab" aria-expanded="false" class="nav-link active py-2">
                                                Tous
                                            </a>
                                        </li>
                                    </ul> <!-- end nav-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active p-3" id="newpost">

                                            <!-- users -->
                                            <div class="row">
                                                <div class="col">
                                                    <div data-simplebar style="max-height: 550px">
                                                        @php $i=0; @endphp
                                                        @foreach($liste_chat as $item_chat)
                                                            @php
                                                                $dernier_message = $item_chat[sizeof($item_chat) -1];
                                                                $id = $i++;
                                                            @endphp
                                                                <a href="#" class="text-body" onclick="show_conversation({{$id}})">
                                                                    <div class="extrait_conversation d-flex align-items-start mt-1 p-2" id="extrait_conversation_{{$id}}">
                                                                        <div class="w-100 overflow-hidden">
                                                                            <h5 class="mt-0 mb-0 font-14">
                                                                                <span class="float-end text-muted font-12">{{$dernier_message['updated_at']}}</span>
                                                                                {{$dernier_message['client_concerner']}}
                                                                            </h5>
                                                                            <p class="mt-1 mb-0 text-muted font-14">
                                                                                <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">3</span></span>
                                                                                <span class="w-75">{{$dernier_message['message']}}</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                        @endforeach
                                                    </div> <!-- end slimscroll-->
                                                </div> <!-- End col -->
                                            </div>
                                            <!-- end users -->

                                        </div> <!-- end Tab Pane-->
                                    </div> <!-- end tab content-->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div>
                        <!-- end chat users-->

                        <!-- start user detail -->
                        @php $i=0; $j=0;@endphp
                        @foreach($liste_chat as $item_chat)
                                <div class="col-xl-7 order-xl-1 order-xxl-2 chatbox" id="chatbox_{{$i++}}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div style="height: 270px;overflow-y: auto" class="conversation-list" id="div_conversation_{{$j}}"></div>

                                            <script>
                                                setInterval(
                                                    function (){
                                                        load_conversation_for_admin({{$j}},'{{$tableau_ip_client[$j]}}');
                                                    } ,5000
                                                );
                                                {{--alert('{{$tableau_ip_client[$j]}}');--}}
                                            </script>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mt-2 bg-light p-3 rounded">
                                                        <form class="needs-validation" novalidate="" name="chat-form"
                                                              id="chat-form">
                                                            <div class="row">
                                                                <div class="col mb-2 mb-sm-0">
                                                                    <input type="text" id="adresse_ip_{{$j}}" value="{{$tableau_ip_client[$j]}}" required>
                                                                    <input type="text" class="form-control border-0" placeholder="Enter your text" id="message_{{$j}}" required>
                                                                    <div class="invalid-feedback">
                                                                        Please enter your messsage
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-auto">
                                                                    <div class="btn-group">
                                                                        <div class="d-grid">
                                                                            <button type="button" onclick="enregistrer_message({{$j}})" class="btn btn-success chat-send"><i class='uil uil-message'></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end col -->
                                                            </div> <!-- end row-->
                                                        </form>
                                                    </div>
                                                </div> <!-- end col-->
                                            </div>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card -->
                                </div> <!-- end col -->
                            @php $j++; @endphp
                        @endforeach
                        <!-- end user detail -->
                    </div> <!-- end row-->

                </div> <!-- container -->
            </div>
        <!-- content -->


        <script>
            function load_conversation_for_admin(index,ip){
                let la_div_conv = "#div_conversation_"+index;
                {{--alert('{{route('load_conversation_for_admin')}}?ip='+ip);--}}
                // alert(la_div_conv);

                let route = '{{route('load_conversation_for_admin')}}?ip='+ip;
                $(la_div_conv).load(route);

                setTimeout(function (){
                    $(la_div_conv).animate({ scrollTop: $(la_div_conv).prop("scrollHeight")}, 1000);
                },1000);

            }
            function enregistrer_message(id){
                id_ip = '#adresse_ip_'+id;
                id_message = '#message_'+id;

                // alert(id_ip);
                // alert(id_message);

                let adresse_ip =$(id_ip).val();;
                let message = $(id_message).val();
                // alert(adresse_ip);
                // alert(message);

                let donnee = {
                    ip: adresse_ip,
                    message: message,
                    send_by_admin: 'true'
                };

                $.ajax({
                    method : "GET",
                    url: "/envoyer_message",
                    data : donnee,
                    success : function (response){
                        alert (response);
                    },
                    error:function (){
                        alert('error');
                    }
                });
            }

            function show_conversation(id){
                the_id = 'chatbox_'+id;
                the_extrait = 'extrait_conversation_'+id;

                hide_all_chatbox();
                document.getElementById(the_id).style.display = 'block';
                document.getElementById(the_extrait).style.backgroundColor = 'rgb(43, 115, 136)';
                document.getElementById(the_extrait).style.color = '#fff';
                // alert(the_extrait);
            }

            function hide_all_chatbox(){
                var divsToHide = document.getElementsByClassName("chatbox"); //divsToHide is an array
                var extrait_conversation = document.getElementsByClassName("extrait_conversation"); //divsToHide is an array
                for(var i = 0; i < divsToHide.length; i++){
                    divsToHide[i].style.display = "none";
                    extrait_conversation[i].style.backgroundColor = "#fff";
                    extrait_conversation[i].style.color = "#222";
                }
            }
            hide_all_chatbox();
            show_conversation(0);
        </script>
@endsection

