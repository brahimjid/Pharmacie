<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $table = 'elementsfacture';
    public $timestamps = false;
    public function invoices(){
        return $this->belongsTo('App\invoice');
    }
//    public function medicament(){
//        return $this->hasMany('App\Medicament');
//    }

}
