<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function chat(){
        $ip = Request::ip();
        $conversation = Chat::where('client_concerner','=',$ip)->get();


        $le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        Session::put('panier', $le_panier);
        Session::save();

        return view('chat',compact('conversation','le_panier'));
    }

    public function load_conversation(){
        $ip = Request::ip();
        $conversation = Chat::where('client_concerner','=',$ip)->get();
        $file_conversation='';

        foreach($conversation as $item_message):
            if($item_message['send_by_admin']):
$file_conversation .= " <div class='clearfix' style='background-color: #00adef;width:50%;color: #fff;margin: 5px'>
                    <div class='chat-avatar'>
                        <i>$item_message->updated_at</i>
                    </div>
                    <div class='conversation-text'>
                        <div class='ctext-wrap'>
                            <i>$item_message->client_concerner</i>
                            <p>
                                $item_message->message
                            </p>
                        </div>
                    </div>
                </div>";
            else:
$file_conversation .= "  <div class='clearfix' style='background-color: #0acf97;text-align: right ;color: #fff;margin: 5px'>
                    <div class='chat-avatar'>
                        <i>$item_message->updated_at</i>
                    </div>
                    <div class='conversation-text'>
                        <div class='ctext-wrap'>
                            <i>$item_message->client_concerner</i>
                            <p>
                                $item_message->message
                            </p>
                        </div>
                    </div>
                </div>";
            endif;
        endforeach;

        return $file_conversation;
    }


        public function envoyer_message(Request $request){

            try {
                $df = request();
                $item = new Chat();
                $item->client_concerner = $df->ip;
                $item->message = $df->message;

                if ($df->send_by_admin) {
                    $item->send_by_admin = true;
                } else {
                    $item->send_by_admin = false;
                }

                if ($item->save()) {
                    return 'message envoyer';
                }
            }catch (\Exception $e){
                return $e->getMessage();
            }

        }
}
