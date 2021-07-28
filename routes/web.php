<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\FrontArticleController;
use App\Http\Controllers\FrontEvenementController;
use App\Http\Controllers\InfoGeneraleController;
use App\Http\Controllers\PageAccueilController;
use App\Http\Controllers\PubliciteController;
use App\Http\Controllers\UtilisateurController;
use App\Models\Article;
use App\Models\Evenement;
use App\Models\InfosGenerale;
use App\Models\Menu;
use App\Models\Publicite;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//=============================================FRONT ROUTES
Route::get('/', [AccueilController::class,'index'])->name('accueil');
Route::get('/apropos', [AccueilController::class,'apropos'])->name('apropos');
Route::get('/resultats-de-recherche', [FrontArticleController::class,'resultat_recherche'])->name('resultat_recherche');
Route::get('/page-article/{id_menu_simple}', [FrontArticleController::class,'page_article'])->name('page_article');
Route::get('/evenement/{id_evenement}', [FrontEvenementController::class,'details_evenement'])->name('details_evenement');
Route::get('/articles/{id_article}', [FrontArticleController::class,'index'])->name('lire_article');



//=============================================ADMIN ROUTES
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
    $infos_generales = InfosGenerale::first();

    $nb_menus_simple = Menu::where('type','=','menu_simple')->get();
    $nb_menus_simples = sizeof($nb_menus_simple);

    $nb_evenement = Evenement::count();

    $nb_publicite = Publicite::count();

    $nb_menus_parent = Menu::where('type','=','parent')->get();
    $nb_menus_parent = sizeof($nb_menus_parent);

    $nb_article = Article::count();
    return view('dashboard',compact('liste_menus_simple','nb_evenement','nb_publicite','nb_menus_simples','nb_menus_parent','nb_article','infos_generales'));
})->name('dashboard');


Route::prefix('admin')->middleware(['auth:sanctum','verified'])->group(function (){

//=========================gestion utilisateur
    Route::get('/gestion-utilisateur',[UtilisateurController::class,'index'])->name('gestion_utilisateur');
    Route::put('/gestion-permissions-utilisateur/{id_utilisateur}',[UtilisateurController::class,'modifier'])->name('modifier_permissions_utilisateur');
    Route::post('/desactiver-utilisateur/{id_utilisateur}',[UtilisateurController::class,'desactiver_utilisateur'])->name('desactiver_utilisateur');


//=========================menu
    Route::get('/gestion-menu',[MenuController::class,'index'])->name('gestion_menus');
    Route::post('/ajouter-menu',[MenuController::class,'ajouter_menu'])->name('ajouter_menu');
    Route::put('/modifier-menu/{id_menu}',[MenuController::class,'modifier_menu'])->name('modifier_menu');
    Route::delete('/supprimer-menu/{id_menu}',[MenuController::class,'supprimer_menu'])->name('supprimer_menu');

//=========================article
    Route::get('/gestion-article/{id_menu}',[ArticleController::class,'index'])->name('gestion_article');
    Route::get('/ajouter-article/{id_menu}',[ArticleController::class,'ajouter'])->name('ajouter_article');
    Route::post('/ajouter-article/{id_menu}',[ArticleController::class,'enregistrer_article'])->name('enregistrer_article');
    Route::get('/editer-article/{id_article}',[ArticleController::class,'editer_article'])->name('editer_article');
    Route::put('/modifier-article/{id_article}',[ArticleController::class,'modifier_article'])->name('modifier_article');
    Route::delete('/supprimer-article/{id_article}',[ArticleController::class,'supprimer_article'])->name('supprimer_article');

//=========================article
    Route::get('/gestion-evenement',[EvenementController::class,'index'])->name('gestion_evenement');
    Route::get('/ajouter-evenement',[EvenementController::class,'ajouter'])->name('ajouter_evenement');
    Route::post('/ajouter-evenement',[EvenementController::class,'enregistrer_evenement'])->name('enregistrer_evenement');
    Route::get('/editer-evenement/{id_evenement}',[EvenementController::class,'editer_evenement'])->name('editer_evenement');
    Route::put('/modifier-evenement/{id_evenement}',[EvenementController::class,'modifier_evenement'])->name('modifier_evenement');
    Route::delete('/supprimer-evenement/{id_evenement}',[EvenementController::class,'supprimer_evenement'])->name('supprimer_evenement');

//=========================publicite
    Route::get('/gestion-publicite',[PubliciteController::class,'index'])->name('gestion_publicite');
    Route::get('/ajouter-publicite',[PubliciteController::class,'ajouter'])->name('ajouter_publicite');
    Route::post('/ajouter-publicite',[PubliciteController::class,'enregistrer_publicite'])->name('enregistrer_publicite');
    Route::get('/editer-publicite/{id_publicite}',[PubliciteController::class,'editer_publicite'])->name('editer_publicite');
    Route::put('/modifier-publicite/{id_publicite}',[PubliciteController::class,'modifier_publicite'])->name('modifier_publicite');
    Route::delete('/supprimer-publicite/{id_publicite}',[PubliciteController::class,'supprimer_publicite'])->name('supprimer_publicite');

//=========================Page accueil
    Route::get('/gestion-page-accueil',[PageAccueilController::class,'index'])->name('gestion_page_accueil');
    Route::post('/gestion-page-accueil',[PageAccueilController::class,'enregistrer_page_accueil'])->name('enregistrer_page_accueil');

//=========================Infos generales
    Route::get('/gestion-infos-generales',[InfoGeneraleController::class,'index'])->name('gestion_infos_generales');
    Route::post('/gestion-infos-generales',[InfoGeneraleController::class,'enregistrer_infos_generales'])->name('enregistrer_infos_generales');

});
