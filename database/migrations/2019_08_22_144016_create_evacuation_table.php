<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvacuationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evacuation', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('date');
			$table->string('nom', 50);
			$table->integer('etat')->default(1);
			$table->string('prenom', 50);
			$table->float('montant', 10, 0);
			$table->integer('idcaissier');
			$table->integer('idchauffeur');
			$table->integer('idinfermier');
			$table->integer('idSession');
			$table->integer('nature');
			$table->string('matricule', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('evacuation');
	}

}
