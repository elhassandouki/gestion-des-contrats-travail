<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrats extends Model
{
     protected $table = 'contrats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    protected $dates = [
        'date_embauche','date_envoyer','date_recu','date_fin_contrat'
    ];


    public function employees(){

        return $this->Belongsto('App\Employee','id_employee','id');
    }

    
}
