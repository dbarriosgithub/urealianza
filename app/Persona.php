<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model {

	protected $table = 'tpersona';
 
	protected $fillable = ['per_nombres','per_apellidos','per_direccion','per_celular'];
 
	protected $guarded = ['per_consecutivo'];

}
