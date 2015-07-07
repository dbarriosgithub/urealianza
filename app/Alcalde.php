<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Alcalde extends Model {

	protected $primaryKey='alc_consecutivo';

	protected $table = 'talcalde';
 
	protected $fillable = ['alc_idpersona'];
 
	protected $guarded = ['alc_consecutivo'];

	public  function persona()
    {
 		return $this->hasOne('\App\Persona','per_consecutivo','alc_idpersona');
    }
}
