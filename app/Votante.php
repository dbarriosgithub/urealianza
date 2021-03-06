<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Votante extends Model {

	protected $primaryKey='vot_consecutivo';

	protected $table = 'tvotante';
 
	protected $fillable = ['vot_votante','vot_numeromesavotacion','vot_lugarvotacion','vot_soloalcalde','vot_observacion','vot_idlider'];
 
	protected $guarded = ['vot_consecutivo'];

    public  function persona()
    {
 		return $this->hasOne('\App\Persona','per_consecutivo','vot_votante');
    }

    public  function lider()
    {
        return $this->hasOne('\App\Lider','lid_consecutivo','vot_idlider');
    } 

    public function scopeSearchName($query,$field,$param)
    {
       $query
       ->join('tpersona','tvotante.vot_votante','=','tpersona.per_consecutivo')
       ->where($field,'LIKE','%'.trim($param).'%');
    }

    public function scopeName($query)
    {
       $query->join('tpersona','tvotante.vot_votante','=','tpersona.per_consecutivo')->get();
    }

}
