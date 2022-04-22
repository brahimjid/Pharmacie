<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateElementsfactureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elementsfacture', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->decimal('prix');
			$table->decimal('remise')->default(0);
			$table->integer('idMedicament');
			$table->integer('idfactrue')->nullable();
			$table->integer('quantite');
			$table->float('prixtotal', 10, 0);
			$table->date('datePeremption')->nullable();
			$table->string('numlot')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('elementsfacture');
	}

}
