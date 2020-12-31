<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Stock
 *
 * @mixin Eloquent
 */

class Stock extends Model
{
    /*
     * @mixin Eloquent
      */
    protected $table = 'stock';
    public $timestamps = false;

    public function medicament(){
        // ,'idMedicaments'
        return $this->belongsTo('App\Medicament');
    }
}
