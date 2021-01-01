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
			$table->dateTime('dateouverture');
			$table->string('etat', 20)->nullable()->default('Ouverte');
			$table->integer('idcaissier');
			$table->dateTime('datefermeture')->nullable();
			$table->decimal('valeursi')->default(0);
			$table->integer('verser')->default(0);
			$table->integer('idpersonnel')->nullable();
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
