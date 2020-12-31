<?php

use App\Famille;
use Illuminate\Database\Seeder;

class FamilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Famille::create(['nom' => 'RADIOLOGIE']);
            Famille::create(['nom' => 'STOMATOLOGIE']);
            Famille::create(['nom' => 'SOLUTE ']);
            Famille::create(['nom' => 'AEROSOL']);
            Famille::create(['nom' => 'COLLYRE']);
            Famille::create(['nom' => 'ANTISEPTIQUE']);
            Famille::create(['nom' => 'SIROP']);
            Famille::create(['nom' => 'INJECTABLE']);
            Famille::create(['nom' => 'COMPRIME']);
            Famille::create(['nom' => 'CONSOMMABLE']);
            Famille::create(['nom' => 'R. labo']);
            Famille::create(['nom' => 'FILS DE SUTURE']);
            Famille::create(['nom' => 'DIALYSE']);
            Famille::create(['nom' => "produits d'anesthesie"]);
            Famille::create(['nom' => 'M.orthopedie']);
            Famille::create(['nom' => 'sachet']);
            Famille::create(['nom' => 'Roule']);
            Famille::create(['nom' => 'FL']);
            Famille::create(['nom' => 'SUPP']);
            Famille::create(['nom' => 'Paire']);
            Famille::create(['nom' => 'AMP']);
            Famille::create(['nom' => 'Pomade']);
            Famille::create(['nom' => 'Unite']);
            Famille::create(['nom' => 'test']);
            Famille::create(['nom' => 'akh']);
            Famille::create(['nom' => 'hhh']);
            Famille::create(['nom' => 'testi']);
            Famille::create(['nom' => 'testi']);
            Famille::create(['nom' => 'yay']);
            Famille::create(['nom' => 'lmj']);
            Famille::create(['nom' => 'tes']);
            Famille::create(['nom' => 'Antibiotique']);

    }
}
