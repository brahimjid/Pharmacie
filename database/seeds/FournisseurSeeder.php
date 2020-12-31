<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fournisseur')->insert([
            ['nom' => 'Groupe Chinguitti pharma','tel1' => '22954822','tel2' => '','adresse' => '','sigle' => '','compte' => '21758568','email' => '','etat' => '1'],
            ['nom' => 'Somedib','tel1' => '22379710','tel2' => '','adresse' => '','sigle' => '','compte' => '4356475','email' => '','etat' => '1'],
            ['nom' => 'Pharmacie Babe Esselam','tel1' => '','tel2' => '','adresse' => '','sigle' => '','compte' => '743400','email' => '','etat' => '0'],
            ['nom' => 'Sociéte Elemel pharma','tel1' => '','tel2' => '','adresse' => '','sigle' => '','compte' => '30266060','email' => '','etat' => '1'],
            ['nom' => 'Camec','tel1' => '','tel2' => '','adresse' => '','sigle' => '','compte' => '234876017','email' => '','etat' => '1']
        ]);
    }
}
