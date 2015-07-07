<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTliderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tlider', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

            $table->increments('lid_consecutivo');
            $table->integer('lid_idpersona')->unsigned();
            $table->integer('lid_idconcejal')->unsigned();
            $table->integer('lid_idjefepolitico')->unsigned();

            $table->foreign('lid_idpersona')->references('per_consecutivo')->on('tpersona');
            $table->foreign('lid_idconcejal')->references('con_consecutivo')->on('tconcejal');
            $table->foreign('lid_idjefepolitico')->references('jep_consecutivo')->on('tjefepolitico');

            $table->softDeletes();
            $table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tlider');
	}

}
