<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'facture';
    public $timestamps = false;
    public function invoiceItems(){
        return $this->hasMany("App\invoiceItem",'idfactrue');
    }
     public function fournisseur(){
         return $this->belongsTo("App\Fournisseur",'idFournisseur');

     }

}
