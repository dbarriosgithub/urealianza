<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lider extends Model {

	protected $primaryKey='lid_consecutivo';

	protected $table = 'tlider';
 
	protected $fillable = ['lid_idpersona','lid_idjefepolitico'];
 
	protected $guarded = ['lid_consecutivo'];


	public function scopeName($query)
    {
       $query->join('tpersona','tlider.lid_idpersona','=','tpersona.per_consecutivo')->get();
    }
}
