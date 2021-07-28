<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class BaseFrontController extends Controller
{
    protected $le_panier;

    public function __construct()
    {
        // Fetch the Site Settings object


//        print_r(Session::get('panier') );
        $this->le_panier = Session::has('panier') ? Session::get('panier') : ['contenu'=>[],'nb_article'=>0,'grand_total'=>0];
        Session::put('panier', $this->le_panier);
        Session::save();
        $this->le_panier = Session::get('panier');
        View::share('le_panier', $this->le_panier);
    }
}
