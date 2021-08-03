<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\admin\AdminChatController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FrontArticleController;
use App\Http\Controllers\InfoGeneraleController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageAccueilController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PubliciteController;
use App\Http\Controllers\UtilisateurController;
use App\Models\Article;
use App\Models\Client;
use App\Models\Commande;
use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Support\Carbon;
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
Route::post('/resultats-de-recherche', [FrontArticleController::class,'resultat_recherche'])->name('resultat_recherche');
Route::get('/boutique/{id_menu_simple}', [BoutiqueController::class,'index'])->name('boutique');
/*Route::get('/page-article/{id_menu_simple}', [FrontArticleController::class,'page_article'])->name('page_article');
Route::get('/evenement/{id_evenement}', [FrontEvenementController::class,'details_evenement'])->name('details_evenement');*/
Route::get('/articles/{id_article}', [FrontArticleController::class,'index'])->name('lire_article');


Route::get('/inscrire_a_la_newsletter/{email}', [FrontArticleController::class,'inscrire_a_la_newsletter'])->name('inscrire_a_la_newsletter');

//panier
Route::get('/ajouter_au_panier/{id_article}/{quantite?}', [PanierController::class,'ajouter'])->name('ajouter_au_panier');
Route::post('/update_panier', [PanierController::class,'update_panier'])->name('update_panier');
Route::get('/retirer_du_panier/{row_index}', [PanierController::class,'retirer_du_panier'])->name('retirer_du_panier');
Route::get('/vider_le_panier', [PanierController::class,'vider_le_panier'])->name('vider_le_panier');
Route::get('/finaliser-achat', [PanierController::class,'voir_panier'])->name('voir_le_panier');
Route::post('/finaliser-achat', [PanierController::class,'enregistrer_commande'])->name('enregistrer_commande');

//CHAT
Route::get('/chat', [ChatController::class,'chat'])->name('chat');
Route::get('/envoyer_message', [ChatController::class,'envoyer_message'])->name('envoyer_message');
Route::get('/load_conversation', [ChatController::class,'load_conversation'])->name('load_conversation');
Route::get('/load_conversation_for_admin', [AdminChatController::class,'load_conversation_for_admin'])->name('load_conversation_for_admin');

//=============================================ADMIN ROUTES
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
    $infos_generales = InfosGenerale::first();

    $nb_menus_simple = Menu::where('type','=','menu_simple')->get();
    $nb_menus_simples = sizeof($nb_menus_simple);

    $nb_client = Client::count();

    $nb_commandes = Commande::where('etat','=','attente')->count();

    $nb_menus_parent = Menu::where('type','=','parent')->get();
    $nb_menus_parent = sizeof($nb_menus_parent);

    $nb_article = Article::count();

    //STATISTIQUES
    $periode_statistique = "Ce mois";

    $date_debut = new Carbon('first day of this month');
    $date_debut = $date_debut->format('Y-m-d');

    $date_fin = new DateTime('tomorrow');
    $date_fin = $date_fin->format('Y-m-d');

    if( isset($_GET['date_debut']) && isset($_GET['date_fin']) ){
        $date_debut = $_GET['date_debut'];
        $date_fin = $_GET['date_fin'];
        $periode_statistique =  date('d/m/Y',strtotime($date_debut)) ." - " . date('d/m/Y',strtotime($date_fin));
    }

    //GERER L'INTERVALE DU BETWEEN POUR INCURE LES JOURS DANS LA RECHERCHE
        $date_debut_intervale_forme =  Carbon::createFromFormat('Y-m-d', $_GET['date_debut']);
        $date_debut_intervale_forme = $date_debut_intervale_forme->addDays(-1);

        $date_fin_intervale_forme =  Carbon::createFromFormat('Y-m-d', $_GET['date_fin']);
        $date_fin_intervale_forme = $date_fin_intervale_forme->addDays(1);


    $nb_commande_periode_stat = Commande::whereBetween('created_at',[$date_debut_intervale_forme,$date_fin_intervale_forme])->count();

    $stat_chiffre_affaire = Commande::whereBetween('created_at',[$date_debut_intervale_forme,$date_fin_intervale_forme])->where('etat','=','livrer')->sum('valeur_total');
    $stat_cmd_liver = Commande::whereBetween('created_at',[$date_debut_intervale_forme,$date_fin_intervale_forme])->where('etat','=','livrer')->count();
    $stat_cmd_annuler = Commande::whereBetween('created_at',[$date_debut_intervale_forme,$date_fin_intervale_forme])->where('etat','=','annuler')->count();
    $stat_cmd_echec_de_livraison = Commande::whereBetween('created_at',[$date_debut_intervale_forme,$date_fin_intervale_forme])->where('etat','=','echec_de_livraison')->count();


    return view('dashboard',compact('liste_menus_simple',
        'nb_client','nb_commandes','nb_menus_simples','nb_menus_parent','nb_article','infos_generales',
    'periode_statistique','date_debut','date_fin','stat_chiffre_affaire','nb_commande_periode_stat','stat_cmd_liver','stat_cmd_echec_de_livraison','stat_cmd_annuler'
    ));
})->name('dashboard');


