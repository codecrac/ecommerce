<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\InfosGenerale;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvenementController extends Controller
{
    public function index(){
        $infos_generales = InfosGenerale::first();

        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        $liste_evenement_menu = Evenement::all();
        return view('admin.evenements.liste',compact('liste_menus_simple','liste_evenement_menu','infos_generales'));
    }

    public function ajouter(){
        $liste_utilisateur = User::all();
        $infos_generales = InfosGenerale::first();
        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        return view('admin.evenements.ajouter',compact('liste_utilisateur','liste_menus_simple','infos_generales'));
    }

    public function editer_evenement($id_evenement){
        $infos_generales = InfosGenerale::first();
        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        $levenement = Evenement::findorfail($id_evenement);
        return view('admin.evenements.editer',compact('liste_menus_simple','levenement','infos_generales'));
    }

    public function enregistrer_evenement(Request $request)
    {
        $df = $request->all();
        $evenement = new Evenement();
        $evenement->id_auteur = Auth::user()->id;
        $evenement->titre = $df['titre'];
        $evenement->date_evenement = $df['date_evenement'];
        $evenement->contenu = $df['contenu'];


        //stocker en base64
   /*     if($request->hasFile('image')){
            $limage = $request->file('image');
            $path = $limage->getRealPath();
            $image_base64 = base64_encode(file_get_contents($path));

//            dd($str_to_store);
            $evenement->image = $image_base64;
        }*/

        $destination = 'images/';
        $chemin_destination = storage_path('app/public/images');

        if($request->hasFile('image')){
            $gallery_image = $request->file('image');

            $image = $df['image'];
            $extension = $image->getClientOriginalExtension();

            if(in_array($extension,['jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'])){
                $time2 = date('dhms');
                $nom_image_illustration =  $time2. '-' .$image->getClientOriginalName();
                $image->move($chemin_destination,$nom_image_illustration);
                $url_image = $destination.$nom_image_illustration;

//                dd($nom_image_illustration);
                $evenement->image = $url_image;
            }
        } else{
            return  redirect()->back()->with('message',"<div class='alert alert-danger'> Tous les champs sont obligatoires </div> ");
        }

        if($evenement->save()){
            $message = "<div class='alert alert-success text-center'> L' <b>evenement</b> a bien été enregistrés </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayer</div>";
            return redirect()->back()->with('message',$message);
        }
    }

    public function modifier_evenement(Request $request,$id_evenement)
    {
        $df = $request->all();
        $evenement = Evenement::find($id_evenement);
        $evenement->titre = $df['titre'];
        $evenement->date_evenement = $df['date_evenement'];
        $evenement->contenu = $df['contenu'];


        //stocker en base64
     /*   if($request->hasFile('image')){
            $limage = $request->file('image');
            $path = $limage->getRealPath();
            $image_base64 = base64_encode(file_get_contents($path));
            $evenement->image = $image_base64;
        }*/

        $destination = 'images/';
        $chemin_destination = storage_path('app/public/images');

        if($request->hasFile('image')){
            $gallery_image = $request->file('image');

            $image = $df['image'];
            $extension = $image->getClientOriginalExtension();

            if(in_array($extension,['jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'])){
                $time2 = date('dhms');
                $nom_image_illustration =  $time2. '-' .$image->getClientOriginalName();
                $image->move($chemin_destination,$nom_image_illustration);
                $url_image = $destination.$nom_image_illustration;

//                dd($nom_image_illustration);
                $evenement->image = $url_image;
            }
        }



        if($evenement->save()){
            $message = "<div class='alert alert-success text-center'> L' <b>evenement</b> a bien été enregistrés </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayer</div>";
            return redirect()->back()->with('message',$message);
        }
    }

    public function supprimer_evenement($id_evenement)
    {
        $levenement = Evenement::findorfail($id_evenement);

        if($levenement->delete()){
            $message = "<div class='alert alert-success text-center'> L' <b>evenement</b> a bien été supprimé </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayé</div>";
            return redirect()->back()->with('message',$message);
        }
    }
}
