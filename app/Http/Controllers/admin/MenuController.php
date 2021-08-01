<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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



            $destination = 'images/';
            $chemin_destination = storage_path('app/public/images');
            $nom_image_illustration ="";

            /*if($request->hasFile('icone')){

                $icones = $request->file('icone');

                $icone = $icones[$i];


                $extension = $icone->getClientOriginalExtension();


                if(in_array($extension,['jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'])){
                    $time2 = date('dhms');

                    $nom_icone = 'ic_'. $time2.'.'.$extension;

                    $icone->move($chemin_destination,$nom_icone);

                    $url_icone = $destination.$nom_icone;

                    $menu->icone = $url_icone;
                }
            }*/

            if($request->hasFile('illustration')){

                $illustrations = $request->file('illustration');

                $illustration = $illustrations[$i];

                $extension2 = $illustration->getClientOriginalExtension();

                if(in_array($extension2,['jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'])){
                    $time2 = date('dhms');

                    $nom_image_illustration = 'ill_'. $time2.'.'.$extension2;

                    $illustration->move($chemin_destination,$nom_image_illustration);

                    $url_image = $destination.$nom_image_illustration;

                    $menu->image_illustration = $url_image;
                }
            }

            $menu->reduction = 0;
            $menu->etat_promotion = 'false';
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


        $destination = 'images/';
        $chemin_destination = storage_path('app/public/images');
        $nom_image_illustration ="";
        /*if($request->hasFile('icone')){

            $icone = $request->file('icone');

            $extension = $icone->getClientOriginalExtension();

            if(in_array($extension,['jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'])){
                $time2 = date('dhms');

                $nom_icone = 'ic_'. $time2.'.'.$extension;

                $icone->move($chemin_destination,$nom_icone);

                $url_icone = $destination.$nom_icone;
                $url_image = $destination.$nom_image_illustration;

                $menu->reduction = 0;
                $menu->etat_promotion = 'false';
                $menu->icone = $url_icone;
            }
        }*/

        if($request->hasFile('illustration')){

            $illustration = $request->file('illustration');

            $extension2 = $illustration->getClientOriginalExtension();

            if(in_array($extension2,['jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'])){
                $time2 = date('dhms');

                $nom_image_illustration = 'ill_'. $time2.'.'.$extension2;

                $illustration->move($chemin_destination,$nom_image_illustration);

                $url_image = $destination.$nom_image_illustration;

                $menu->etat_promotion = 'false';
                $menu->image_illustration = $url_image;
            }
        }


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


    public function promo_categorie()
    {

        $infos_generales = InfosGenerale::first();
        $liste_menus_principaux = Menu::where('id_parent','=',null)->get();
        $liste_menus_parent = Menu::where('type','=','parent')->get();
        $liste_sous_menus = Menu::where('type','=','menu_simple')->get();
        $liste_menus_simple = $liste_sous_menus;

        return view('admin.promo_sur_categorie',compact(
            'liste_menus_principaux','liste_menus_parent','liste_sous_menus','liste_menus_simple','infos_generales'));
    }

    public function modifier_promotion_categorie(Request $request,$id_menu)
    {

        $df = $request->all();
        $reduction = $df['reduction'];
        $etat_promotion = $df['etat_promotion'];

        $menu = Menu::find($id_menu);
        $menu->reduction = $reduction;
        $menu->etat_promotion = $etat_promotion;

        if($menu->save()){
            $message = "<div class='alert alert-success text-center'> Les Changements ont bien été enregistrés </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayer </div>";
            return redirect()->back()->with('message',$message);
        }
    }

    public function modifier_etat_toute_promo(Request $request)
    {

        $df = $request->all();
        $etat_toute_promotion = $df['etat_toute_promotion'];


        if(  DB::table('menus')->update(array('etat_promotion'=>$etat_toute_promotion)) ){
            $message = "<div class='alert alert-success text-center'> Les Changements ont bien été enregistrés </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayer </div>";
            return redirect()->back()->with('message',$message);
        }
    }
}
