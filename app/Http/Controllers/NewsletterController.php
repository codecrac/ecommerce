<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index(){
        $infos_generales = InfosGenerale::first();

        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();

        return view('admin.newsletter.index',compact('infos_generales','liste_menus_simple'));
    }

    public function envoyer_message_au_client(Request $request){
        $df = $request->all();
        $liste_client = Client::select('email')->get();
        $liste_email = [];
        foreach ($liste_client as $item_email){
            array_push($liste_email,$item_email['email']);
        }

//        dd($liste_email);
        $email_destinataire = implode(',',$liste_email);
        $email_exp = $df['email_expediteur'];
        $sujet = $df['sujet'];
        $corps_du_message = $df['message'];

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: $email_exp"       . "\r\n";
        $headers .= "Reply-To:  $email_exp" . "\r\n" ;
//        dd($df);


        if( mail( $email_destinataire, $sujet,  $corps_du_message ,$headers) ){
            $message_notif = "<div class='alert alert-success text-center'> Message diffuser avec succes </div>";
            return redirect()->back()->with('message',$message_notif);
        }else{
            $message_notif = "<div class='alert alert-danger text-center'> Echec de diffusion du message, veuillez réessayer.  </div>";
            return redirect()->back()->with('message',$message_notif);
        }
    }
}
