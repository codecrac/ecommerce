<?php

namespace App\Http\Controllers;

use App\Models\InfosGenerale;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
    public function index(){
        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        $infos_generales = InfosGenerale::first();
        $liste_utilisateur = User::all()->except(Auth::user()->id);
        return view('admin.gestion_utilisateur',compact('liste_menus_simple','infos_generales','liste_utilisateur'));
    }

    public function modifier(Request $request,$id_utilisateur){

        $lutilisateur = User::find($id_utilisateur);
        $df = $request->all();

        $lutilisateur->articles = $df['articles'];
        $lutilisateur->publicite = $df['publicite'];
        $lutilisateur->evenement = $df['evenement'];
        $lutilisateur->creer_utilisateurs = $df['creer_utilisateurs'];

        $lutilisateur->ajouter = $df['ajouter'];
        $lutilisateur->modifier = $df['modifier'];
        $lutilisateur->effacer = $df['effacer'];

        if($lutilisateur->save()){
            $message = "<div class='alert alert-success text-center'> Les autorisations sur <b>$lutilisateur->name</b> ont bien été enregistrés </div>";
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuille reessayer </div>";
        }
        return redirect()->back()->with('message',$message);

    }

    public function desactiver_utilisateur(Request $request,$id_utilisateur){

        $lutilisateur = User::find($id_utilisateur);
        $df = $request->all();

        $lutilisateur->actif = $df['actif'];

        if($lutilisateur->save()){
            $message = "<div class='alert alert-success text-center'>  Droits de connexion mis à jour. </div>";
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuille reessayer </div>";
        }
        return redirect()->back()->with('message',$message);

    }
}
