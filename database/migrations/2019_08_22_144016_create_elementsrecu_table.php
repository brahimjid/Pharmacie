<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateElementsrecuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elementsrecu', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('date');
			$table->integer('idMedicament');
			$table->integer('idrecu');
			$table->float('prix', 10, 0);
			$table->integer('quantite');
			$table->float('prixtotal', 10, 0);
			$table->integer('pourcentage');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('elementsrecu');
	}

}
