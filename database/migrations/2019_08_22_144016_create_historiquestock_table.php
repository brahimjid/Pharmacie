<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoriquestockTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('historiquestock', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idStock')->nullable()->default(0);
			$table->float('quantite', 10, 0);
			$table->date('date');
			$table->integer('idRecu')->nullable();
			$table->integer('idFacture')->nullable();
			$table->string('typeOperation', 20);
			$table->string('numlot', 200)->nullable();
			$table->date('datePeremption')->nullable();
			$table->string('depotorginal', 50)->nullable();
			$table->string('depotReception', 50)->nullable();
			$table->float('prixAchat', 10, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('historiquestock');
	}

}
