<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedicamentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medicaments', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nom', 1000);
			$table->float('prixAchat', 10, 0);
			$table->float('prixVente', 10, 0);
			$table->integer('idfamille')->nullable();
			$table->integer('etat')->default(1);
			$table->integer('pourcentage');
			$table->integer('seuil');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('medicaments');
	}

}
