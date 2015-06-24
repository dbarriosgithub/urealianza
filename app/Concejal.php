<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Concejal extends Model {

	protected $primaryKey='con_consecutivo';

	protected $table = 'tconcejal';
 
	protected $fillable = ['con_idpersona'];
 
	protected $guarded = ['con_consecutivo'];

}
