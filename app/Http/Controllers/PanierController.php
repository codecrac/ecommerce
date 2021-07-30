<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Commande;
use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Sodium\add;

class PanierController extends Controller
{

    public function ajouter($id_article,$quantite=1){


        $le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        Session::put('panier', $le_panier);
        Session::save();
        $le_panier = Session::get('panier');

        $larticle = Article::find($id_article);

        $prix = $larticle->prix;
        if($larticle->prix_promo !=null && !empty($larticle->prix_promo)){
            $prix = $larticle->prix_promo;
        }

        $prix_total = $quantite * $prix;
        $item_panier = [
            'id_article' => $larticle->id,
            'image' => $larticle->image,
            'prix' => $prix,
            'qte' => $quantite,
            'prix_total' => $prix_total,
            'titre' => $larticle->titre
        ];

        $le_contenu = $le_panier['contenu'];
        $grand_total = $le_panier['grand_total'] + $prix_total;

        array_push($le_contenu,$item_panier);

        $le_panier['contenu'] = $le_contenu;
        $le_panier['nb_article'] = $le_panier['nb_article'] + 1;
        $le_panier['grand_total'] = $grand_total;

        Session::put('panier', $le_panier);
        Session::save();
//        dd($le_panier);

        $message = "<div class='alert alert-success'> Article ajouter au panier, <a href='/panier'> <u>Voir le panier</u></a> </div> ";
        return $message;
    }

    public function update_panier(Request $request){
        $le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        $df=$request->all();

        $les_quantite = $df['qte'];
        $contenu_panier = $le_panier['contenu'];

        $grand_total =0;
        for($i=0; $i<sizeof($les_quantite);$i++){
            $contenu_panier[$i]['qte'] = $les_quantite[$i];
            $grand_total += $contenu_panier[$i]['prix'] * $contenu_panier[$i]['qte'];
            $contenu_panier[$i]['prix_total'] = $contenu_panier[$i]['prix'] * $contenu_panier[$i]['qte'];
        }
        $le_panier['contenu'] = $contenu_panier;
        $le_panier['grand_total'] = $grand_total;

        Session::put('panier', $le_panier);
        Session::save();

        $message = "<div class='container text-center' style='background-color: #cef4e9;padding: 20px;font-weight: bold;margin:5px 10px;'>
                        Mise à jour du panier éffectuée.
                    </div>";

        return redirect()->back()->with('message',$message);

    }

    public function retirer_du_panier($index){
        $le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];

        $contenu_panier = $le_panier['contenu'];

        array_splice($contenu_panier,$index,1);

        $le_panier['contenu'] = $contenu_panier;
        Session::put('panier', $le_panier);
        Session::save();

        $message = "<div class='container text-center' style='background-color: #cef4e9;padding: 20px;font-weight: bold;margin:5px 10px;'>
                        Mise à jour du panier éffectuée.
                    </div>";
        return redirect()->route('voir_le_panier')->with('message',$message);

    }

    public function vider_le_panier(){
        Session::forget('panier');
        $le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];

        Session::put('panier', $le_panier);
        Session::save();

        $message = "<div class='container text-center' style='background-color: #cef4e9;padding: 20px;font-weight: bold;margin:5px 10px;'>
                        Mise à jour du panier éffectuée.
                    </div>";
        return redirect()->route('voir_le_panier')->with('message',$message);

    }

    public function voir_panier(){


        $infos_generales = InfosGenerale::first();
        $menus_pricipaux = Menu::where('id_parent','=',null)->get();

        $le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        Session::put('panier', $le_panier);
//        Session::save();
        $le_panier = Session::get('panier');
        $le_panier = $le_panier;

//        dd($le_panier);

        return view('panier',compact('infos_generales', 'menus_pricipaux','le_panier') );
    }

    public function enregistrer_commande(Request $request){

        $le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        $le_panier = $le_panier;

//        $le_panier_en_json = json_encode($le_panier['contenu']);
//        $le_panier_en_bcript = b ($le_panier);
//        dd($le_panier_en_bcript);

        $df = $request->all();
        $route_panier = route('voir_le_panier');


        $email_client = $df['email'];
        $le_client = Client::where('email','=',$email_client)->first();

        if($le_client ==null) {
            $client = new Client();
            $client->nom = $df['nom_complet'];
            $client->email = $df['email'];
            $client->telephone = $df['telephone'];
            $client->mot_de_passe = $df['mot_de_passe'];
            $client->adresse = $df['adresse'];

            if(!$client->save()){
                $message = "<div class='container text-center' style='background-color: #d54e69;padding: 20px;font-weight: bold;margin:5px 10px;'>
                        Quelque chose s'est mal passé. <a href='$route_panier'>réessayer</a>
                        </div>";
                return redirect()->back()->with('message',$message);
            } // enregistrer le client
            $id_client = $client->id;
        }else{
            $id_client = $le_client->id;
        }

        $la_commande = new Commande();
        $le_panier_en_json = json_encode($le_panier['contenu']);
        $la_commande->id_client = $id_client;
        $la_commande->nb_article = $le_panier['nb_article'];
        $la_commande->valeur_total = $le_panier['grand_total'];
        $la_commande->panier = $le_panier_en_json;

        if($la_commande->save()){ // enregistrer la commande
            request()->session()->forget('panier');

            $infos_generales = InfosGenerale::first();

            $nom_organisation = $infos_generales->organisation;

            $to = $la_commande->client->email;
            $subject = " $nom_organisation | Le Traitement de votre commande avance... ";

            $message_du_mail = "<div class='alert alert-success text-center'> Etat de la commande mise a jour avec succces </div>";

            $headers = "From: $infos_generales->email"       . "\r\n" .
                "Reply-To:  $infos_generales->email" . "\r\n" ;

           if( mail( [$to ,$infos_generales->email ], $subject,  $message_du_mail ,$headers) ){
               $mention_email = " email envoyer  ";
           }else{
               $mention_email = " email non envoyer  ";
           }


            $message = "<div class='container text-center' style='background-color: #cef4e9;padding: 20px;font-weight: bold;margin:5px 10px;'>
                        $mention_email | Votre Commande a bien été enregstrée. <a href='/'>retour à l'accueil</a>
                        </div>";
        }else{
            $message = "<div class='container text-center' style='background-color: #d54e69;padding: 20px;font-weight: bold;margin:5px 10px;'>
                        $mention_email | Quelque chose s'est mal passé. <a href='$route_panier'>réessayer</a>
                        </div>";
        }

        return redirect()->back()->with('message',$message);

    }
}
