<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommandeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commande', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('date');
			$table->float('montant', 10, 0);
			$table->integer('idFournisseur')->nullable();
			$table->integer('typecommande');
			$table->integer('iddepot')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('commande');
	}

}
