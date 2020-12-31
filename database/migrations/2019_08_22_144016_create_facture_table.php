<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facture', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('date');
			$table->float('montant', 10, 0);
			$table->integer('idTypeFacture')->nullable();
			$table->integer('idService')->nullable();
			$table->integer('idPatient')->nullable();
			$table->integer('idFournisseur')->nullable();
			$table->integer('idPersonnel');
			$table->date('dateEcheancce')->nullable();
			$table->boolean('etatPaiement')->nullable();
			$table->string('numeroFactureAchat', 50)->nullable();
			$table->date('datePaiement')->nullable();
			$table->string('numRecu', 50)->nullable();
			$table->string('lieuStock', 100)->nullable();
			$table->string('numFacture', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('facture');
	}

}
