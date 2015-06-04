<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTjefepoliticoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tjefepolitico', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

            $table->increments('jep_consecutivo');
            $table->integer('jep_idpersona')->unsigned();
            $table->foreign('jep_idpersona')->references('per_consecutivo')->on('tpersona');

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
		Schema::drop('tjefepolitico');
	}

}
