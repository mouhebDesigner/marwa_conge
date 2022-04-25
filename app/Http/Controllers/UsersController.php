<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // we have to import the user model before use it okay ok
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // This is the function index 
    // Kan la7adhtich fema des fonctions déclarer par défaut n'est ce pas ? ui
    /* 
        bien les fonctions hadhom sont déclarer à travers la commande qu'on a tapé esmha --resource 
        --resource hadhii t7adher les fonctions hadhom w ta3ti lkol fonction route el khas beha claire ?? ah ui  
        bien kan n7ebou ne3rfou kol fonction chniya route mta3ha on doit tapé ce commande 
        php artisan route:list okii ok bien allez emala njarboha lcommande 
    */
    // fonction hadhii w ne3rfou 7na eli rahou path mta3ha esma /users n'est ce pas ? ui bein 
    public function index()
    {
        // hkhw just neektbou lview eli bech nemshoula okii ok bien 
        $users = User::where('grade','!=', 'admin')->get();
        // on a utilisé la fonction where avec trois parameter un pour le nom du champ la deuxième pour l'opérateur de compariason 
        // la troisiéme pour la valuer claire ?? ui bien maitenant on doit ajouter une autre fonction afin de retourner la valuer de ce requet 
        // Ce fonction nommé get pour trouver la liste tout dépend la requête okii ok okii 
        // tawa fel view bech nalgou table fargha choftii ey bien haya n3abou table tawa en utilisant laravel 
        // On a une package nommé Seeder qui nous permet d'insérer des lignes dans une tableau okii ok bien 
        return view('users.index', compact('users'));//wadh7a ?? nn okii     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Function hadhii qui nous permet d'afficher le formulaire de modification claire ?? ui
    // bien comment on peut l'accéder maintenant golna lmarra eli fatet eli fema commande nektbouha fe terminal esmha 
    // php artisan route:list ta3tini liste de routes eli 3ena w kol route lwin yhez bel view wel controller n'st ce pas ? ui bien 
    // haya njarbouha 
    // users/{user}/edit  hadha lpath mta3na bech ywaselna lel fonction hadhii clair e? ui bien on le met tawa dans le href de bouton modifier 
    public function edit($id)
    {
        // La première étape qu'on doit le faire est créer une requête afin de nous donne l'utilisateur de l'id qu'on a passé 
        // comme paramètre n'est ce pas ui okii choufi kifeh 
        $user = User::find($id);
        // tawa vairable user va trouver la ligne retourner me requete tawa lazem n3adou variable $user lel vue mta3na eli hiya 
        // users.edit n'est ce pass??? ui bien comment le faire follow me 
        return view('users.edit', compact('user')); // c tt wadh7a ? ui okii njarbou tawa 
        // chofti kifeh ui tawa kan tla3dhich formualire faregh baynama houwa lazem ykoun m3abi be ligne eli rej3et n'est ce pas ? ui bien
        // haya nemshou emala le view tawa w nesta3mlou variable hadha $user eli 3adina bech n7otou fe kol input champ eli yansebha  
        // cette focniton find dans laravel on l'utilise au lieu de la requête sql select * from user where id = $id claire ?? ui bahiii barcha 
        // Bien esta3melna lmodel eli y3aber 3a table users fe BD wadh7a mah ?? 
        // laravel utilise l'architecture MVC n'est ce pas ?? ey bah 
        // M: model qui représente la table dans la base de donné 
        // C:  controller la class de traitment eli 7na fih deja 
        // V: l'interface client 
        // Controller wa9teli yest7a9 donné mel base fe table mou3aya ynadii model eli ymathelha w ynadii men khlila donné eli 7ashta beha 
        // fel cas mta3na est7a9ina donné me table user mta3 id mou3ayen 
        // hiya bouton modifier hadhii bech takhedh l'id mta3 ligne eli hiya fih wadhe7 ?? ui
        // bien che3mel controller walla nada model user w 3mel lel fonction find bech ya3mel recherche wel find traje3la ligne kanhi mawjouda sinon 
        // bech traje3 null claire ui okii 
    }
    // Bon haw tla3 mawjoud deja 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // c'est la fonction update 3endha deux paramétre first pour les valeurs des inputs et la deuxième est l'id de user qu'on veut le modifier okii ok
        // bien tawa khalina na3mlou requête hadhi bel model zay mbaki fel edit function (select * from users where id = $id)  claire ? ui
        $user = User::find($id);
        // bien tawa enajmou nouslou el kol champ fe table w na3touh valeur jdid mta3 l'input comme ceci 
        $user->name = $request->input('name');
        //email
        $user->email = $request->input('email');
        //numtel
        $user->numtel = $request->input('numtel');
        // adresse
        $user->adresse = $request->input('adresse');
        // daate recrutement
        $user->date_recrutement = $request->input('date_recrutement');
        // grade
        $user->grade = $request->input('grade');
        // Tawa badalna kol champ be valeur d'input jdid mta3ha 
        // chnouw lazem tawa lazemna n3adou les valuers jdod lel BD n'est ce pas ui bien ya3ni bech na3mlou l'enregistrement okii ok bien 
        $user->save(); // => save est une fonction pour l'enregistrement de données dans la base de donnée okii ok bien 
        // Tawa on va rédiriger l'utilisateur à la page de la liste des utilisateurs hekka walla  ? ui bien coment le faire 
        return redirect('/users')->with('edit-message', 'L\'utilisateur à été modifié avec succée !!'); // puisque 7na deja 3ena la fonction index qui nous rédirgie à la page users.index shis walla ? ui
        // Alors dans ce cas on n'a pas besoin de faire appel à la fonction view(users.index) une autre fois si non on doit faire 
        // le traitement de la fonction index une autre fois wa9teli 7na 3ena nwalou nesta3mlou la fonction redirect weli takhedh comme 
        // parametre esma path eli bech y3adina lel la fonction wadh7a ?? ui bahii barchaa haya njarbou tawa nbadlou emala 
        // Claire ?? ui bien les restes kif kif tawa 
        // Marwa marawa hani tbadlet claire ?? ui bahii barcha 
        // tawa fema haja na9sa eli hiya chniya, lazem wa9teli yraje3na lel la liste des utilisateurs y'affichilna message 
        // ygoulelna fih rahou utilisateur à été modifié avec succée shis walla ? c vrai bien comment le faire 
        // ba3d redirect('/users') nizdou la fonction with() hadhi fonction tasn3elna variables session takhedh deux paramter 
        // parametre lawel bech ykoun esm lvariable w thani la valuer de ce variable claire ?? ?u? i bein
        // tawa lazem emhsou lel view w n'affihou messag hadha okii ok bien
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // c'est la finction de supp test7a9 kan parametre wa7da eli feha l'id mta3 user eli bech nfaskhouh okii ok bein
        User::find($id)->delete(); // sahla barsha ligne wa7da hani yalga user yfaskha c'est tout wadh7a ? ui
        // bien tawa na3mlou kil 3ada la redirection lel page users.index
        // juste nbadlou la message men modifié el supprimé okii ok
        return redirect('/users')->with('delete-message', 'L\'utilisateur à été supprimé avec succée !!');
    }
}
