<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LiderForm extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
		  "lid_idpersona"	=>	"required|unique:tlider",
		  "lid_idjefepolitico"	=> "required",
		  "lid_idconcejal"	=> "required",
		];
	}

	public function messages()
	{
	    return [
	    	'lid_idpersona.required'=>'Persona es requerido',
	    	'lid_idpersona.unique'=>'Esta persona ya ha sido registrada!!',
	    	'lid_idjefepolitico.required'=>'Jefe político es requerido !!',
	    	'lid_concejal.required'=>'Concejal es requerido !!',
	    ];
	}

}
