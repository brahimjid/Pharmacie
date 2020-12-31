<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('depot', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nom', 50);
			$table->integer('type');
			$table->integer('pourcentage');
			$table->integer('etat');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('depot');
	}

}
