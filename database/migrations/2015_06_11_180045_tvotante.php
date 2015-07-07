<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tvotante extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tvotante', function (Blueprint $table){

			$table->engine = 'InnoDB';

            $table->increments('vot_consecutivo');
            $table->integer('vot_votante')->unsigned();
            $table->foreign('vot_votante')->references('per_consecutivo')->on('tpersona');

            $table->string('vot_numeromesavotacion');
            $table->string('vot_lugarvotacion');
            $table->string('vot_observacion')->nullable();
            $table->boolean('vot_soloalcalde')->default(false);

			$table->integer('vot_idlider')->unsigned();
            $table->foreign('vot_idlider')->references('lid_consecutivo')->on('tlider');

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
		Schema:drop('tvotante');
	}

}
