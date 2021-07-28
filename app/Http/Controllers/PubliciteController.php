<?php

namespace App\Http\Controllers;

use App\Models\publicite;
use App\Models\InfosGenerale;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PubliciteController extends Controller
{
    public function index(){
        $infos_generales = InfosGenerale::first();

        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        $liste_publicite_menu = Publicite::all();
        return view('admin.publicites.liste',compact('liste_menus_simple','liste_publicite_menu','infos_generales'));
    }

    public function ajouter(){
        $liste_utilisateur = User::all();
        $infos_generales = InfosGenerale::first();
        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        return view('admin.publicites.ajouter',compact('liste_utilisateur','liste_menus_simple','infos_generales'));
    }

    public function editer_publicite($id_publicite){
        $infos_generales = InfosGenerale::first();
        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        $lpublicite = Publicite::findorfail($id_publicite);
        return view('admin.publicites.editer',compact('liste_menus_simple','lpublicite','infos_generales'));
    }

    public function enregistrer_publicite(Request $request)
    {
        $df = $request->all();
        $publicite = new publicite();
        $publicite->id_auteur = Auth::user()->id;
        $publicite->titre = $df['titre'];
        $publicite->lien = $df['lien'];


        //stocker en base64
   /*     if($request->hasFile('image')){
            $limage = $request->file('image');
            $path = $limage->getRealPath();
            $image_base64 = base64_encode(file_get_contents($path));

//            dd($str_to_store);
            $publicite->image = $image_base64;
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
                $publicite->image = $url_image;
            }
        }else{
            return  redirect()->back()->with('message',"<div class='alert alert-danger'> Tous les champs sont obligatoires </div> ");
        }

        if($publicite->save()){
            $message = "<div class='alert alert-success text-center'> La <b>publicite</b> a bien été enregistrée </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayer</div>";
            return redirect()->back()->with('message',$message);
        }
    }

    public function modifier_publicite(Request $request,$id_publicite)
    {
        $df = $request->all();
        $publicite = Publicite::find($id_publicite);
        $publicite->titre = $df['titre'];
        $publicite->lien = $df['lien'];


        //stocker en base64
      /*  if($request->hasFile('image')){
            $limage = $request->file('image');
            $path = $limage->getRealPath();
            $image_base64 = base64_encode(file_get_contents($path));
            $publicite->image = $image_base64;
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
                $publicite->image = $url_image;
            }
        }

        if($publicite->save()){
            $message = "<div class='alert alert-success text-center'> La <b>publicite</b> a bien été enregistrée </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayer</div>";
            return redirect()->back()->with('message',$message);
        }
    }

    public function supprimer_publicite($id_publicite)
    {
        $lpublicite = Publicite::findorfail($id_publicite);

        if($lpublicite->delete()){
            $message = "<div class='alert alert-success text-center'> La <b>publicite</b> a bien été supprimée </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayé</div>";
            return redirect()->back()->with('message',$message);
        }
    }
}
