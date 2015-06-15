<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tdonacion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tdonacion', function (Blueprint $table){

			$table->engine = 'InnoDB';

            $table->increments('don_consecutivo');
            $table->integer('don_idpersona')->unsigned();
            $table->foreign('don_idpersona')->references('per_consecutivo')->on('tpersona');

            $table->string('don_servicio');
            $table->string('don_descripcion')->nullable();

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
		Schema::drop('tdonacion');
	}

}
