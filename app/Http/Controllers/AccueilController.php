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
        $infos_generales = InfosGenerale::first();
        $menus_pricipaux = Menu::where('id_parent','=',null)->get();

        //present sur l'acceuil
        $menu_present_sur_accueil = Menu::where('type','=','menu_simple')->where('present_sur_accueil','=',true)->get();

        //initialiser le panier
        $this->le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        Session::put('panier', $this->le_panier);
        Session::save();
        $this->le_panier = Session::get('panier');


        return view('welcome',compact('infos_generales','menus_pricipaux','menu_present_sur_accueil'));
    }

    public function apropos()
    {
        $infos_generales = InfosGenerale::first();
        $menus_pricipaux = Menu::where('id_parent','=',null)->get();

        $cinq_au_hasard = Article::inRandomOrder()->limit(3)->get();
        $trois_de_la_meme_categorie = Article::orderBy('id','desc')->take(3)->get();

        $pub_1 = Publicite::first();
        $pub_2 = Publicite::skip(1)->first();
        $pub_3 = Publicite::skip(2)->first();

//        dd($pub_1,$pub_2,$pub_3);

        return view('apropos',compact('infos_generales',
                'menus_pricipaux','cinq_au_hasard','trois_de_la_meme_categorie',
                'pub_1','pub_2','pub_3')
        );
    }
}
