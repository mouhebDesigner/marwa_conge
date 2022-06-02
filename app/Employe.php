<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// C'est la model Employe
class Employe extends Model
{
    //
    protected $primaryKey = 'cin';
    public function user(){
        return $this->belongsTo(User::class); 
    }
}
