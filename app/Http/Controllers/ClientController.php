<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){

        $infos_generales = InfosGenerale::first();
        $liste_menus_principaux = Menu::where('id_parent','=',null)->get();
        $liste_menus_parent = Menu::where('type','=','parent')->get();
        $liste_sous_menus = Menu::where('type','=','menu_simple')->get();
        $liste_menus_simple = $liste_sous_menus;
        $liste_des_clients = Client::all();
        return view('admin.liste_des_clients',compact('liste_des_clients','liste_menus_principaux','liste_menus_parent','liste_sous_menus','liste_menus_simple','infos_generales'));
    }
}
