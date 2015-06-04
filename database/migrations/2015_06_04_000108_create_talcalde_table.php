<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalcaldeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('talcalde', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

            $table->increments('alc_consecutivo');
            $table->integer('alc_idpersona')->unsigned();
            $table->foreign('alc_idpersona')->references('per_consecutivo')->on('tpersona');

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
		Schema::drop('talcalde');
	}

}
