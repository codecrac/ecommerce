<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $infos_generales = InfosGenerale::first();
        $liste_menus_principaux = Menu::where('id_parent','=',null)->get();
        $liste_menus_parent = Menu::where('type','=','parent')->get();
        $liste_sous_menus = Menu::where('type','=','menu_simple')->get();
        $liste_menus_simple = $liste_sous_menus;
//        dd($liste_menus);
//        return view('admin.gestion_menus',compact('liste_menus'));
        return view('admin.gestion_menus',compact('liste_menus_principaux','liste_menus_parent','liste_sous_menus','liste_menus_simple','infos_generales'));
    }


    public function ajouter_menu(Request $request)
    {

        $df = $request->all();
        $liste_titre_menu = $df['titre_menu'];
        $liste_type_menu = $df['type'];
        $type_menu = $df['type'];
        $id_parent = $df['id_parent'];

//        dd($df);
        $aucun_probleme= true;
        for($i=0;$i<sizeof($liste_titre_menu); $i++){
            $menu = new Menu();
            $menu->titre = $liste_titre_menu[$i];
            $menu->type = $liste_type_menu[$i];
            $menu->id_parent = $id_parent;
            if(!$menu->save()){
                $aucun_probleme=false;
            }
        }

        if($aucun_probleme){
            $type =  str_replace('_',' ',$type_menu);
            $message = "<div class='alert alert-success text-center'> Les <b>Menus</b> ont bien été enregistrés </div>";
            return redirect()->route('gestion_menus')->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... verifier les nouveaux enregistrements </div>";
            return redirect()->route('gestion_menus')->with('message',$message);
        }
    }

    public function modifier_menu(Request $request,$id_menu)
    {

        $df = $request->all();
        $titre_menu = $df['titre_menu'];

        $menu = Menu::find($id_menu);
        $menu->titre = $titre_menu;

        if($menu->save()){
            $message = "<div class='alert alert-success text-center'> Les Changements ont bien été enregistrés </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayer </div>";
            return redirect()->back()->with('message',$message);
        }
    }
    public function supprimer_menu($id_menu)
    {
        $menu = Menu::find($id_menu);

        if($menu->delete()){
            $message = "<div class='alert alert-success text-center'> La suppression a bien été enregistrés </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayer </div>";
            return redirect()->back()->with('message',$message);
        }
    }
}
