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
Route::get('/edit', function(){
    return view('users.edit');

});
Route::get('/', 'HomeController@index');
Route::get('users/{id}/employe', function($id){
    $employe = App\User::find($id)->employe()->profession;
    echo $employe;
});
Route::get('contacts/create', 'ContactController@create');
Route::post('contacts', 'ContactController@store');
Route::get('contacts', 'ContactController@index');
Route::get('contacts/envoyer','ContactController@envoyer');
Route::resource('users', 'UsersController');
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



Route::get('/dates', function(){

   $aujourdhui_m = date('m',strtotime(Carbon::now()));
   $aujourdhui_y = date('y',strtotime(Carbon::now()));
   $timestamp = Auth::user()->date_recrutement;
   $month_rec = date("m", strtotime($timestamp));
   $year_rec =  date("y", strtotime($timestamp));
   $m1 = 12 - $month_rec;
   echo "Aujourd'hui".$aujourdhui_m."<br>Rec:".$month_rec ;
})
;
Route::get('users', 'UsersController@index');
Route::get('/user/{id}/conge', function($id){

    $conge  = App\User::find($id)->conge; 
    echo $conge->motif;
});
Route::get('/foreach', function(){
    $tab = array(12, 13, 15, 16);
    for($i = 0; $i< count($tab); $i++){
        echo $tab[$i]." | ";
    }
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
