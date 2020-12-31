<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFournisseurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fournisseur', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nom', 100);
			$table->string('tel1', 40)->nullable();
			$table->string('tel2', 40)->nullable();
			$table->string('adresse', 100)->nullable();
			$table->string('sigle', 50)->nullable();
			$table->integer('compte');
			$table->string('email', 50)->nullable();
			$table->integer('etat')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fournisseur');
	}

}
