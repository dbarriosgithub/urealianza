<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Concejal extends Model {

	protected $primaryKey='con_consecutivo';

	protected $table = 'tconcejal';
 
	protected $fillable = ['con_idpersona'];
 
	protected $guarded = ['con_consecutivo'];


	  public function scopeName($query)
	  {
	      $query->join('tpersona','tconcejal.con_idpersona','=','tpersona.per_consecutivo')->get();
	  }

	  public function scopeSearchName($query,$field,$param)
	  {
	       $query
	        ->join('tpersona','tconcejal.con_idpersona','=','tpersona.per_consecutivo')
	        ->where($field,'LIKE','%'.trim($param).'%')
	        ->get();
	  }

}
