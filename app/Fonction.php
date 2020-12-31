<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    protected $table = 'fonction';
    public $timestamps = false;
    public function user(){
        return $this->hasMany('App\User');

    }
}
