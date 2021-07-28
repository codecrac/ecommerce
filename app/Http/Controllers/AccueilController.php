<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Evenement;
use App\Models\InfosGenerale;
use App\Models\Menu;
use App\Models\Publicite;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index(){
        $infos_generales = InfosGenerale::first();
        $menus_pricipaux = Menu::where('id_parent','=',null)->get();

        //A la une
        $last_article = Article::orderby('id','desc')->take(1)->get();
        $dernier_article= null;
        if(sizeof($last_article)>0){
            $dernier_article = $last_article[0];
        }

        //au hasard pour la sidebar
        $quatre_derniers_article = Article::orderby('id','desc')->skip(1)->take(3)->get();
        $cinq_au_hasard = Article::inRandomOrder()->limit(3)->get();
//        $recommandations = Article::inRandomOrder()->limit(4)->get();

        //present sur l'acceuil
        $menu_present_sur_accueil = Menu::where('type','=','menu_simple')->where('present_sur_accueil','=',true)->get();
//        dd($menu_present_sur_accueil);

        $today = date('d-m-Y');
        $les_evenements = Evenement::where('date_evenement','>=',$today)->whereDate('date_evenement','>=', Carbon::today())->orderBy('date_evenement','asc')->get();

//        dd($menus_pricipaux);
        $les_publicites = Publicite::all();
        return view('welcome',compact('infos_generales','menus_pricipaux','les_evenements',
            'dernier_article','cinq_au_hasard','menu_present_sur_accueil','quatre_derniers_article','les_publicites'));
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
