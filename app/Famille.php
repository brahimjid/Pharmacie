<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    protected $table = 'fammilles';
    public $timestamps = false;
    public function medicaments(){
        return $this->hasMany("App\Medicament");

    }
}
