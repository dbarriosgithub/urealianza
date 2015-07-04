<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model {

	protected $primaryKey='per_consecutivo';

	protected $table = 'tpersona';
 
	protected $fillable = ['per_cedula','per_nombres','per_apellidos','per_direccion','per_celular'];
 
	protected $guarded = ['per_consecutivo'];


	public  function jefepolitico()
  {
 		return $this->belongsTo('\App\Jefepolitico');
  } 

  public function scopeCedula($query,$param)
  {
       if(!empty(trim($param)))
       	 $query->where('per_cedula',trim($param));
  }



}
