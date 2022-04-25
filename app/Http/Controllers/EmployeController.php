<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use Illuminate\Support\Facades\Hash;
use App\User; //on doit appeler la model avant de l'utiliser 
use App\Http\Requests\EmployesRequest; // calire ?? ey bbien 
use Auth;
class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Ici la controller 
    // Pour chercher un mot dans un fichier on peut utiliser ctrl+f et ensuite on tape le mot comme ça 
    public function index()
    {
        //  
        $employes = Employe::where("etat",'!=', 'retraite')->get();
        return view('employes.index', compact('employes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Cette fonction nous permet d'afficher la formualire 
        return view('employes.create'); //claire ?? ui bien haya njarbou 
    }

    public function filtrer(Request $request){
        // brabii nakel haja w njik okti men mbakri tnadi fiya hhhh ok barra okii 
        // welcome baaahi ici on a enovyé des inputs pour le filtrage alors qu'est ce qu'on doit faire 
        /*
            il faut créer un request de filtrage tout dépend les valeurs envoyées de la part de user okii ok bien 
        */
        // il faut faire un condition si l'utilisateur a rempli tout le inputs ou seulement un seul ou deux 
        // w mb3aed enajmou n3rfou chniya requete eli nekhdmouhala okii ok 
        $solde = empty($request->input('solde'));
        $etat = empty($request->input('etat'));
        $profession = empty($request->input('profession'));
        if($solde == false && $etat == false && $profession == false){
            // hhhh 3enda l7a9 3la khater les variables fihom des valeur boolean fhamteha ? mch kol boleen?
            // la na7ki 3a $solde $etat $profession lkolhom fihom boolean 3la khater 
            // empty traje3 boolean fhamti ?? la function empty testi est-ce que variable faregh walla 
            // kan faregh traje3 true sinon traje3 false ? ey wadh7a tawa ma3neha ili ktibto enti zeyid?
            // anahou ezayed ? hak 9otli empty w7adha testi ey metfahmin ama ma tamna3ech eli lazem 
            // des conditio bech ne3rou lfaregh mel m3abi mela inti fech ghalat ana ghalet fel condition mta3 requete 
            // ga3ed ntesti fel les champs du table avec les valeur boolean wa9teli homa fihom des texts claire ? ey bien 
            $employes = Employe::where(['solde', $request->input('solde'),
                                        'etat', $request->input('etat'),
                                        'profession', $request->input('profession')
                                       ])->get();
                                    //    reti kifeh twali ey bien 
        } else if($etat == false && $profession == false){
            $employes = Employe::where('etat', '=',$request->input('etat'))
                            ->where('profession','=', $request->input('profession'))
                                       ->get();
        } else if($solde == false && $profession == false){
            $employes = Employe::where('solde', '=',$request->input('solde'))
                            ->where('profession','=', $request->input('profession'))
                                       ->get();
        } else if($solde == false && $etat == false){
            $employes = Employe::where('solde', '=',$request->input('solde'))
                            ->where('etat','=', $request->input('etat'))
                                       ->get();
        } else if($profession == false){
            $employes = Employe::where('profession', '=',$request->input('profession'))
                                       ->get();
        }else if($solde == false){
            $employes = Employe::where('solde', '=',$request->input('solde'))
                                       ->get();
        } else {
            $employes = Employe::where('etat','=', $request->input('etat'))
                                       ->get();
        }
        // fhamteha ?? ey bahii barshaa esma3ni fhimt kifech te5dem ema wa7di mayjich 3ala beli ni5dem haka :/ :/
        // hhhhh la7kaya haki marbouta be raisonnment algorithmiquee mta3ek w barra 3adii ki tekhdmi barsha hataw 
        // tet3awdii hraj les codes mana3rafch ni5dmo eyt3aeb houwa 3endek l7a9 
        // enti khalik fel frontend ye3jbek mahou ? 3jibni el 7a9 ki ni5dem nra 7aja 
        /** ey walh ana bidi zayek nkhamem walh hhh n7eb frontend khiir lback lel khedma w barra 
         * mmesh elhaja okhra ama frontend nchii5 3liih deja eli ne3refa fel frront khir mel back 
         * frond wa7do insuffisant bch ni5dem 7aja maw? eyy suffisant walla unsuffisant ?? ma3neha
         * nkoun fel7a fi css akaho maykafich ni5dem projet haka
         * la betbi3a ama front deja mesh css hkhw rahou mazal JS w les famework m,bta3a 
         * gotlek aa tawa bech nahbat ldar khouya nkamlou lkhedma ghadi kan t7ebibeh eyy bahii okii ki toucil 9oli okiii 
         */
        
         
        // hani c'est bon ui fhmateha mah ?? ey bien 
        // trah njarbou faza brabi 
        return view('employes.index', compact('employes'));
        // khalina njarbou ses deux conditions gbal 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // C'est la fonction d'ajout n'est ce pas ? ey bien 
    // Kan tla7dhich fema type de la variable $request maktoub esma Request shihs walla ey bien 
    // bien haka Request global ou plutot lpar défaut 7na n7ebou request Jdida tekhdem eli feha les messages d'erreur 
    // bech kan fema ghalta ywali ma yet3adech ya3mel save lel les donnée kan ki yabdou les conditions vérifié okii ok bein
    // EmployesRequest just badalnah heka w tawa lazem na3mloula import lahna bech enajmou nekhdemou biih okii ok 
    public function store(EmployesRequest $request)
    {
        //Ici on va envoyer les données qu'ils ont venus à partir de view index d'employes okii
        // Bien la premèire étape ici on doit instancier la class de la model qui représente la table qu'on veut utiliser 
        // Pour insérer un ligne dans elle okii ok bien 
        $user = new User();
        // On va remplir champ par champ on commence par name 
        // $request prend les valeurs de toutes les inputs dans la vue create 
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->adresse = $request->input('adresse');
        $user->password =  Hash::make($request->input('password')); 
        $user->numtel = $request->input('numtel');
        $user->date_recrutement = $request->input('date_recrutement');
        $user->grade = $request->input('grade');
        $user->save();
        $employe = new Employe();
        $employe->cin = $request->input('cin');
        $employe->user_id = $user->id;
        $employe->etat = $request->input('etat');
        $employe->solde = $request->input('solde');
        $employe->profession = $request->input('profession');
        $employe->type_contrat = $request->input('type_contrat');
        $employe->save();
        // on a la fonction redirect qui nous réderige à une path deja exist, cet path est /employes avec la méthode get , ce path pour la fonction 
        // index au dissous on  l'utiliser alors 
        return redirect('/employes'); // okii claire ?? ui bien on essaye maitenant 
        // J'ouvre le terminal avec ctrl+j 
        // Le serveur n'a pas encore ouvert il faut que l'icon être vert ui
        
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

    public function solde(){
        $soldes = Employe::where('user_id', Auth::user()->id)->get();
        return view('soldes.index', compact('soldes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //C'est la fonctoin edit qui va nous rédirige à la page de modification 
        // On va créer un variable et on e donne la résultat de la request select * from employes where id = $id 
        $employe = Employe::find($id);
        // enovyer cet varaibel  la view maitenant 
        return view('employes.edit',compact('employe'));
        // Aller au vue maitenant pour afficher la resultat de la var employe
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employe = Employe::find($id);
        $user = User::find($employe->user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->adresse = $request->input('adresse');
        $user->password = $request->input('password');
        $user->numtel = $request->input('numtel');
        $user->date_recrutement = $request->input('date_recrutement');
        $user->grade = $request->input('grade');
        $user->save();
        $employe->cin = $request->input('cin');
        $employe->etat = $request->input('etat');
        $employe->solde = $request->input('solde');
        $employe->profession = $request->input('profession');
        $employe->save();
        // On doit rédirigier maitenant à la page index 
        return redirect('/employes')->with('edit-message', 'L\'employé a été modifié avec succée'); // okii ok  bien haya njarbou

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employe::find($id)->delete();
        return redirect('employes')->with('delete-message', 'L\'employé a été supprimé avec succé'); // claire ui na9es lmsg lazem nzidou hak flash tafakrtih ? kima alert? ey sahetii 
    }

    public function retraite($id){

        $employe = Employe::find($id);

        $employe->etat = "retraite";

        $employe->save();

        return redirect('employes')->with('retraite-message', 'Employe retraité');

    }
}