Route::prefix('admin')->middleware(['auth:sanctum','verified'])->group(function (){

//=========================gestion chat
    Route::get('/chat_admin', [AdminChatController::class,'chat_admin'])->name('chat_admin');


//=========================gestion utilisateur
    Route::get('/gestion-utilisateur',[UtilisateurController::class,'index'])->name('gestion_utilisateur');
    Route::put('/gestion-permissions-utilisateur/{id_utilisateur}',[UtilisateurController::class,'modifier'])->name('modifier_permissions_utilisateur');
    Route::post('/desactiver-utilisateur/{id_utilisateur}',[UtilisateurController::class,'desactiver_utilisateur'])->name('desactiver_utilisateur');


//=========================menu
    Route::get('/gestion-menu',[MenuController::class,'index'])->name('gestion_menus');
    Route::post('/gestion-menu',[MenuController::class,'enregistrer_menu'])->name('ajouter_menu');
    Route::put('/gestion-menu/{id_menu}',[MenuController::class,'modifier_menu'])->name('modifier_menu');
    Route::delete('/gestion-menu/{id_menu}',[MenuController::class,'supprimer_menu'])->name('supprimer_menu');

    //promotion par categorie
    Route::get('/promotion-sur-categorie',[MenuController::class,'promo_categorie'])->name('promo_categorie');
    Route::put('/promotion-sur-categorie/{id_menu}',[MenuController::class,'modifier_promotion_categorie'])->name('modifier_promotion_categorie');
    Route::put('/etat-toute-promotion-sur-categorie',[MenuController::class,'modifier_etat_toute_promo'])->name('modifier_etat_toute_promo');

//=========================commandes
    Route::get('/gestion-commandes',[CommandeController::class,'index'])->name('gestion_commande');
    Route::get('/details-commandes/{id_commande}',[CommandeController::class,'details_commande'])->name('details_commande');
    Route::post('/modifier-etat-commande/{id_commande}',[CommandeController::class,'modifier_etat_commande'])->name('modifier_etat_commande');


//=========================article
    Route::get('/gestion-article/{id_menu}',[ArticleController::class,'index'])->name('gestion_article');
    Route::get('/ajouter-article/{id_menu}',[ArticleController::class,'ajouter'])->name('ajouter_article');
    Route::post('/ajouter-article/{id_menu}',[ArticleController::class,'enregistrer_article'])->name('enregistrer_article');
    Route::get('/editer-article/{id_article}',[ArticleController::class,'editer_article'])->name('editer_article');
    Route::put('/modifier-article/{id_article}',[ArticleController::class,'modifier_article'])->name('modifier_article');
    Route::delete('/supprimer-article/{id_article}',[ArticleController::class,'supprimer_article'])->name('supprimer_article');

//=========================newsletter
    Route::get('/newsletter',[NewsletterController::class,'index'])->name('newsletter');
    Route::post('/newsletter',[NewsletterController::class,'envoyer_message_au_client'])->name('envoyer_message_au_client');

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
    Route::post('/categorie-mise-en-avant-page-accueil',[PageAccueilController::class,'categorie_mise_en_avant_page_accueil'])->name('categorie_mise_en_avant_page_accueil');

//=========================Infos generales
    Route::get('/gestion-infos-generales',[InfoGeneraleController::class,'index'])->name('gestion_infos_generales');
    Route::post('/gestion-infos-generales',[InfoGeneraleController::class,'enregistrer_infos_generales'])->name('enregistrer_infos_generales');

});
