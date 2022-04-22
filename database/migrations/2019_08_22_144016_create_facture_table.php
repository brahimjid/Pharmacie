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
			$table->integer('idtypefacture')->nullable();
			$table->integer('idservice')->nullable();
			$table->integer('idpatient')->nullable();
			$table->integer('idFournisseur')->nullable();
			$table->integer('idpersonnel');
			$table->date('dateecheancce')->nullable();
			$table->boolean('etatpaiement')->nullable();
			$table->string('numeroFactureAchat', 50)->nullable();
			$table->date('datepaiement')->nullable();
			$table->string('numrecu', 50)->nullable();
			$table->string('lieustock', 100)->nullable();
			$table->string('numfacture', 50);
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
