<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoriquepaiementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('historiquepaiement', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('montant');
			$table->date('date');
			$table->string('numRecu', 100)->nullable();
			$table->integer('idFournisseur');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('historiquepaiement');
	}

}
