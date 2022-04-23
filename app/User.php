<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','prenom','username' ,'email', 'password','idFonction', 'tel1', 'tel2', 'lieuNaissance',
        'dateNaissance', 'adresse', 'idGroupe', 'etat', 'idDepot',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function fonction(){
        return $this->belongsTo('App\Fonction','idFonction');
    }
    public function depot(){
        return $this->belongsTo(Depot::class,'idDepot');
    }

}
