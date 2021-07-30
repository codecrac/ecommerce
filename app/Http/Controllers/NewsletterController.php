<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index(){
        $infos_generales = InfosGenerale::first();

        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();

        return view('admin.newsletter.index',compact('infos_generales','liste_menus_simple'));
    }
}
