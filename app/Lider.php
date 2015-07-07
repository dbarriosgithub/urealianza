<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lider extends Model {

  	protected $primaryKey='lid_consecutivo';

  	protected $table = 'tlider';
   
  	protected $fillable = ['lid_idpersona','lid_idjefepolitico','lid_idconcejal'];
   
  	protected $guarded = ['lid_consecutivo'];


    public  function persona()
    {
 		   return $this->hasOne('\App\Persona','per_consecutivo','lid_idpersona');
    }

    public  function concejal()
    {
 		   return $this->hasOne('\App\Concejal','con_consecutivo','lid_idconcejal');
    }

    public  function jefepolitico()
    {
 		   return $this->hasOne('\App\Jefepolitico','jep_consecutivo','lid_idjefepolitico');
    }

    public function scopeNameAll($query)
    {
       $query->join('tpersona','tlider.lid_idpersona','=','tpersona.per_consecutivo')->get();
    }

  	public function scopeName($query,$param)
    {
        $query->join('tpersona','tlider.lid_idpersona','=','tpersona.per_consecutivo')
         ->where('tlider.lid_idpersona','<>',$param)->get();
    }

  	public function scopeSearchName($query,$field,$param,$id)
  	{
  	   $query
  	   ->join('tpersona','tlider.lid_idpersona','=','tpersona.per_consecutivo')
  	   ->where($field,'LIKE','%'.trim($param).'%')
         ->where('tlider.lid_idpersona','<>',$id);
  	}
}
