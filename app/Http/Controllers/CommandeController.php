<?php

namespace App\Http\Controllers;

use App\Mail\CommandeMail;
use App\Models\Commande;
use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommandeController extends Controller
{
    public function index(){

        $infos_generales = InfosGenerale::first();
        $liste_menus_principaux = Menu::where('id_parent','=',null)->get();
        $liste_menus_parent = Menu::where('type','=','parent')->get();
        $liste_sous_menus = Menu::where('type','=','menu_simple')->get();
        $liste_menus_simple = $liste_sous_menus;

        $nb_commande_en_attente = Commande::where('etat','=','attente')->count();
        $nb_commande_emballer = Commande::where('etat','=','emballer')->count();
        $nb_commande_en_cours_de_livraison = Commande::where('etat','=','livraison_en_cours')->count();

        $liste_commande = Commande::where('etat','!=','livrer')->get();
        return view('admin.commandes.liste',compact('liste_menus_principaux','liste_menus_parent','liste_sous_menus',
            'liste_menus_simple','infos_generales','liste_commande','nb_commande_en_attente','nb_commande_emballer','nb_commande_en_cours_de_livraison'));
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

            $email_client = $la_commande->client->email;
            $subject = " $nom_organisation | Le Traitement de votre commande avance... ";
            /*
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

                     if( mail( $email_client, $subject,  $message ,$headers) ){
                           $mention_email = " email envoyer  ";
                       }else{
                           $mention_email = " email non envoyer  ";
                       }*/

            $email_entreprise = $infos_generales['email'];
            try{
                Mail::to(["$email_client","$email_entreprise"])->send(new CommandeMail($subject,$infos_generales,$la_commande));
                $mention_email = "email envoyer";
            }catch (\Exception $e){
//                dd($e->getMessage());
                $mention_email = "Echec envoi email";
            }

            $message_notif = "<div class='alert alert-success text-center'> Etat de la commande mise a jour avec succces </div>";
        }else{
            $message_notif = "<div class='alert alert-danger text-center'> $mention_email | Echec de mise a jour de l'etat de la commande, veuillez reessayer </div>";
        }
        return  redirect()->back()->with('message',$message_notif);

    }
}
