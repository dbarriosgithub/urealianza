<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Jefepolitico extends Model {

	protected $primaryKey='jep_consecutivo';

	protected $table = 'tjefepolitico';
 
	protected $fillable = ['jep_idpersona'];
 
	protected $guarded = ['jep_consecutivo'];
}
