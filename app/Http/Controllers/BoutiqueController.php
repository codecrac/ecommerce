<?php

namespace App\Http\Controllers;

use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BoutiqueController extends Controller
{
    public function index($id_categorie){
        $infos_generales = InfosGenerale::first();
        $menus_principaux = Menu::where('id_parent','=',null)->take(5)->get();
        $liste_categories = Menu::where('type','=','menu_simple')->get();
        $le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        Session::put('panier', $le_panier);
        Session::save();


        $la_categorie = Menu::where('slug','=',$id_categorie)->first();
//        $la_categorie = Menu::findorfail($id_categorie);

        if($la_categorie==null){
            return redirect()->route('accueil');
        }

        if($la_categorie->type == 'parent'){
            if(sizeof($la_categorie->enfants) >0){
                $la_categorie = $la_categorie->enfants;
                $la_categorie = $la_categorie[0];
//                dd($la_categorie);
            }else{
                $la_categorie = Menu::where('type','=','menu_simple')->first();
            }
        }

        $liste_articles = DB::table('articles')->where('id_menu','=',$la_categorie->id)->orderBy('id','desc')->paginate(12);

        //tri et filtre
        $le_tri = '';
        if(isset($_GET['tri'])){
            $le_tri = $_GET['tri'];
            if($le_tri == 'nouvelle-arrivage'){
                $liste_articles = DB::table('articles')->where('id_menu','=',$la_categorie->id)->orderBy('id','desc')->paginate(12);
            }elseif($le_tri=='prix-croissant'){
                $liste_articles = DB::table('articles')->where('id_menu','=',$la_categorie->id)->orderByRaw("if(prix_promo=0, prix, prix_promo) " . request('prix', 'ASC'))->paginate(12);
            }elseif($le_tri=='prix-decroissant'){
                $liste_articles = DB::table('articles')->where('id_menu','=',$la_categorie->id)->orderByRaw("if(prix_promo=0, prix, prix_promo) " . request('prix', 'DESC'))->paginate(12);
            }
//            dd('trier');
        }

        return view('boutique',compact('infos_generales','liste_categories','le_panier','menus_principaux','la_categorie','liste_articles','le_tri'));
    }
}
