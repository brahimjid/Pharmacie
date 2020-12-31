<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFonctionnalitegroupeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fonctionnalitegroupe', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idFonctionnalite');
			$table->integer('idGroupe');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fonctionnalitegroupe');
	}

}
