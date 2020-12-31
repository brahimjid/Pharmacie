<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('depot')->insert([
            ['nom' => 'Pharmacie Centrale','type' => '0','pourcentage' => '0','etat' => '0'],
            ['nom' => 'Magasin','type' => '0','pourcentage' => '0','etat' => '0'],
            ['nom' => 'Pharmacie Urgence','type' => '0','pourcentage' => '0','etat' => '0']
        ]);
    }
}
