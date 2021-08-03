<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminChatController extends Controller
{

    public function chat_admin()
    {
        $liste_chat = Chat::get()->groupBy('client_concerner');

        $liste_menus_simple = Menu::where('type', '=', 'menu_simple')->get();
        $infos_generales = InfosGenerale::first();

//        foreach($liste_chat as $item):
        $tableau_ip_client = array_keys($liste_chat->toArray());
//        dd($keys);
//        endforeach;
        return view('admin.chat', compact('liste_menus_simple', 'infos_generales', 'liste_chat', 'tableau_ip_client'));
    }

    public function load_conversation_for_admin(Request $request)
    {

        $ip = request()->ip;
        $conversation = Chat::where('client_concerner', '=', $ip)->get();
        $file_conversation = '';

        foreach ($conversation as $item_message):
            if (!$item_message['send_by_admin']):
                $file_conversation .= "  <li class='clearfix'>
                                                        <div class='chat-avatar'>
                                                        </div>
                                                        <div class='conversation-text'>
                                                            <div class='ctext-wrap'>
                                                                <i>{$item_message['client_concerner']}</i>
                                                                <p>
                                                                    {$item_message['message']}
                                                                    <br/>
                                                                    <i>{$item_message['updated_at']}</i>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>";
            else:
                $file_conversation .= "  <li class='clearfix odd'>
                                                        <div class='chat-avatar'>
                                                        </div>
                                                        <div class='conversation-text'>
                                                            <div class='ctext-wrap'>
                                                                <i>{$item_message['client_concerner']}</i>
                                                                <p>
                                                                    {$item_message['message']}
                                                                </p>
                                                                <p>
                                                                    <i>{$item_message['updated_at']}</i>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>";
            endif;
        endforeach;

        return $file_conversation;
    }

}
