@extends('front_includes')

@section('body')

    <div id="chatbox" style="display: none;position: absolute;bottom: 50px;right: 10px;height: 400px;width: 500px;background-color: red;z-index: 1000000">
        <h4 onclick="toggle_chatbox()" style="cursor: pointer;z-index: 50;background-color: #2d3748;color: #fff;padding: 12px;position: absolute;top:-30px;left:-20px"> x </h4>
        <div class="row" style="position: absolute;bottom: 0px">
            <div style="background-color: #fff;margin-bottom:10px">
                <div id="conversation_list" data-simplebar style="height: 250px;overflow-y: auto">
                    ff
                </div>
            </div>
            <div class="col-12">
                <textarea style="background-color: #fff" id="message" class="form-control" name="message" rows="4">=</textarea>
            </div>
            <input type="text" value="{{Request::ip()}}" id="adresse_ip">
            <div class="text-center">
                <button type="button" onclick="enregistrer_message()" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
    </div>

    <div style="width: 250px;background-color: red;border-radius: 10px;position: absolute;right: 10px;bottom: 0px;color: #fff">
        <h3 style="color: #fff;text-align: center;padding: 5px;cursor: pointer" onclick="toggle_chatbox()">Ecrivez nous</h3>
    </div>
@endsection

@section('script_complementaire')
    {{--============================ENVOYER MESSAGE==================================--}}
    <script>
        let boucle ='';
        function load_conversation(){
            // alert('loading..');
            $("#conversation_list").load('{{route('load_conversation')}}');
            chatbox.style.display = 'block';

            $("#conversation_list").animate({ scrollTop: $('#conversation_list').prop("scrollHeight")}, 1000);

            setTimeout(function (){
                $("#conversation_list").animate({ scrollTop: $('#conversation_list').prop("scrollHeight")}, 1000);
            },1000);

        }



        function toggle_chatbox(){
            let chatbox = document.getElementById('chatbox');
            if(chatbox.style.display !='block'){
                chatbox.style.display = 'block';
                setInterval(function (){load_conversation();},5000)

            }else{
                chatbox.style.display = 'none';
                // clearInterval(boucle);
            }
        }

        function enregistrer_message(){
            let adresse_ip =$('#adresse_ip').val();;
            let message = $('#message').val();
            // alert(adresse_ip);
            // alert(message);

            let donnee = {
                ip: adresse_ip,
                message: message
            };

            $.ajax({
                method : "GET",
                url: "/envoyer_message",
                data : donnee,
                success : function (response){
                    alert (response);
                    boucle = setInterval( function (){load_conversation();},5000);
                },
                error:function (error){
                    alert(error.responseText);
                    console.log(error);
                }
            });
        }
    </script>
@endsection
