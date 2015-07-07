<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditVotanteForm extends Request {

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
			'vot_idlider' => 'required',
			'vot_numeromesavotacion' => 'required',
			'vot_lugarvotacion' => 'required',
		];
	}

	public function messages()
	{
	    return [
			'vot_idlider' => 'Seleccione un lider',
			'vot_numeromesavotacion.required'=>'Es requerido un número de mesa',
			'vot_lugarvotacion.required'=>'Es requerido un lugar de votación',
	    ];
	}

}
