<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'nom' => 'admin',
            'prenom' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'idFonction' => 1,
            'tel1' => '32008600',
            'idgroupe' => 0,
            'etat' => 1,
            'iddepot' => 1233,
        ]);

        User::create([
            'nom' => 'cashier',
            'prenom' => 'cashier',
            'username' => 'cashier',
            'email' => 'cashier@gmail.com',
            'password' => Hash::make('cashier1234'),
            'idFonction' => 3,
            'tel1' => '33008600',
            'idgroupe' => 0,
            'etat' => 1,
            'iddepot' => 1233,
        ]);     User::create([

            'nom' => 'manager',
            'prenom' => 'manager',
            'username' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('manager1234'),
            'idFonction' => 2,
            'tel1' => '42008600',
            'idgroupe' => 0,
            'etat' => 1,
            'iddepot' => 1233,
        ]);
    }
}
