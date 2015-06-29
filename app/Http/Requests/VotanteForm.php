<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class VotanteForm extends Request {

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
			'vot_votante' => 'required|unique:tvotante',
			'vot_idlider' => 'required',
			'vot_numeromesavotacion' => 'required',
			'vot_lugarvotacion' => 'required',
		];
	}

	public function messages()
	{
	    return [
	    	'vot_votante.required'=>'Es requerido una persona',
	        'vot_votante.unique' => 'Este votante ya ha sido registrado anteriormente',
			'vot_idlider' => 'Seleccione un lider',
			'vot_numeromesavotacion.required'=>'Es requerido un número de mesa',
			'vot_lugarvotacion.required'=>'Es requerido un lugar de votación',
	    ];
	}

}
