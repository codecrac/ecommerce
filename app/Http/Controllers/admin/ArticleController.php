<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallerie;
use App\Models\InfosGenerale;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index($id_menu){
        $infos_generales = InfosGenerale::first();

        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        $liste_article_menu = Article::where('id_menu','=',$id_menu)->get();
        $le_menu = Menu::findorfail($id_menu);
//        dd($liste_article_menu);
        return view('admin.articles.liste',compact('liste_menus_simple','le_menu','liste_article_menu','infos_generales'));
    }

    public function ajouter($id_menu){
        $liste_utilisateur = User::all();
        $infos_generales = InfosGenerale::first();
        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        $le_menu = Menu::findorfail($id_menu);
        return view('admin.articles.ajouter',compact('liste_utilisateur','liste_menus_simple','le_menu','infos_generales'));
    }

    public function editer_article($id_article){
        $liste_utilisateur = User::all();

        $infos_generales = InfosGenerale::first();
        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        $larticle = Article::findorfail($id_article);
        return view('admin.articles.editer',compact('liste_utilisateur','liste_menus_simple','larticle','infos_generales'));
    }

    public function enregistrer_article(Request $request,$id_menu)
    {
        $df = $request->all();

        $article = new Article();
        $article->id_menu = $id_menu;
        $article->prix = $df['prix'];
        $article->prix_promo = $df['prix_promo'];
        $article->titre = $df['titre'];
        $article->extrait = $df['extrait'];
        $article->contenu = $df['contenu'];

        $destination = 'images/';
        $chemin_destination = storage_path('app/public/images');
        $nom_image_illustration ="";


        if($request->hasFile('image')){
            $image = $df['image'];
            $extension = $image->getClientOriginalExtension();

            if(in_array($extension,['jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'])){
                $time2 = date('dhms');
                $nom_image_illustration =  $time2.'.'.$extension;
                $image->move($chemin_destination,$nom_image_illustration);
                $url_image = $destination.$nom_image_illustration;

                $article->image = $url_image;
            }
        }else{
            return  redirect()->back()->with('message',"<div class='alert alert-danger'> Tous les champs sont obligatoires </div> ");
        }

        if($article->save()){
            $a_slugger = $df['titre'].'.'.$article->id;
            $article->slug = Str::Slug($a_slugger);
            $article->save();

            if($request->hasFile('gallerie')){
                $gallery_image = $request->file('gallerie');
                foreach($gallery_image as $item_image_gallerie):
                    $extension = $item_image_gallerie->getClientOriginalExtension();

                    if(in_array($extension,['jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'])){
                        $time2 = date('dhms');
                        $nom_image_illustration =  $time2.'.'.$extension;
                        $item_image_gallerie->move($chemin_destination,$nom_image_illustration);
                        $url_image = $destination.$nom_image_illustration;

                        $image_gallerie = new Gallerie();
                        $image_gallerie->id_article = $article->id;
                        $image_gallerie->image = $url_image;
                        $image_gallerie->save();
                    }
                endforeach;

            }


            $message = "<div class='alert alert-success text-center'> L' <b>article</b> a bien été enregistrés </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayer</div>";
            return redirect()->back()->with('message',$message);
        }
    }

    public function modifier_article(Request $request,$id_article)
    {
        $df = $request->all();
        $article = Article::find($id_article);
        $article->titre = $df['titre'];
        $article->prix = $df['prix'];
        $article->prix_promo = $df['prix_promo'];
        $article->extrait = $df['extrait'];
        $article->contenu = $df['contenu'];


        //stocker en base64
    /*    if($request->hasFile('image')){
            $limage = $request->file('image');
            $path = $limage->getRealPath();
            $image_base64 = base64_encode(file_get_contents($path));
            $article->image = $image_base64;
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
                $article->image = $url_image;
            }
        }

        if($article->save()){
            $message = "<div class='alert alert-success text-center'> L' <b>article</b> a bien été enregistrés </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayer</div>";
            return redirect()->back()->with('message',$message);
        }
    }

    public function supprimer_article($id_article)
    {
        $larticle = Article::findorfail($id_article);

        if($larticle->delete()){
            $message = "<div class='alert alert-success text-center'> L' <b>article</b> a bien été supprimé </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal passé... veuillez reessayé</div>";
            return redirect()->back()->with('message',$message);
        }
    }
}
