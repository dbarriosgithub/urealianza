<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTconcejalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tconcejal', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

            $table->increments('con_consecutivo');
            $table->integer('con_idpersona')->unsigned();
            $table->foreign('con_idpersona')->references('per_consecutivo')->on('tpersona');

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
		Schema::drop('tconcejal');
	}

}
