<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonnelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personnel', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('login', 20);
			$table->string('password', 200);
			$table->string('nom', 100);
			$table->string('prenom', 100);
			$table->integer('idFonction');
			$table->string('tel1', 50)->nullable();
			$table->string('tel2', 50)->nullable();
			$table->string('lieuNaissance', 50)->nullable();
			$table->date('dateNaissance')->nullable();
			$table->string('adresse', 1000)->nullable();
			$table->integer('idgoupe');
			$table->integer('etat')->default(1);
			$table->integer('idDepot');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personnel');
	}

}
