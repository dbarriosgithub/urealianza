<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConcejalForm extends Request {

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
		  "con_idpersona"	=>	"required|unique:tconcejal",
		];
	}

	public function messages()
	{
	    return [
	    	'con_idpersona.required'=>'Persona es requerido',
	    	'con_idpersona.unique'=>'Esta persona ya ha sido registrada!!',
	    ];
	}

}
