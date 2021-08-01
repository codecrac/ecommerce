<?php

namespace App\Http\Controllers;

use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageAccueilController extends Controller
{
    public function index(){
        $infos_generales = InfosGenerale::first();
        $menus_pricipaux = Menu::where('id_parent','=',null)->get();
        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();

        $mis_en_avant_un = Menu::where('mis_en_evidence','=','1')->first();
        $mis_en_avant_deux = Menu::where('mis_en_evidence','=','2')->first();
        $mis_en_avant_trois = Menu::where('mis_en_evidence','=','3')->first();
        $mis_en_avant_quatre = Menu::where('mis_en_evidence','=','4')->first();

        return view('admin.page_accueil',compact('menus_pricipaux',
                                                    'liste_menus_simple',
                                                                'infos_generales',
            'mis_en_avant_un','mis_en_avant_deux','mis_en_avant_trois','mis_en_avant_quatre'
            )
        );
    }

    public function categorie_mise_en_avant_page_accueil(Request $request){

        DB::table('menus')->update(array('mis_en_evidence' => 'non'));
        $df = $request->all();
        $id_un = $df['un'];
        $id_deux = $df['deux'];
        $id_trois = $df['trois'];
        $id_quatre = $df['quatre'];

        //un
        $menu_evidence_un = Menu::find($id_un);
        $menu_evidence_un->mis_en_evidence = '1';
        if($menu_evidence_un->save()){
            //deux
            $menu_evidence_deux = Menu::find($id_deux);
            $menu_evidence_deux->mis_en_evidence = '2';
            if($menu_evidence_deux->save()){
                //trois
                $menu_evidence_trois = Menu::find($id_trois);
                $menu_evidence_trois->mis_en_evidence = '3';
                if($menu_evidence_trois->save()){
                    //quatre
                    $menu_evidence_quatre = Menu::find($id_quatre);
                    $menu_evidence_quatre->mis_en_evidence = '4';
                    if($menu_evidence_quatre->save()){
                        $message = "<div class='alert alert-success text-center'> Changements effectués </div>";
                        return redirect()->back()->with('message',$message);
                    }
                }
            }
        }

        $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé, veuillez rééssayer </div>";
        return redirect()->back()->with('message',$message);
    }

    public function enregistrer_page_accueil(Request $request){
//        dd($request->all());
        DB::table('menus')->update(array('present_sur_accueil' => false));
        $df = $request->all();
        $liste_doit_etre_present = $df['present'];

        foreach ($liste_doit_etre_present as $item_sous_menus){
            $le_menu = Menu::find($item_sous_menus);
            $le_menu->present_sur_accueil = true;
            $le_menu->save();
        }
        $message = "<div class='alert alert-success text-center'> Changements effectués </div>";
        return redirect()->back()->with('message',$message);
    }
}
