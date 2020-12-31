<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFonctionnaliteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fonctionnalite', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nom', 100);
			$table->string('description', 1000);
			$table->string('etat', 40)->default('Active');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fonctionnalite');
	}

}
