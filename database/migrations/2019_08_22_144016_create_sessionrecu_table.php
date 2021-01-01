<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSessionrecuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sessionrecu', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('dateouverture');
			$table->string('etat', 20)->nullable()->default('Ouverte');
			$table->integer('idcaissier');
			$table->dateTime('datefermeture')->nullable();
			$table->float('valeursi', 10, 0);
			$table->integer('verser');
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
		Schema::drop('sessionrecu');
	}

}
