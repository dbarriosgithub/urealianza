<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tcomite extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tcomite', function (Blueprint $table){

			$table->engine = 'InnoDB';

            $table->increments('com_consecutivo');
            $table->integer('com_responsable')->unsigned();
            $table->foreign('com_responsable')->references('per_consecutivo')->on('tpersona');

            $table->string('com_nombrecomite');
            $table->string('com_funciones');

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
		Schema::drop('tcomite');
	}

}
