<?php

namespace App\Http\Controllers;

use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;
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


        $la_categorie = Menu::findorfail($id_categorie);
        return view('boutique',compact('infos_generales','liste_categories','le_panier','menus_principaux','la_categorie'));
    }
}