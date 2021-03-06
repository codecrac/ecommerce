<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Evenement;
use App\Models\InfosGenerale;
use App\Models\Menu;
use App\Models\Publicite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontArticleController extends Controller
{
    public function index($slug)
    {

        $infos_generales = InfosGenerale::first();
        $menus_principaux = Menu::where('id_parent','=',null)->take(4)->get();
        $liste_categories = Menu::where('type','=','menu_simple')->get();

        //initialiser le panier
        $le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        Session::put('panier', $le_panier);
        Session::save();

        $larticle = Article::where('slug', '=', $slug)->first();
//        $larticle = Article::find($id_article);
//        dd($larticle);
        if($larticle==null){
            return redirect('/');
        }

        $de_la_meme_categorie = Article::Where('id_menu','=',$larticle['id_menu'])->inRandomOrder()->limit(3)->get();

        return view('lire_article',compact('infos_generales','larticle',
            'menus_principaux','de_la_meme_categorie','liste_categories','le_panier')
        );
    }

    public function page_article($id_menu_simple)
    {
        $infos_generales = InfosGenerale::first();
        $menus_pricipaux = Menu::where('id_parent','=',null)->get();

        $la_categorie = Menu::find($id_menu_simple);
        if($la_categorie==null){
            return redirect('/');
        }

        return view('page_liste_article',compact('infos_generales','la_categorie','menus_pricipaux'));
    }

    public function resultat_recherche(Request $request)
    {

        $infos_generales = InfosGenerale::first();
        $menus_principaux = Menu::where('id_parent','=',null)->take(5)->get();
        $liste_categories = Menu::where('type','=','menu_simple')->get();
        //initialiser le panier
        $le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        Session::put('panier', $le_panier);
        Session::save();

        $df = $request->all();
        $mot_cle = $df['mot_cle'];
        $id_menu = $df['id_categorie'];


        if($id_menu == '0'){
            $resultat_article = Article::where('titre','LIKE','%'.$mot_cle.'%')
                ->orWHere('extrait','LIKE','%'.$mot_cle.'%')
                ->orWhere('contenu','LIKE','%'.$mot_cle.'%')
                ->get();
        }else if($id_menu == '-1'){
            $mot_cle = str_replace('#','',$mot_cle);
            $resultat_commande = Commande::where('id','=',$mot_cle)->first();
//            dd($resultat_commande);
            return view('suivre_commande',compact('mot_cle','infos_generales','liste_categories',
                'menus_principaux','resultat_commande','le_panier'));
        }else{
            $resultat_article = Article::where('id_menu','=',$id_menu)
                ->where('titre','LIKE','%'.$mot_cle.'%')
                ->orWHere('extrait','LIKE','%'.$mot_cle.'%')
                ->orWhere('contenu','LIKE','%'.$mot_cle.'%')
                ->get();
        }

//        dd($resultat_article);

        return view('resultat_recherche',compact('mot_cle','infos_generales','liste_categories',
            'menus_principaux','resultat_article','le_panier'));
    }

    public function inscrire_a_la_newsletter($email_client){

        $le_client = Client::where('email','=',$email_client)->first();

        if($le_client ==null) {
            $client = new Client();
            $client->nom = '';
            $client->email = $email_client;
            $client->telephone = '';
            $client->mot_de_passe = '-';
            $client->adresse = '';

            if(!$client->save()){
                $message = " Quelque chose s'est mal pass??, <a href='$route_panier'>r??essayer</a>";
            }else{
                $message = "<div class='container text-center' style='padding: 20px;font-weight: bold;'>
                            Meci :-)
                        </div>";
            }
        }else{
            $message = "<div class='container text-center' style='padding: 20px;font-weight: bold;'> Meci :-)</div>";
        }
        return $message;

    }
}
