<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicaments')->insert([
            ['nom' => 'FILM RADIO 15*40 B/100','prixAchat' => '9999.99','prixVente' => '9999.99','idfamille' => '1','etat' => '1','pourcentage' => '30','seuil' => '0'],
            ['nom' => 'FILM RADIO 18*24 B/100','prixAchat' => '8072.77','prixVente' => '9999.99','idfamille' => '1','etat' => '1','pourcentage' => '30','seuil' => '0'],
            ['nom' => 'FILM RADIO 30*40 B/100','prixAchat' => '9999.99','prixVente' => '9999.99','idfamille' => '1','etat' => '1','pourcentage' => '30','seuil' => '0'],
            ['nom' => 'FILM RADIO 35*35 B/100','prixAchat' => '9999.99','prixVente' => '9999.99','idfamille' => '1','etat' => '1','pourcentage' => '30','seuil' => '0'],
            ['nom' => 'FILM RADIO 35*43 B/100','prixAchat' => '9999.99','prixVente' => '9999.99','idfamille' => '1','etat' => '1','pourcentage' => '30','seuil' => '0'],
            ['nom' => 'FILM SCANNER B/100','prixAchat' => '9999.99','prixVente' => '9999.99','idfamille' => '1','etat' => '1','pourcentage' => '30','seuil' => '0'],
            ['nom' => 'FILMS ECHO ROULEAU','prixAchat' => '2511.38','prixVente' => '3264.80','idfamille' => '1','etat' => '1','pourcentage' => '30','seuil' => '0'],
            ['nom' => 'GEL ECHO B/5 L','prixAchat' => '1200.00','prixVente' => '1200.00','idfamille' => '10','etat' => '1','pourcentage' => '0','seuil' => '0'],
            ['nom' => 'REVELATEUR AUTO 2*20 L','prixAchat' => '9999.99','prixVente' => '9999.99','idfamille' => '1','etat' => '1','pourcentage' => '30','seuil' => '0'],
            ['nom' => 'AIGUILLE DENTAIRE B/100 COURTE','prixAchat' => '2700.00','prixVente' => '3510.00','idfamille' => '2','etat' => '0','pourcentage' => '30','seuil' => '0']
        ]);
    }
}
