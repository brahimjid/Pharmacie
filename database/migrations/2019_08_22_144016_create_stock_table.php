<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStockTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stock', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idMedicament');
			$table->string('numlot', 100)->nullable();
			$table->date('date');
			$table->float('quantite', 10, 0);
			$table->date('datePeremption')->nullable();
			$table->float('prixAchat', 10, 0);
			$table->float('montantT', 10, 0);
			$table->integer('idDepot');
			$table->integer('stockinitial');
			$table->float('prixvente', 10, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stock');
	}

}
