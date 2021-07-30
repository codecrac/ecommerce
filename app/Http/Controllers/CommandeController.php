<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index(){

        $infos_generales = InfosGenerale::first();
        $liste_menus_principaux = Menu::where('id_parent','=',null)->get();
        $liste_menus_parent = Menu::where('type','=','parent')->get();
        $liste_sous_menus = Menu::where('type','=','menu_simple')->get();
        $liste_menus_simple = $liste_sous_menus;


        $liste_commande = Commande::all();
        return view('admin.commandes.liste',compact('liste_menus_principaux','liste_menus_parent','liste_sous_menus',
            'liste_menus_simple','infos_generales','liste_commande'));
    }

    public function details_commande($id_commande){

        $infos_generales = InfosGenerale::first();
        $liste_menus_principaux = Menu::where('id_parent','=',null)->get();
        $liste_menus_parent = Menu::where('type','=','parent')->get();
        $liste_sous_menus = Menu::where('type','=','menu_simple')->get();
        $liste_menus_simple = $liste_sous_menus;

        $la_commande = Commande::findorfail($id_commande);


        return view('admin.commandes.editer',compact('liste_menus_principaux','liste_menus_parent','liste_sous_menus',
            'liste_menus_simple','infos_generales','la_commande'));
    }

    public function modifier_etat_commande(Request $request,$id_commande){

        $infos_generales = InfosGenerale::first();
        $df = $request->all();
        $nouvel_etat = $df['etat'];
        $la_commande = Commande::findorfail($id_commande);
        $la_commande->etat = $nouvel_etat;
        $mention_email ="";

        if($la_commande->save()){

            $nom_organisation = $infos_generales->organisation;

            $to = $la_commande->client->email;
            $subject = " $nom_organisation | Le Traitement de votre commande avance... ";

            $headers = "From: $infos_generales->email"       . "\r\n" .
                "Reply-To:  $infos_generales->email" . "\r\n" ;

            $etat_sans_underscrore = str_replace('_',' ', $la_commande->etat);
            $nom_client = $la_commande->client->nom;
            $message = "
                Bonjour $nom_client , Votre commande #$la_commande->id est maintenant : $etat_sans_underscrore.
                <br/>
               $nom_organisation
            ";
//            dd($message);

            if( mail( $to, $subject,  $message ,$headers) ){
                $mention_email = " email envoyer  ";
            }else{
                $mention_email = " email non envoyer  ";
            }

            $message_notif = "<div class='alert alert-success text-center'> Etat de la commande mise a jour avec succces </div>";
        }else{
            $message_notif = "<div class='alert alert-danger text-center'> $mention_email | Echec de mise a jour de l'etat de la commande, veuillez reessayer </div>";
        }
        return  redirect()->back()->with('message',$message_notif);

    }
}
