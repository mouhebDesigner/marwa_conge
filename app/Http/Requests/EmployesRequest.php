<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // nfahmek fih esa3a gbal 
    // houwa fih deux fonctions authorize est une fonction pour l'autorisation de fonctionnement de ce class 
    public function authorize()
    {
        // Houwa tawa ne fonctionne pas 3la khater function authorize retourne false okii ok bein
        // Afin d'être autoriser à fonctionner on doit le modifier en true comme ça 
        return true ; //il est autorisé maitenant okii ey bien 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // Function rules hadhii hiya eli bech ta3ti message d'erreur pour chaque input claire ?? ui bien
    public function rules()
    {
        // La forme doit être comme ça 
        //la valeur de l'attribut name dans l'input => "condition"
        // exp "name" => "required" claire ??ui
        return [
            "name" => "required", // walla khali mba3ed haya 
            "email" => "required | email", //deux condition lazmek obligatoir et sous la forme de l'email okii ok bien 
            "adresse" => "required",
            "password" => "required | min: 8 ", //obligatoire et minimum 8 caraecter okiiok
            "numtel" => "required | integer",//obligtoir egale 8 et entier claire ?? e hataw narj3oulha brabi la7dha hani jitek marwa beh
            // barri 3abi lformulaire behhelloo nnkkamlo hhh nfs lkalma hh hhh
            "date_recrutement" => "required",
            "grade" => "required",
            "etat" => "required",
            "solde" => "required | integer",
            "profession" => "required",
            "type_contrat" => "required",
            "cin" => "required"
            // Kamalna 7adharna les conditions mta3na 
        ];
    }
}
