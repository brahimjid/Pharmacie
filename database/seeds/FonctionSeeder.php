<?php

use App\Fonction;
use Illuminate\Database\Seeder;

class FonctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            Fonction::create(['nom' => 'Administrateur', 'description' => NULL]);
            Fonction::create(['nom' => 'Gérant', 'description' => 'Gérant pharmacie']);
            Fonction::create(['nom' => 'vendeur', 'description' => 'vendeur']);
//            Fonction::create(['nom' => 'Pharmacien', 'description' => NULL]);

    }
}
