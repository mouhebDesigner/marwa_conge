<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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
// Ici on peut créer un nouveau path comme cceçi 
Route::get('/edit', function(){
    return view('users.edit');
    // pages.users.edit gal rahi mes mawjouda 
    // C bon ? ui bien
});
Route::get('/', 'HomeController@index');
Route::get('users/{id}/employe', function($id){
    $employe = App\User::find($id)->employe()->profession;
    echo $employe; // ghriba chbeha ma tekhdemech sinon wali rakaz wa7dek
    // mesh moshkla hataw na3mloha avec une autre méthode tawa lin n7el hadhi 
    // tab3ini kifeh bech na3mel 
});
Route::get('contacts/create', 'ContactController@create');
Route::post('contacts', 'ContactController@store');
Route::get('contacts', 'ContactController@index');
Route::get('contacts/envoyer','ContactController@envoyer');

// L'admin peut ajouter modifier et supprimer les utilisateur ou quoi  ?? ui bien 
// Alors on doit créer trois vues , wa7ed pour l'ajout on va le nommer create.blade.php
// w wa7ed lel modification emsa edit.balde.php 
// w akher wa7ed pour afficher la liste des users emsa index.blade.php okii 
// Lazemna nasn3ou route nsamouh hekka users walla users yezi b7okm 7na ma 3enech partie client oki ok bien 
// 'users/'.$user->id path hadha fe resource yhezna lel la fonction update frel controller okii ok bien
Route::resource('users', 'UsersController');
// J'ouvre le controller ou n'importe quel page ou fichier avec ctrl+p et ensuite je tape le nom de fichier que je veux ouvrir comme ça 
Route::resource('employes', 'EmployeController');
Route::put('employe/{id}/retraite', function($id){
    $employe = App\Employe::find($id);

        $employe->etat = "retraite";

        $employe->save();

        return redirect('employes')->with('retraite-message', 'Employe retraité');
});
Route::get('/soldes', 'SoldeController@index');
Route::get('/soldes/employe', 'EmployeController@solde');
Route::post('employes/filtrer', 'EmployeController@filtrer');
Route::resource('conges', 'CongeController');
Route::get('conges/accepter/{id}', 'CongeController@accepter');
Route::get('conges/refuser/{id}', 'CongeController@refuser');
Route::get('historiques', 'CongeController@historique');
Route::resource('secretaires', 'SecretaireController');
Route::resource('retraites', 'RetraiteController');
Route::post('historique/filter', 'CongeController@search');
Route::get('conge/print', 'CongeController@print');
Route::get('droits', function(){
    return view('droits');
})->middleware('auth');
/* 
    Comparer deux dates 
*/ 
// Route::get('comparer', function(){
//     echo Auth::user()->date_recrutement->format('M');
// });
// 'employes/'.$employe->id.'/edit' ce path est deja prêt dans le resource list 
// Aller au controller maitenant 
// employes/create ce path est déj à exist 3endek l7a9 nsiit :p :p  nn mch bil3ani clic hhh hhh ah bien jit ble mli7 bech tfakart hhhhh 
// bref nemshou lel cotnroller tawa 
// dant cette route on a un path qui nous rédirge à la fonction store dans la controller EmployeController
// Cette foncction nous permet d'nvoyer de données à la base en utilisant la méthode post request 
// Le path de cette fonction est /employes okii ok bien 
// Fema haja ma 3melnahach fel aside lzaem nbadlou lmenu mta3na 
// resource fhamnaha lmarra eli fatet hadhii nn ? ui bahii bon gbal kol chay lfocntion eli bech t'affichilna formulaire fel controller 
// UsersController hiya edit function choufi m3aya 
// Bech ma nab9ouch 7na nektbou le routes lkol n7otou resource w hiya tjibhomlna okii ok bien 
// Tawa ba3d ma 7dher lcontroller w route lazemna n7adhrou les vues mta3na  bech nekhdmou 3lihom okii ok
// cham3neha za3ma resource hadhii ?? UsersController on doit créer ce controller d'abord et ensuite on va savoir c'est quoi resource okii ok
// 
Route::get('/dates', function(){
   /*ou khaybaaa zadaa barri zamriiii  */ 
   $aujourdhui_m = date('m',strtotime(Carbon::now()));
   $aujourdhui_y = date('y',strtotime(Carbon::now()));
   $timestamp = Auth::user()->date_recrutement;
   $month_rec = date("m", strtotime($timestamp));
   $year_rec =  date("y", strtotime($timestamp));
   $m1 = 12 - $month_rec;
   echo "Aujourd'hui".$aujourdhui_m."<br>Rec:".$month_rec ;
   
});
Route::get('users', 'UsersController@index');// users is the path , UsersController is the controller and the index is the function of treatment in controller okay ?? ok good 
Route::get('/user/{id}/conge', function($id){
  
    $conge  = App\User::find($id)->conge; //we will assign it with an instance of model User like this 
        echo $conge->motif;
});
Route::get('/foreach', function(){
    $tab = array(12, 13, 15, 16);
    for($i = 0; $i< count($tab); $i++){
        echo $tab[$i]." | ";
    }
    // Exemple de table associative 
    $assoc = array(
        [
            "nom" => "Mouheb", 
            "email" => "mouehbabderrahil@gmail.com", 
            "age" => 25
        ],
        [
            "nom" => "moataz", 
            "email" => "maoataz@gmail.com", 
            "age" => 22  
        ]
    );
    foreach($assoc as $value){
        echo "<br>Nom: ".$value["nom"]."<br>";
        echo "Email: ".$value["email"]."<br>";
        echo "Age: ".$value["age"];
    }
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
