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
			$table->decimal('valeursi')->default(0);
			$table->integer('verser')->default(0);
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
