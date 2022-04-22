<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateElementscommandeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elementscommande', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->float('prix', 10, 0);
			$table->integer('idMedicament');
			$table->integer('idcommande')->nullable();
			$table->integer('quantite');
			$table->float('prixtotal', 10, 0);
			$table->integer('stockactuel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('elementscommande');
	}

}
