<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class JefepoliticoForm extends Request {

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
		  "jep_idpersona"	=>	"required|unique:tjefepolitico",
		];
	}

	public function messages()
	{
	    return [
	    	'jep_idpersona.required'=>'Persona es requerido',
	    	'jep_idpersona.unique'=>'Esta persona ya ha sido registrada!!',
	    ];
	}

}
