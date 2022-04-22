<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->integer('idFonction');
            $table->string('tel1')->nullable();
            $table->string('tel2')->nullable();
            $table->string('lieunaissance')->nullable();
            $table->date('datenaissance')->nullable();
            $table->string('adresse')->nullable();
            $table->integer('idgroupe');
            $table->integer('etat');
            $table->integer('iddepot');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
