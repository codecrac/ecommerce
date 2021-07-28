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
        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        return view('admin.page_accueil',compact('liste_menus_simple','infos_generales'));
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
