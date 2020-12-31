<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'commande';
    public $timestamps = false;
//    public function getMontantAttribute($price)
//    {
//        return $this->attributes['montant'] = sprintf(number_format($price, 2,'.'));
//    }
}
