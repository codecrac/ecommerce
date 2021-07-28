<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Sodium\add;

class PanierController extends Controller
{

    public function ajouter($id_article,$quantite){


        $this->le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        Session::put('panier', $this->le_panier);
        Session::save();
        $this->le_panier = Session::get('panier');

        $larticle = Article::find($id_article);

        $prix = $larticle->prix;
        if($larticle->prix_promo !=null && !empty($larticle->prix_promo)){
            $prix = $larticle->prix_promo;
        }

        $prix_total = $quantite * $prix;
        $item_panier = [
            'id_article' => $larticle->id,
            'prix' => $prix,
            'qte' => $quantite,
            'prix_total' => $prix_total,
        ];

        $le_contenu = $this->le_panier['contenu'];
        $grand_total = $this->le_panier['grand_total'] + $prix_total;

        array_push($le_contenu,$item_panier);

        $this->le_panier['contenu'] = $le_contenu;
        $this->le_panier['nb_article'] = $this->le_panier['nb_article'] + 1;
        $this->le_panier['grand_total'] = $grand_total;

        Session::put('panier', $this->le_panier);
        Session::save();
//        dd($this->le_panier);

        $message = "<div class='alert alert-success'> Article ajouter au panier, <a href='/panier'> <u>Voir le panier</u></a> </div> ";
        return $message;
    }

    public function voir_panier(){

        $this->le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        Session::put('panier', $this->le_panier);
        Session::save();
        $this->le_panier = Session::get('panier');

        dd($this->le_panier);
    }
}
