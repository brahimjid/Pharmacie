<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModepaiementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modepaiement', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nom', 50);
			$table->string('etat', 30)->default('Active');
			$table->string('alias', 20);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modepaiement');
	}

}
