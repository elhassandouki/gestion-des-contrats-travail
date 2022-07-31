<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    protected $table = 'employees';


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
        'ddn','date_validite_cin','date_entree'
    ];


    public function contrats(){
        return $this->hasMany('App\Contrats','cin_employee','cin');
    }




}
