<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTpersonaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tpersona', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

            $table->increments('per_consecutivo');
            $table->string('per_nombres', 30)->unique();
            $table->string('per_apellidos',30)->unique();
            $table->string('per_direccion', 60);
            $table->string('per_celular', 60);

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
		Schema::drop('tpersona');
	}

}
