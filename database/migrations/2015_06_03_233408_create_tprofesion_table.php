<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTprofesionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tprofesion', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

            $table->increments('pro_consecutivo');
            $table->string('pro_profesion', 30)->unique();
            $table->softDeletes();
            $table->timestamps();
            $table->primary('pro_consecutivo');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tprofesion');
	}

}
