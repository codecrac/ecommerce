<?php

namespace App\Http\Controllers;

use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InfoGeneraleController extends Controller
{
    public function index(){

        $infos_generales = InfosGenerale::first();
        $liste_menus_simple = Menu::where('type','=','menu_simple');
        return view('admin.infos_generales',compact('liste_menus_simple','infos_generales'));
    }

    public function enregistrer_infos_generales(Request $request)
    {
        $df = $request->all();


        $infosgenerales = InfosGenerale::first();
        if($infosgenerales ==null){
            $infosgenerales = new InfosGenerale();
        }

        $destination = 'images/';
        $chemin_destination = storage_path('app/public/images');


        if($request->hasFile('logo')){
            $gallery_image = $request->file('logo');

            $image = $df['logo'];
            $extension = $image->getClientOriginalExtension();

            if(in_array($extension,['jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'])){
                $time2 = date('dhms');
                $nom_image_illustration = $time2. '-' .Str::slug($image->getClientOriginalName()).'.'.$extension;
                $image->move($chemin_destination,$nom_image_illustration);
                $url_image = $destination.$nom_image_illustration;

//                dd($nom_image_illustration);
                $infosgenerales->logo = $url_image;
            }
        }

        if($request->hasFile('banniere')){
            $gallery_image = $request->file('banniere');

            $image = $df['banniere'];
            $extension = $image->getClientOriginalExtension();

            if(in_array($extension,['jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'])){
                $time2 = date('dhms');
                $nom_image_illustration =  $time2. '-' .Str::slug($image->getClientOriginalName()).'.'.$extension;
                $image->move($chemin_destination,$nom_image_illustration);
                $url_image = $destination.$nom_image_illustration;

//                dd($nom_image_illustration);
                $infosgenerales->banniere = $url_image;
            }
        }

        $infosgenerales->organisation = $df['organisation'];
        $infosgenerales->adresse = $df['adresse'];
        $infosgenerales->telephones = $df['telephones'];
        $infosgenerales->email = $df['email'];
        $infosgenerales->apropos = $df['apropos'];
        $infosgenerales->apropos_complet = $df['apropos_complet'];
        $infosgenerales->lien_fb = $df['lien_fb'];
        $infosgenerales->lien_linkedin = $df['lien_linkedin'];
        $infosgenerales->lien_insta = $df['lien_insta'];
        $infosgenerales->lien_twitter = $df['lien_twitter'];

        if($infosgenerales->save()){
            $message = "<div class='alert alert-success text-center'> Les modifications ont bien été enregistrés </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayer</div>";
            return redirect()->back()->with('message',$message);
        }
    }
}
