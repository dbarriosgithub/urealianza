<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lider extends Model {

	protected $primaryKey='lid_consecutivo';

	protected $table = 'tlider';
 
	protected $fillable = ['lid_idpersona','lid_idjefepolitico'];
 
	protected $guarded = ['lid_consecutivo'];

    public  function persona()
    {
 		return $this->hasOne('\App\Persona','per_consecutivo','lid_idpersona');
    }

    public  function jefepolitico()
    {
 		return $this->hasOne('\App\Jefepolitico','jep_consecutivo','lid_idjefepolitico');
    }  

	public function scopeName($query)
    {
       $query->join('tpersona','tlider.lid_idpersona','=','tpersona.per_consecutivo')->get();
    }

	public function scopeSearchName($query,$field,$param)
	{
	   $query
	   ->join('tpersona','tlider.lid_idpersona','=','tpersona.per_consecutivo')
	   ->where($field,'LIKE','%'.trim($param).'%');
	}
}
