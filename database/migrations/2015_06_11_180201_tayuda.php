<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tayuda extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tayuda', function(Blueprint $table){

			$table->engine = 'InnoDB';

            $table->increments('ayu_consecutivo');
            $table->integer('ayu_idpersona')->unsigned();
            $table->foreign('ayu_idpersona')->references('per_consecutivo')->on('tpersona');

            //Almacenara el id de una persona catalogada como lider o consejal
			$table->integer('ayu_idpersonaliderconsejal')->unsigned();
            $table->foreign('ayu_idpersonaliderconsejal')->references('per_consecutivo')->on('tpersona');

            $table->string('ayu_necesidad');
            $table->date('ayu_fechasolicitud');
			$table->boolean('ayu_cumplido')->default(true);
            $table->date('ayu_fechacumplimiento')->nullable();

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
		Schema::drop('tayuda');
	}

}
