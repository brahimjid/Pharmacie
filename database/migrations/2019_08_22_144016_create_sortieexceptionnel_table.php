<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSortieexceptionnelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sortieexceptionnel', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idMedicament');
			$table->date('date');
			$table->float('quantite', 10, 0);
			$table->string('typeSortie', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sortieexceptionnel');
	}

}
