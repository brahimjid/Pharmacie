<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInventairedepotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inventairedepot', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('date');
			$table->integer('idDepot');
			$table->integer('idpersonnel');
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
		Schema::drop('inventairedepot');
	}

}
