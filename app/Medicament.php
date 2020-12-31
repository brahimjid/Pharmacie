<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
//protected  $table = 'medicament';
    public $timestamps = false;

    public function famille(){
        return $this->belongsTo("App\Famille","idfamille");

    }
        public function stock(){
                    //idMedicament
        return $this->hasMany("App\Stock",'idMedicament');

    }
}
