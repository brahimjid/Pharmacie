<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSessionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('session', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('dateOuverture');
			$table->string('etat', 20)->nullable()->default('Ouverte');
			$table->integer('idCaissier');
			$table->dateTime('dateFermeture')->nullable();
			$table->float('valeursi', 10, 0);
			$table->integer('verser');
			$table->integer('idPersonnel')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('session');
	}

}
