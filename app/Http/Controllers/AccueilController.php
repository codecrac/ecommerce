<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Evenement;
use App\Models\InfosGenerale;
use App\Models\Menu;
use App\Models\Publicite;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AccueilController extends Controller
{


    public function index(){

//        request()->session()->forget('panier');

        $infos_generales = InfosGenerale::first();
        $menus_principaux = Menu::where('id_parent','=',null)->take(5)->get();
        $liste_categories = Menu::where('type','=','menu_simple')->get();


        //present sur l'acceuil
        $menu_present_sur_accueil = Menu::where('type','=','parent')->where('present_sur_accueil','=',true)->get();

        //Categorie parente en evidence

        $mis_en_avant_un = Menu::where('mis_en_evidence','=','1')->first();
        $mis_en_avant_deux = Menu::where('mis_en_evidence','=','2')->first();
        $mis_en_avant_trois = Menu::where('mis_en_evidence','=','3')->first();
        $mis_en_avant_quatre = Menu::where('mis_en_evidence','=','4')->first();


        //initialiser le panier
        $this->le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        Session::put('panier', $this->le_panier);
        Session::save();
        $this->le_panier = Session::get('panier');
        $le_panier = $this->le_panier;

        $avec_promo = Article::where('prix_promo','!=',null)->where('prix_promo','!=','')->limit(3)->get();
        if(sizeof($avec_promo) <1){
            $top_deals = Article::inRandomOrder()->limit(3)->get();
        }

        $huit_au_hasard = Article::inRandomOrder()->limit(8)->get();
//        dd($huit_au_hasard);

        return view('welcome',compact('infos_generales',
            'liste_categories','menus_principaux','menu_present_sur_accueil','le_panier',
                'mis_en_avant_un','mis_en_avant_deux','mis_en_avant_trois','mis_en_avant_quatre',
                'huit_au_hasard','avec_promo'
        ));
    }

    public function apropos()
    {
        $infos_generales = InfosGenerale::first();
        $menus_principaux = Menu::where('id_parent','=',null)->get();

        $cinq_au_hasard = Article::inRandomOrder()->limit(3)->get();
        $trois_de_la_meme_categorie = Article::orderBy('id','desc')->take(3)->get();

        $pub_1 = Publicite::first();
        $pub_2 = Publicite::skip(1)->first();
        $pub_3 = Publicite::skip(2)->first();

//        dd($pub_1,$pub_2,$pub_3);

        return view('apropos',compact('infos_generales',
                'menus_principaux','cinq_au_hasard','trois_de_la_meme_categorie',
                'pub_1','pub_2','pub_3')
        );
    }
}
