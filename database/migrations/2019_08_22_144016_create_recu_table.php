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
			$table->dateTime('dateannullation')->nullable();
			$table->integer('annulation')->nullable();
			$table->string('nomprenompatient', 100)->nullable();
			$table->integer('idannuller')->nullable();
			$table->integer('idmodepaiement');
			$table->integer('numrecuapprouve')->nullable();
			$table->string('nomautorisateur', 50)->nullable();
			$table->string('numpatient', 1000)->nullable();
			$table->integer('etatpaye');
			$table->integer('idcaissierrecu')->nullable();
			$table->dateTime('datepaiement')->nullable();
			$table->integer('idSessionRecu')->nullable();
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
		Schema::drop('recu');
	}

}
