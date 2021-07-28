<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\evenement;
use App\Models\InfosGenerale;
use App\Models\Menu;
use App\Models\Publicite;
use Illuminate\Http\Request;

class FrontEvenementController extends Controller
{

    public function details_evenement($id_evenement)
    {
        $infos_generales = InfosGenerale::first();
        $menus_pricipaux = Menu::where('id_parent','=',null)->get();

        $levenement = Evenement::find($id_evenement);
        if($levenement==null){
            return redirect('/');
        }

        $cinq_au_hasard = Article::inRandomOrder()->limit(3)->get();
        $trois_evenement = Evenement::inRandomOrder()->take(3)->orderBy('date_evenement','asc')->get();


        $pub_1 = Publicite::first();
        $pub_2 = Publicite::skip(1)->first();
        $pub_3 = Publicite::skip(2)->first();

        return view('lire_evenement',compact('infos_generales','levenement',
            'menus_pricipaux','cinq_au_hasard','trois_evenement',
            'pub_1','pub_2','pub_3')
        );
    }
}
