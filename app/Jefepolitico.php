<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Jefepolitico extends Model {

	protected $primaryKey='jep_consecutivo';

	protected $table = 'tjefepolitico';
 
	protected $fillable = ['jep_idpersona'];
 
	protected $guarded = ['jep_consecutivo'];

    public  function persona()
    {
 		return $this->hasOne('\App\Persona','per_consecutivo','jep_idpersona');
    } 


    public function scopeName($query)
    {
       $query->join('tpersona','tjefepolitico.jep_idpersona','=','tpersona.per_consecutivo')->get();
    }

    public function scopeSearchName($query,$field,$param)
    {
       $query
        ->join('tpersona','tjefepolitico.jep_idpersona','=','tpersona.per_consecutivo')
        ->where($field,'LIKE','%'.trim($param).'%')
        ->get();
    }

}
