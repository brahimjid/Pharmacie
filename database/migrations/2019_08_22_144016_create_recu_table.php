<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recu', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->float('montant', 10, 0);
			$table->dateTime('date');
			$table->integer('idSession');
			$table->dateTime('dateAnnullation')->nullable();
			$table->integer('annulation')->nullable();
			$table->string('nomPrenompatient', 100)->nullable();
			$table->integer('idAnnuller')->nullable();
			$table->integer('idModePaiement');
			$table->integer('numRecuApprouve')->nullable();
			$table->string('nomautorisateur', 50)->nullable();
			$table->string('numpatient', 1000)->nullable();
			$table->integer('etatPaye');
			$table->integer('idCaissierRecu')->nullable();
			$table->dateTime('datePaiement')->nullable();
			$table->integer('idSessionRecu')->nullable();
			$table->integer('idDepot')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('recu');
	}

}
