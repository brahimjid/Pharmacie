<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected  $table = 'fournisseur';
    public $timestamps = false;
    public function invoice(){
        return $this->hasMany('App\Invoice');
    }
}
